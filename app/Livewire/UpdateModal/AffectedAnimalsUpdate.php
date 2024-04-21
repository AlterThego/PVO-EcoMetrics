<?php

namespace App\Livewire\UpdateModal;

use App\Models\AffectedAnimals;
use LivewireUI\Modal\ModalComponent;


class AffectedAnimalsUpdate extends ModalComponent
{
    public $affectedAnimalsUpdateId;
    public $municipalityId;
    public $barangayId;
    public $animalId;
    public $year;
    public $affectedAnimalsCount;

    public function render()
    {
        return view('livewire.update-modal.affected-animals-update');
    }

    public function mount($affectedAnimalsUpdateId)
    {
        // Load the existing data from the database
        $affectedAnimals = AffectedAnimals::find($affectedAnimalsUpdateId);

        // Set the Livewire component properties with the existing values
        $this->animalPopulationUpdateId = $affectedAnimals->id;
        $this->municipalityId = $affectedAnimals->municipality_id;
        $this->barangayId = $affectedAnimals->barangay_id;
        $this->animalId = $affectedAnimals->animal_id;
        $this->year = $affectedAnimals->year;
        $this->affectedAnimalsCount = $affectedAnimals->count;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $affectedAnimals = AffectedAnimals::find($this->affectedAnimalsUpdateId);


            $this->validate([
                'year' => 'required|integer',
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'animalId' => 'required|exists:animal,id',
                'affectedAnimalsCount' => 'required|integer',
            ]);

            $affectedAnimals->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
                'animal_id' => $this->animalId,
                'year' => $this->year,
                'count' => $this->affectedAnimalsCount,
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
