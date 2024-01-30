<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Animal;
use Illuminate\Validation\ValidationException;
class AnimalController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'animal_name' => 'required',
                'classification' => 'required',
                // 'animal_type' => 'required|exists:animal_type,id',
            ]);

            Log::info('Validation passed. Data: ' . json_encode($validatedData));

            // Save the data to the database
            Animal::create([
                'animal_name' => $validatedData['animal_name'],
                'classification' => $validatedData['classification'],
                // 'animal_type_id' => $validatedData['animal_type'],
            ]);

            toastr()->success('Data has been saved successfully!');
            return back();


        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->validator->errors()));

            // Redirect back with validation errors
            toastr()->error('An error occurred while saving data. Please try again.'. $e->getMessage());
            return back();
            
        } catch (\Exception $e) {
            // Log or handle the exception
            Log::error('Error saving data: ' . $e->getMessage());

            // Redirect with an error message or handle the error accordingly
            return redirect()->back()->with('error', 'An error occurred while saving data. Please try again.');
        }
    }
}
