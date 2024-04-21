<?php

namespace App\Livewire\Updatemodal;


use LivewireUI\Modal\ModalComponent;
use App\Models\Animal;

class AnimalUpdate extends ModalComponent
{
    public $animalUpdateId;
    public $animalName;
    public $animalClassification;
    public function render()
    {
        return view('livewire.update-modal.animal-update');
    }

    public function mount($animalUpdateId)
    {
        // Load the existing data from the database
        $animal = Animal::find($animalUpdateId);

        // Set the Livewire component properties with the existing values
        $this->animalUpdateId = $animal->id;
        $this->animalName = $animal->animal_name;
        $this->animalClassification = $animal->classification;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $animal = Animal::find($this->animalUpdateId);


            $this->validate([
                'animalName' => 'required',
                'animalClassification' => 'required',
            ]);

            $animal->update([
                'animal_name' => $this->animalName,
                'classification' => $this->animalClassification,
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
