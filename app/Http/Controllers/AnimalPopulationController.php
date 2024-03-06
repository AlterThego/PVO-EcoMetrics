<?php

namespace App\Http\Controllers;

use App\Charts\DashboardAnimalPopulationChart;
use App\Models\AnimalPopulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Charts\AnimalPopulationChart;
use MathPHP\Statistics\Regression\Linear;
use Illuminate\Database\QueryException;

class AnimalPopulationController extends Controller
{
    // AnimalPopulationController.php
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'year' => 'required|integer',
                'municipality' => 'required|exists:municipalities,id',
                'animal' => 'required|exists:animal,id',
                'animal_type' => 'nullable|exists:animal_type,id',
                'animal_population_count' => 'required|integer',
                'volume' => 'nullable|numeric',
            ]);

            // Check if a similar entry already exists
            $existingEntry = AnimalPopulation::where('year', $validatedData['year'])
                ->where('municipality_id', $validatedData['municipality'])
                ->where('animal_id', $validatedData['animal'])
                ->where('animal_type_id', $validatedData['animal_type'])
                ->orWhere(function ($query) use ($validatedData) {
                    $query->where('year', $validatedData['year'])
                        ->where('municipality_id', $validatedData['municipality'])
                        ->where('animal_id', $validatedData['animal'])
                        ->whereNull('animal_type_id');
                })
                ->first();

            if ($existingEntry) {
                toastr()->error('Duplicate entry. Please check your data.');
                return back();
            }

            // Save the data to the database
            AnimalPopulation::create([
                'year' => $validatedData['year'],
                'municipality_id' => $validatedData['municipality'],
                'animal_id' => $validatedData['animal'],
                'animal_type_id' => $validatedData['animal_type'],
                'animal_population_count' => $validatedData['animal_population_count'],
                'volume' => $validatedData['volume'],
            ]);

            \DB::commit();
            toastr()->success('Data has been saved successfully!');
            return back();

        } catch (ValidationException $e) {
            \DB::rollBack();
            Log::error('Validation failed: ' . json_encode($e->validator->errors()));

            // Redirect back with validation errors
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();

        } catch (QueryException $e) {
            \DB::rollBack();
            // Check if the error is due to duplicate entry
            if ($e->errorInfo[1] == 1062) {
                toastr()->error('Duplicate entry. Please check your data.');
            } else {
                Log::error('Error saving data: ' . $e->getMessage());
                toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            }
            return back();

        } catch (\Exception $e) {
            \DB::rollBack();

            Log::error('Error saving data: ' . $e->getMessage());

            // Redirect with an error message or handle the error accordingly
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();
        }
    }


    public function index(AnimalPopulationChart $chart)
    {
        // Call linearRegressionData method to get the data
        $regressionData = $this->linearRegression();
        $predictedYear = $this->linearRegression();
        $latestData = $this->getLatestYearAndPopulation();

        return view('animal.population', [
            'chart' => $chart->build(),
            'regressionData' => $regressionData,
            'predictedYear' => $predictedYear,
            'latestYear' => $latestData['latestYear'],
            'latestPopulation' => $latestData['latestPopulation'],
        ]);
    }

    public function linearRegression()
    {
        // Get the data for all municipalities
        $data = AnimalPopulation::groupBy('year')
            ->selectRaw('year, SUM(animal_population_count) as total_population')
            ->orderBy('year')
            ->get()
            ->toArray();

        // Check if there are enough data points for regression
        $minDataPoints = 2; // Set your minimum required data points
        $dataPointsCount = count($data);

        if ($dataPointsCount < $minDataPoints) {
            // Handle insufficient data points
            toastr()->warning('Insufficient data points for accurate regression.');

            return [
                'predictedYear' => null,
                'predictedPopulation' => null,
            ];
        }

        try {
            // Prepare the data points for linear regression
            $points = [];
            foreach ($data as $entry) {
                $points[] = [$entry['year'], $entry['total_population']];
            }

            // Simple linear regression (least squares method)
            $regression = new Linear($points);

            // Check if regression parameters are valid
            $parameters = $regression->getParameters();
            if (empty($parameters) || $parameters['m'] === null || $parameters['b'] === null) {
                // Handle invalid regression parameters
                toastr()->warning('Invalid regression parameters.');

                return [
                    'predictedYear' => null,
                    'predictedPopulation' => null,
                ];
            }

            // Calculate degrees of freedom
            $degreesOfFreedom = $dataPointsCount - count($parameters) - 1;

            if ($degreesOfFreedom <= 0) {
                // Handle invalid degrees of freedom
                toastr()->warning('Invalid degrees of freedom in regression.');

                return [
                    'predictedYear' => null,
                    'predictedPopulation' => null,
                ];
            }

            // Find the latest year from the data
            $latestYear = max(array_column($data, 'year'));

            // Predict the total animal population for the next year
            $predictedYear = $latestYear + 1;
            $predictedPopulation = $regression->evaluate($predictedYear);
            $formattedPopulation = str_replace(',', '', number_format($predictedPopulation, 0));

            return [
                'predictedYear' => $predictedYear,
                'predictedPopulation' => $formattedPopulation,
            ];
        } catch (\Exception $e) {
            // Handle the exception, e.g., display a warning
            toastr()->warning('An error occurred during linear regression: ' . $e->getMessage());

            return [
                'predictedYear' => null,
                'predictedPopulation' => null,
            ];
        }
    }

    public function getLatestYearAndPopulation()
    {
        // Get the latest year and total population from the AnimalPopulation model
        $latestData = AnimalPopulation::groupBy('year')
            ->selectRaw('year, SUM(animal_population_count) as total_population')
            ->latest('year')
            ->first();

        // Check if $latestData is null
        if ($latestData) {
            // Return the latest year and total population
            return [
                'latestYear' => $latestData->year,
                'latestPopulation' => $latestData->total_population,
            ];
        } else {
            // Handle the case when $latestData is null
            toastr()->warning('No data available.');

            return [
                'latestYear' => null,
                'latestPopulation' => null,
            ];
        }
    }




}



