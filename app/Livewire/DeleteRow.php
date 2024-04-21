<?php

namespace App\Livewire;

use App\Models\{
    AffectedAnimals,
    Animal,
    AnimalDeath,
    AnimalPopulation,
    AnimalType,
    Barangay,
    BeeKeeper,
    Disease,
    Farm,
    FarmSupply,
    FishProduction,
    FishProductionArea,
    FishSanctuary,
    Municipality,
    Population,
    User,
    VeterinaryClinics,
    YearlyCommonDisease
};

use App\Models\FarmType;
use LivewireUI\Modal\ModalComponent;


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
    public $farmTypeId;
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
            $farmType = FarmType::find($this->farmTypeId);
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
            } else if ($farmType) {
                $farmType->delete();
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
