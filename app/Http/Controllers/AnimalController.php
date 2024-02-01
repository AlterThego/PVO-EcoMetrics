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
            \DB::beginTransaction();
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

            \DB::commit();
            toastr()->success('Data has been saved successfully!');
            return back();


        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->validator->errors()));

            \DB::rollback();
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();

        } catch (\Exception $e) {
            // Log or handle the exception
            Log::error('Error saving data: ' . $e->getMessage());

            \DB::rollback();
            // return redirect()->back()->with('error', 'An error occurred while saving data. Please try again.');
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();
        }
    }
}
