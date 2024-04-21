<?php

namespace App\Livewire\UpdateModal;

use App\Models\Population;
use LivewireUI\Modal\ModalComponent;

class PopulationUpdate extends ModalComponent
{

    public $populationUpdateId;
    public $municipalityId;
    public $censusYear;
    public $populationCount;
    public function render()
    {
        return view('livewire.update-modal.population-update');
    }

    public function mount($populationUpdateId)
    {
        // Load the existing data from the database
        $populationUpdate = Population::find($populationUpdateId);

        // Set the Livewire component properties with the existing values
        $this->populationUpdateId = $populationUpdate->id;
        $this->municipalityId = $populationUpdate->municipality_id;
        $this->censusYear = $populationUpdate->census_year;
        $this->populationCount = $populationUpdate->population_count;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $populationUpdate = Population::find($this->populationUpdateId);


            $this->validate([
                'censusYear' => 'required|integer',
                'municipalityId' => 'required|exists:municipalities,id',
                'populationCount' => 'required|integer',
            ]);

            $populationUpdate->update([
                'census_year' => $this->censusYear,
                'municipality_id' => $this->municipalityId,
                'population_count' => $this->populationCount,
            ]);

            \DB::commit();
            toastr()->success('Item updated successfully!', 'Success');
            return redirect()->to(url()->previous());

        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error updating item: ' . $e->getMessage());


            toastr()->error('An error occurred while updating the item. Please try again. Error: ' . $e->getMessage());


            // dd($e->getMessage());
        }
    }
}
