<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\Disease;

class DiseaseController extends Controller
{
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'disease_name' => 'required',
            ]);


            // Save the data to the database
            Disease::create([
                'disease_name' => $validatedData['disease_name'],
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
            Log::error('Error saving data: ' . $e->getMessage());

            \DB::rollback();
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();
        }
    }
}
