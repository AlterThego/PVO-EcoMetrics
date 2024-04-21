<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
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
                'barangay' => 'required|exists:barangays,id',
                'level' => 'required',
                'farm_name' => 'required',
                'farm_area' => 'required|numeric',

                'farm_sector' => 'required',
                'farm_type' => 'required|exists:farm_type,id',
                'year_established' => 'required|integer',
                'year_closed' => 'nullable|integer',


            ]);


            // Save the data to the database
            Farm::create([
                'municipality_id' => $validatedData['municipality'],
                'barangay_id' => $validatedData['barangay'],
                'level' => $validatedData['level'],
                'farm_name' => $validatedData['farm_name'],
                'farm_area' => $validatedData['farm_area'],

                'farm_sector' => $validatedData['farm_sector'],
                'farm_type_id' => $validatedData['farm_type'],
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
            // toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
 dd($e->getMessage());
            return back();
        }
    }
}
