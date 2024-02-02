<?php

namespace App\Http\Controllers;

use App\Models\AnimalPopulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Charts\AnimalPopulationChart;

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
                'animal_type' => 'required|exists:animal_type,id',
                'animal_population_count' => 'required|integer',
                'volume' => 'required|numeric',
            ]);


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
            Log::error('Validation failed: ' . json_encode($e->validator->errors()));

            // Redirect back with validation errors
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
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
        return view('animal.population', ['chart' => $chart->build()]);
    }

}

