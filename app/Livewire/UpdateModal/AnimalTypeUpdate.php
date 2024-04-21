<?php

namespace App\Livewire\Updatemodal;


use App\Models\AnimalPopulation;
use App\Models\AnimalType;
use LivewireUI\Modal\ModalComponent;

class AnimalTypeUpdate extends ModalComponent
{
  

    public function render()
    {
        return view('livewire.update-modal.animal-type-update');
    }

    public $animalTypeUpdateId;
    public $animalType;
    public $animalId;

    public function mount($animalTypeUpdateId)
    {
        // Load the existing data from the database
        $animalType = AnimalType::find($animalTypeUpdateId);

        // Set the Livewire component properties with the existing values
        $this->animalTypeUpdateId = $animalType->id;
        $this->animalType = $animalType->type;
        $this->animalId = $animalType->animal_id;
        

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $animalType = AnimalType::find($this->animalTypeUpdateId);


            $this->validate([
                'animalTypeUpdateId' => 'required',
                'animalId' => 'required|exists:animal,id',
                'animalType' => 'required'
            ]);

            $animalType->update([
                'type' => $this->animalType,
                'animal_id' => $this->animalId,
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
