<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\AnimalPopulation;
use App\Models\AffectedAnimals;


class DeleteRow extends ModalComponent
{
    public $animalPopulationId;
    public $animalId;
    public $animalTypeId;

    public $affectedAnimalsId;
    public function render()
    {
        return view('livewire.delete-row');
    }

    public function deleteItem()
    {
        try {
            // Assuming you have a model associated with the item (e.g., AnimalPopulation)
            $animalPopulation = AnimalPopulation::find($this->animalPopulationId);
            $animal = Animal::find($this->animalId);
            $animalType = AnimalType::find($this->animalTypeId);
            $affectedAnimals = AffectedAnimals::find($this->affectedAnimalsId);

            if ($animalPopulation) {
                $animalPopulation->delete();
            } else if ($animal) {
                $animal->delete();
            } else if ($animalType) {
                $animalType->delete();
            } else if ($affectedAnimals) {
                $affectedAnimals->delete();
            }


            toastr()->success('Item deleted successfully!', 'Success');
            // Close the modal after deletion
            return redirect()->to(url()->previous());

        } catch (\Exception $e) {
            // Log or handle the exception as needed
            \Log::error('Error deleting item: ' . $e->getMessage());

            // You can add a Toastr message or any other notification here
            toastr()->error('An error occurred while deleting the item. Please try again.', 'Error');

            // Redirect back to the previous page
            return redirect()->to(url()->previous());
        }
    }

}
