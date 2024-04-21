<?php

namespace App\Livewire\UpdateModal;

use LivewireUI\Modal\ModalComponent;


use App\Models\AnimalPopulation;

class AnimalPopulationUpdate extends ModalComponent
{

    public $animalPopulationUpdateId;
    public $municipalityId;
    public $barangayId;
    public $animalId;
    public $animalTypeId;
    public $year;
    public $animalPopulationCount;
    public $volume;

    public function render()
    {
        return view('livewire.update-modal.animal-population-update');
    }


    public function mount($animalPopulationUpdateId)
    {
        // Load the existing data from the database
        $animalPopulation = AnimalPopulation::find($animalPopulationUpdateId);

        // Set the Livewire component properties with the existing values
        $this->animalPopulationUpdateId = $animalPopulation->id;
        $this->municipalityId = $animalPopulation->municipality_id;
        $this->barangayId = $animalPopulation->barangay_id;
        $this->animalId = $animalPopulation->animal_id;
        $this->animalTypeId = $animalPopulation->animal_type_id;
        $this->year = $animalPopulation->year;
        $this->animalPopulationCount = $animalPopulation->animal_population_count;
        $this->volume = $animalPopulation->volume;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $animalPopulation = AnimalPopulation::find($this->animalPopulationUpdateId);
            $animalTypeId = $this->animalTypeId ?: null;

            $volume = $this->volume !== '' ? $this->volume : null;

            $this->validate([
                'year' => 'required|integer',
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'animalId' => 'required|exists:animal,id',
                'animalTypeId' => 'required|exists:animal_type,id',
                'animalPopulationCount' => 'required|integer',
                'volume' => 'nullable|numeric',
            ]);

            $animalPopulation->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
                'animal_id' => $this->animalId,
                'animal_type_id' => $animalTypeId, 
                'year' => $this->year,
                'animal_population_count' => $this->animalPopulationCount,
                'volume' => $volume,
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