<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\BeeKeeper;
class BeeKeeperController extends Controller
{
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'municipality' => 'required|exists:municipalities,id',
                'barangay' => 'required|exists:barangays,id',
                'year' => 'required|integer',
                'colonies' => 'required|integer',
                'beeKeepers' => 'required|integer',


            ]);


            // Save the data to the database
            BeeKeeper::create([
                'municipality_id' => $validatedData['municipality'],
                'barangay_id' => $validatedData['barangay'],
                'year' => $validatedData['year'],
                'colonies' => $validatedData['colonies'],
                'bee_keepers' => $validatedData['beeKeepers'],

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
            toastr()->error('An error occurred while saving data. Please try again.' . $e->getMessage());
            return back();
        }
    }
}
