<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\AnimalPopulation;
use App\Models\AffectedAnimals;
use App\Models\AnimalDeath;
use App\Models\FishProduction;
use App\Models\Disease;
use App\Models\YearlyCommonDisease;
use App\Models\Farm;
use App\Models\FarmSupply;
use App\Models\VeterinaryClinics;

class DeleteRow extends ModalComponent
{
    public $animalPopulationId;
    public $animalId;
    public $animalTypeId;
    public $affectedAnimalsId;
    public $animalDeathId;
    public $fishProductionId;
    public $fishProductionAreaId;
    public $diseaseId;
    public $yearlyCommonDiseaseId;
    public $farmId;
    public $farmSuppliesId;
    public $veterinaryClinicsId;
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
            $animalDeath = AnimalDeath::find($this->animalDeathId);
            $fishProduction = FishProduction::find($this->fishProductionId);
            $fishProductionArea = FishProduction::find($this->fishProductionAreaId);
            $disease = Disease::find($this->diseaseId);
            $yearlycommondisease = YearlyCommonDisease::find($this->yearlyCommonDiseaseId);
            $farm = Farm::find($this->farmId);
            $farmSupply = FarmSupply::find($this->farmSuppliesId);
            $veterinaryClinics = VeterinaryClinics::find($this->veterinaryClinicsId);

            if ($animalPopulation) {
                $animalPopulation->delete();
            } else if ($animal) {
                $animal->delete();
            } else if ($animalType) {
                $animalType->delete();
            } else if ($affectedAnimals) {
                $affectedAnimals->delete();
            } else if ($animalDeath) {
                $animalDeath->delete();
            } else if ($fishProduction) {
                $fishProduction->delete();
            } else if ($fishProductionArea) {
                $fishProductionArea->delete();
            } else if ($disease) {
                $disease->delete();
            } else if ($yearlycommondisease) {
                $yearlycommondisease->delete();
            } else if ($farm) {
                $farm->delete();
            } else if ($farmSupply) {
                $farmSupply->delete();
            } else if ($veterinaryClinics) {
                $veterinaryClinics->delete();
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
