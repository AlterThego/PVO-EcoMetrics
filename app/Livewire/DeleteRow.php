<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\AnimalPopulation;

class DeleteRow extends ModalComponent
{
    public $animalPopulationId;
    public function render()
    {
        return view('livewire.delete-row');
    }

    public function deleteItem()
    {
        // Assuming you have a model associated with the item (e.g., AnimalPopulation)
        $animalPopulation = AnimalPopulation::find($this->animalPopulationId);

        if ($animalPopulation) {
            $animalPopulation->delete();
        }

        // Close the modal after deletion
        $this->redirect('/animal-population');
    }
}
