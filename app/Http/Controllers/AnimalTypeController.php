<?php

namespace App\Http\Controllers;
use App\Models\AnimalType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
class AnimalTypeController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'type' => 'required',
            ]);

            
            // Save the data to the database
            AnimalType::create([
                'type' => $validatedData['type'],
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
            toastr()->error('An error occurred while saving data. Please try again.'. $e->getMessage());
            return back();
        }
    }
}
