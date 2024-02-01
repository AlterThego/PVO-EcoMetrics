<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\Farm;
class FarmController extends Controller
{
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'municipality' => 'required|exists:municipalities,id',
                'level' => 'required',
                'farm_name' => 'required',
                'farm_area' => 'required|numeric',

                'farm_sector' => 'required',
                'farm_type' => 'required',
                'year_established' => 'required|integer',
                'year_closed' => 'integer',


            ]);


            // Save the data to the database
            Farm::create([
                'municipality_id' => $validatedData['municipality'],
                'level' => $validatedData['level'],
                'farm_name' => $validatedData['farm_name'],
                'farm_area' => $validatedData['farm_area'],

                'farm_sector' => $validatedData['farm_sector'],
                'farm_type' => $validatedData['farm_type'],
                'year_established' => $validatedData['year_established'],
                'year_closed' => $validatedData['year_closed'],
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
