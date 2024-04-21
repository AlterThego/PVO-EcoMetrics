<?php

namespace App\Livewire\UpdateModal;

use App\Models\AnimalDeath;
use LivewireUI\Modal\ModalComponent;

class AnimalDeathUpdate extends ModalComponent
{
    public $animalDeathUpdateId;
    public $municipalityId;
    public $barangayId;
    public $animalId;
    public $year;
    public $animalDeathCount;

    public function render()
    {
        return view('livewire.update-modal.animal-death-update');
    }

    public function mount($animalDeathUpdateId)
    {
        // Load the existing data from the database
        $animalDeath = AnimalDeath::find($animalDeathUpdateId);

        // Set the Livewire component properties with the existing values
        $this->animalPopulationUpdateId = $animalDeath->id;
        $this->municipalityId = $animalDeath->municipality_id;
        $this->barangayId = $animalDeath->barangay_id;
        $this->animalId = $animalDeath->animal_id;
        $this->year = $animalDeath->year;
        $this->animalDeathCount = $animalDeath->count;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $animalDeath = AnimalDeath::find($this->animalDeathUpdateId);


            $this->validate([
                'year' => 'required|integer',
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'animalId' => 'required|exists:animal,id',
                'animalDeathCount' => 'required|integer',
            ]);

            $animalDeath->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
                'animal_id' => $this->animalId,
                'year' => $this->year,
                'count' => $this->animalDeathCount,
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
