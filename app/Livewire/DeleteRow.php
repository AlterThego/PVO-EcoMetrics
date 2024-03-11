<?php

namespace App\Livewire;

use App\Models\BeeKeeper;
use App\Models\Municipality;
use App\Models\Population;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use App\Models\FishSanctuary;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\AnimalPopulation;
use App\Models\AffectedAnimals;
use App\Models\AnimalDeath;
use App\Models\FishProduction;
use App\Models\FishProductionArea;
use App\Models\Disease;
use App\Models\YearlyCommonDisease;
use App\Models\Farm;
use App\Models\FarmSupply;
use App\Models\VeterinaryClinics;
use App\Models\Barangay;


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
    public $beeKeeperId;
    public $fishSanctuariesId;
    public $barangayId;
    public $populationId;
    public $municipalityId;
    public $userId;
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
            $fishProductionArea = FishProductionArea::find($this->fishProductionAreaId);
            $disease = Disease::find($this->diseaseId);
            $yearlycommondisease = YearlyCommonDisease::find($this->yearlyCommonDiseaseId);
            $farm = Farm::find($this->farmId);
            $farmSupply = FarmSupply::find($this->farmSuppliesId);
            $veterinaryClinics = VeterinaryClinics::find($this->veterinaryClinicsId);
            $fishSanctuaries = FishSanctuary::find($this->fishSanctuariesId);
            $barangay = Barangay::find($this->barangayId);
            $population = Population::find($this->populationId);
            $beeKeeper = BeeKeeper::find($this->beeKeeperId);
            $municipality = Municipality::find($this->municipalityId);
            $user = User::find($this->userId);

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
            } else if ($fishSanctuaries) {
                $fishSanctuaries->delete();
            } else if ($barangay) {
                $barangay->delete();
            } else if ($population) {
                $population->delete();
            } else if ($beeKeeper) {
                $beeKeeper->delete();
            } else if ($municipality) {
                $municipality->delete();
            } else if ($user) {
                $user->delete();
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
