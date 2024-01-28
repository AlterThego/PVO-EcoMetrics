<?php

namespace App\Http\Controllers;

use App\Models\AnimalPopulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AnimalPopulationController extends Controller
{
    // AnimalPopulationController.php
    public function store(Request $request)
    {
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

            Log::info('Validation passed. Data: ' . json_encode($validatedData));

            // Save the data to the database
            AnimalPopulation::create([
                'year' => $validatedData['year'],
                'municipality_id' => $validatedData['municipality'],
                'animal_id' => $validatedData['animal'],
                'animal_type_id' => $validatedData['animal_type'],
                'animal_population_count' => $validatedData['animal_population_count'],
                'volume' => $validatedData['volume'],
            ]);

            Log::info('Data saved successfully.');

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'Animal data added successfully!');
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->validator->errors()));

            // Redirect back with validation errors
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Log or handle the exception
            Log::error('Error saving data: ' . $e->getMessage());

            // Redirect with an error message or handle the error accordingly
            return redirect()->back()->with('error', 'An error occurred while saving data. Please try again.');
        }
    }
}
