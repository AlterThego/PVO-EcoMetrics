<?php

namespace App\Http\Controllers;

use App\Charts\DashboardAffectedAnimalsChart;
use App\Charts\DashboardAnimalDeathChart;
use App\Charts\DashboardAnimalPopulationChart;
use App\Charts\DashboardYearlyCommonDisease;
use App\Charts\VeterinaryClinicsChart;
use App\Models\AffectedAnimals;
use App\Models\AnimalDeath;
use App\Models\AnimalPopulation;
use App\Models\AnimalType;
use App\Models\Municipality;
use App\Models\VeterinaryClinics;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(
        DashboardAnimalPopulationChart $chart,
        DashboardAffectedAnimalsChart $affectedAnimalsChart,
        DashboardAnimalDeathChart $animalDeathChart,
        DashboardYearlyCommonDisease $yearlyCommonDiseaseChart,
        VeterinaryClinicsChart $veterinaryClinicsChart,
    ) {
        $latestYearPopulationData = $this->getLatestYearPopulationData();
        $recentYearsAffectedAnimalsData = $this->getRecentYearsAffectedAnimalsData();
        $recentYearAnimalDeathData = $this->getRecentYearsAnimalDeathData();


        // Animal Population
        $chart = $chart->build($latestYearPopulationData);

        // Affected Animals
        $affectedAnimalsChart = $affectedAnimalsChart->build($recentYearsAffectedAnimalsData);

        // Animal Death
        $animalDeathChart = $animalDeathChart->build($recentYearAnimalDeathData);

        // Yearly Common Disease
        $yearlyCommonDiseaseChart = $yearlyCommonDiseaseChart->build();

        // Animal Type Cards
        $animalTypes = AnimalType::whereNotNull('type')->get();
        $animalPopulationData = $this->getLatestAnimalPopulationData($animalTypes);
        $overallCount = array_sum($animalPopulationData);

        // Veterinary Clinics Chart
        $veterinaryClinicsChartData = [
            'private' => VeterinaryClinics::where('sector', 'private')->count(),
            'government' => VeterinaryClinics::where('sector', 'government')->count(),
        ];
        $veterinaryClinicsChart = $veterinaryClinicsChart->build($veterinaryClinicsChartData);

        // Animal Population Data
        $recentYear = AnimalPopulation::max('year');

        $animalPopulationsByMunicipality = AnimalPopulation::where('year', $recentYear)
            ->with('municipality', 'animal')
            ->get()
            ->groupBy('municipality_id');
        $municipalities = Municipality::all();
        $currentSlide = 0; 


        return view(
            'dashboard',
            compact(
                'chart',
                'affectedAnimalsChart',
                'animalDeathChart',
                'yearlyCommonDiseaseChart',
                'animalTypes',
                'animalPopulationData',
                'overallCount',
                'veterinaryClinicsChart',
                'animalPopulationsByMunicipality',
                'municipalities',
                'recentYear',
                'currentSlide'
            )
        );
    }


    public function getLatestYearPopulationData()
    {
        // Get the latest year's population data from the database
        $latestYear = AnimalPopulation::max('year');

        $populationData = AnimalPopulation::where('year', $latestYear)
            ->join('animal', 'animal_population.animal_id', '=', 'animal.id')
            ->pluck('animal_population_count', 'animal.animal_name');

        return $populationData;
    }

    public function getRecentYearsAffectedAnimalsData()
    {
        // Get the distinct years from the affected animals data in descending order and limit to 6 years
        $recentYears = AffectedAnimals::distinct('year')
            ->orderBy('year', 'desc')
            ->take(6)
            ->pluck('year')
            ->toArray();

        // Query the affected animals data for the recent 6 years
        $affectedAnimalsData = AffectedAnimals::whereIn('year', $recentYears)
            ->get();

        // Organize the data into an associative array with years as keys and counts as values
        $data = [];
        foreach ($affectedAnimalsData as $record) {
            $data[$record->year] = $record->count;
        }

        ksort($data);

        return $data;
    }

    public function getRecentYearsAnimalDeathData()
    {
        // Get the distinct years from the affected animals data in descending order and limit to 6 years
        $recentYears = AnimalDeath::distinct('year')
            ->orderBy('year', 'desc')
            ->take(6)
            ->pluck('year')
            ->toArray();

        // Query the affected animals data for the recent 6 years
        $animalDeathdata = AnimalDeath::whereIn('year', $recentYears)
            ->get();

        // Organize the data into an associative array with years as keys and counts as values
        $data = [];
        foreach ($animalDeathdata as $record) {
            $data[$record->year] = $record->count;
        }

        ksort($data);

        return $data;
    }

    private function getLatestAnimalPopulationData($animalTypes)
    {
        $animalPopulationData = [];

        // Get the most recent year
        $latestYear = AnimalPopulation::max('year');

        foreach ($animalTypes as $animalType) {
            // Get the latest animal population data for the current animal type and latest year
            $latestPopulationData = AnimalPopulation::where('animal_type_id', $animalType->id)
                ->where('year', $latestYear)
                ->first();

            // If there's no population data for this type, set count to 0
            if (!$latestPopulationData) {
                $count = 0;
            } else {
                $count = $latestPopulationData->animal_population_count;
            }

            $animalPopulationData[$animalType->type] = $count;
        }

        return $animalPopulationData;
    }


}
