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
        \DB::beginTransaction();
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'type' => 'required',
            ]);

            
            // Save the data to the database
            AnimalType::create([
                'type' => $validatedData['type'],
            ]);

            \DB::commit();
            toastr()->success('Data has been saved successfully!');
            return back();


        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->validator->errors()));

            \DB::rollback();
            toastr()->error('An error occurred while saving data. Please try again.'. $e->getMessage());
            return back();
            
        } catch (\Exception $e) {
            Log::error('Error saving data: ' . $e->getMessage());

            \DB::rollback();
            toastr()->error('An error occurred while saving data. Please try again.'. $e->getMessage());
            return back();
        }
    }
}
