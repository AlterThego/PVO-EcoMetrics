<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
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
            // Log or handle the exception
            Log::error('Error saving data: ' . $e->getMessage());

            \DB::rollback();
            // return redirect()->back()->with('error', 'An error occurred while saving data. Please try again.');
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();
        }
    }

    public function restore(Request $request, $id)
{
    $animal = Animal::withTrashed()->findOrFail($id);
    
    // Check if the animal is soft-deleted
    if ($animal->trashed()) {
        // Restore the soft-deleted animal
        $animal->restore();
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Animal restored successfully.');
    }
    
    // Redirect back with a warning message if the animal is not soft-deleted
    return redirect()->back()->with('warning', 'Animal is not deleted.');
}
}
