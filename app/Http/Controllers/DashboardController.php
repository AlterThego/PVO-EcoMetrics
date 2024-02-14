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
        Request $request,
        DashboardAnimalPopulationChart $animalPopulationChart,
        DashboardAffectedAnimalsChart $affectedAnimalsChart,
        DashboardAnimalDeathChart $animalDeathChart,
        DashboardYearlyCommonDisease $yearlyCommonDiseaseChart,
        VeterinaryClinicsChart $veterinaryClinicsChart
    ) {
        // Get the selected year from the request
        $selectedYear = $request->input('year', session('selectedYear'));
        $years = AnimalPopulation::distinct()->pluck('year');
        
        session(['selectedYear' => $selectedYear]);

        // If no year is selected, default to the latest year
        if (!$selectedYear) {
            $selectedYear = AnimalPopulation::max('year');
        }

        // Pass the selected year to the data retrieval methods
        $latestYearPopulationData = $this->getLatestYearPopulationData($selectedYear);
        $recentYearsAffectedAnimalsData = $this->getRecentYearsAffectedAnimalsData($selectedYear);
        $recentYearAnimalDeathData = $this->getRecentYearsAnimalDeathData($selectedYear);

        // Animal Population
        $animalPopulationChart = $animalPopulationChart->build($latestYearPopulationData);

        // Affected Animals
        $affectedAnimalsChart = $affectedAnimalsChart->build($recentYearsAffectedAnimalsData);

        // Animal Death
        $animalDeathChart = $animalDeathChart->build($recentYearAnimalDeathData);

        // Yearly Common Disease
        $yearlyCommonDiseaseChart = $yearlyCommonDiseaseChart->build();

        // Animal Type Cards
        $animalTypes = AnimalType::whereNotNull('type')->get();
        $animalPopulationData = $this->getLatestAnimalPopulationData($selectedYear, $animalTypes);
        $overallCount = array_sum($animalPopulationData);

        // Veterinary Clinics Chart
        $veterinaryClinicsChartData = [
            'private' => VeterinaryClinics::where('sector', 'private')->count(),
            'government' => VeterinaryClinics::where('sector', 'government')->count(),
        ];
        $veterinaryClinicsChart = $veterinaryClinicsChart->build($veterinaryClinicsChartData);

        // Animal Population Data
        $recentYear = AnimalPopulation::max('year');

        $animalPopulationsByMunicipality = AnimalPopulation::where('year', $selectedYear)
            ->with('municipality', 'animal')
            ->get()
            ->groupBy('municipality_id');
        $municipalities = Municipality::all();
        $currentSlide = 0;

        return view('dashboard', compact(
            'animalPopulationChart',
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
            'currentSlide',
            'years',
            'selectedYear'
        ));
    }

    // Retrieve latest year population data
    public function getLatestYearPopulationData($selectedYear)
    {
        return AnimalPopulation::where('year', $selectedYear)
            ->join('animal', 'animal_population.animal_id', '=', 'animal.id')
            ->pluck('animal_population_count', 'animal.animal_name');
    }

    // Retrieve recent years affected animals data
    public function getRecentYearsAffectedAnimalsData($selectedYear)
    {
        $recentYears = AffectedAnimals::distinct('year')
            ->orderBy('year', 'desc')
            ->take(6)
            ->pluck('year')
            ->toArray();

        $affectedAnimalsData = AffectedAnimals::whereIn('year', $recentYears)
            ->get();

        $data = [];
        foreach ($affectedAnimalsData as $record) {
            $data[$record->year] = $record->count;
        }

        ksort($data);

        return $data;
    }

    // Retrieve recent years animal death data
    public function getRecentYearsAnimalDeathData($selectedYear)
    {
        $recentYears = AnimalDeath::distinct('year')
            ->orderBy('year', 'desc')
            ->take(6)
            ->pluck('year')
            ->toArray();

        $animalDeathdata = AnimalDeath::whereIn('year', $recentYears)
            ->get();

        $data = [];
        foreach ($animalDeathdata as $record) {
            $data[$record->year] = $record->count;
        }

        ksort($data);

        return $data;
    }

    // Retrieve latest animal population data
    private function getLatestAnimalPopulationData($selectedYear, $animalTypes)
    {
        $animalPopulationData = [];

        foreach ($animalTypes as $animalType) {
            $latestPopulationData = AnimalPopulation::where('animal_type_id', $animalType->id)
                ->where('year', $selectedYear)
                ->first();

            if (!$latestPopulationData) {
                $count = 0;
            } else {
                $count = $latestPopulationData->animal_population_count;
            }

            $animalPopulationData[$animalType->type] = $count;
        }

        return $animalPopulationData;
    }

    // Retrieve latest year from database
    private function getLatestYear()
    {
        return AnimalPopulation::max('year');
    }
}