<?php

namespace App\Http\Controllers;

use App\Charts\DashboardAffectedAnimalsChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\AffectedAnimals;

class AffectedAnimalsController extends Controller
{
    public function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $validatedData = $request->validate([
                'year' => 'required|integer|digits:4',
                'municipality' => 'required|exists:municipalities,id',
                'animal' => 'required|exists:animal,id',
                'count' => 'required|integer',
            ]);


            // Save the data to the database
            AffectedAnimals::create([
                'year' => $validatedData['year'],
                'municipality_id' => $validatedData['municipality'],
                'animal_id' => $validatedData['animal'],
                'count' => $validatedData['count'],

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
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();
        }
    }

}
