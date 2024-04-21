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

class RestoreRow extends ModalComponent
{
    public $animalId;
    public $animalTypeId;
    public $farmTypeId;
    public $fishProductionId;
    public $diseaseId;
    public $municipalityId;
    public $barangayId;
    public $populationId;
    public $animalPopulationId;
    public $affectedAnimalsId;
    public $animalDeathId;
    public $fishProductionAreaId;
    public $fishSanctuariesId;
    public $yearlyCommonDiseaseId;
    public $veterinaryClinicsId;
    public $farmId;
    public $farmSuppliesId;
    public $beeKeeperId;
    public $userId;
    public function render()
    {
        return view('livewire.restore-row');
    }

    public function restoreItem()
    {
        try {
            // Assuming you have a model associated with the item (e.g., Animal)
            $animal = Animal::withTrashed()->find($this->animalId);
            $animalType = AnimalType::withTrashed()->find($this->animalTypeId);
            $farmType = FarmType::withTrashed()->find($this->farmTypeId);
            $fishProductionType = FishProduction::withTrashed()->find($this->fishProductionId);
            $disease = Disease::withTrashed()->find($this->diseaseId);
            $municipality = Municipality::withTrashed()->find($this->municipalityId);
            $barangay = Barangay::withTrashed()->find($this->barangayId);
            $population = Population::withTrashed()->find($this->populationId);
            $animalPopulation = AnimalPopulation::withTrashed()->find($this->animalPopulationId);
            $affectedAnimals = AffectedAnimals::withTrashed()->find($this->affectedAnimalsId);
            $animalDeath = AnimalDeath::withTrashed()->find($this->animalDeathId);
            $fishProductionArea = FishProductionArea::withTrashed()->find($this->fishProductionAreaId);
            $fishSanctuaries = FishSanctuary::withTrashed()->find($this->fishSanctuariesId);
            $yearlyCommonDisease = YearlyCommonDisease::withTrashed()->find($this->yearlyCommonDiseaseId);
            $veterinaryClinics = VeterinaryClinics::withTrashed()->find($this->veterinaryClinicsId);
            $farm = Farm::withTrashed()->find($this->farmId);
            $farmSupplies = FarmSupply::withTrashed()->find($this->farmSuppliesId);
            $beeKeeper = BeeKeeper::withTrashed()->find($this->beeKeeperId);
            $user = User::withTrashed()->find($this->userId);

            if ($animal) {
                $animal->restore();
            } else if ($animalType) {
                $animalType->restore();
            } else if ($farmType) {
                $farmType->restore();
            } else if ($fishProductionType) {
                $fishProductionType->restore();
            } else if ($disease) {
                $disease->restore();
            } else if ($municipality) {
                $municipality->restore();
            } else if ($barangay) {
                $barangay->restore();
            } else if ($population) {
                $population->restore();
            } else if ($animalPopulation) {
                $animalPopulation->restore();
            } else if ($affectedAnimals) {
                $affectedAnimals->restore();
            } else if ($animalDeath) {
                $animalDeath->restore();
            } else if ($fishProductionArea) {
                $fishProductionArea->restore();
            } else if ($fishSanctuaries) {
                $fishSanctuaries->restore();
            } else if ($yearlyCommonDisease) {
                $yearlyCommonDisease->restore();
            } else if ($veterinaryClinics) {
                $veterinaryClinics->restore();
            } else if ($farm) {
                $farm->restore();
            } else if ($farmSupplies) {
                $farmSupplies->restore();
            } else if ($beeKeeper) {
                $beeKeeper->restore();
            } else if ($user) {
                $user->restore();
            }
            // Optionally, you can add a success message
            toastr()->warning('Item restored successfully!', 'Success');

            // Close the modal after restoration
            return redirect()->to(url()->previous());

        } catch (\Exception $e) {
            // Log or handle the exception as needed
            \Log::error('Error restoring item: ' . $e->getMessage());

            // You can add a Toastr message or any other notification here
            toastr()->error('An error occurred while restoring the item. Please try again.', 'Error');

            // Redirect back to the previous page
            return redirect()->to(url()->previous());
        }
    }



}