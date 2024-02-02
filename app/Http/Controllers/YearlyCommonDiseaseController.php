<?php

namespace App\Http\Controllers;

use App\Models\YearlyCommonDisease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class YearlyCommonDiseaseController extends Controller
{
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'year' => 'required|integer',
                'disease' => 'required|exists:yearly_common_diseases,id',
                'disease_count' => 'required|integer',
            ]);


            // Save the data to the database
            YearlyCommonDisease::create([
                'year' => $validatedData['year'],
                'disease_id' => $validatedData['disease'],
                'disease_count' => $validatedData['disease_count'],
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
}
