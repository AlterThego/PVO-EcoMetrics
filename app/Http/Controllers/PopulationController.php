<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class PopulationController extends Controller
{
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'municipality' => 'required|exists:municipalities,id',
                'census_year' => 'required|integer',
                'population_count' => 'required|integer',
            ]);


            // Save the data to the database
            Population::create([
                'municipality_id' => $validatedData['municipality'],
                'census_year' => $validatedData['census_year'],
                'population_count' => $validatedData['population_count'],
            ]);

            \DB::commit();
            toastr()->success('Data has been saved successfully!');
            return back();

        } catch (ValidationException $e) {
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

}
