<?php

namespace App\Http\Controllers;

// Models
use App\Charts\AffectedAnimalsOverviewSecondChart;
use App\Charts\AnimalPopulationTrendChart;
use App\Models\AffectedAnimals;
use App\Models\Animal;
use App\Models\AnimalDeath;
use App\Models\AnimalPopulation;
use App\Models\AnimalType;
use App\Models\Municipality;
use App\Models\VeterinaryClinics;
use Illuminate\Http\Request;

// Overview
use App\Charts\AnimalPopulationOverviewChart;
use App\Charts\VeterinaryClinicsChart;
use App\Charts\AnimalDeathOverviewChart;
use App\Charts\AnimalDeathOverviewSecondChart;
use App\Charts\AffectedAnimalsOverviewChart;

// Trend
use App\Charts\YearlyCommonDiseaseTrendChart;
use App\Charts\AffectedAnimalsTrendChart;
use App\Charts\AnimalDeathTrendChart;


class DashboardController extends Controller
{
    public function dashboard(
        Request $request,

        // Overview
        AnimalPopulationOverviewChart $animalPopulationOverviewChart,
        VeterinaryClinicsChart $veterinaryClinicsChart,
        AnimalDeathOverviewChart $animalDeathOverviewChart,
        AnimalDeathOverviewSecondChart $animalDeathOverviewSecondChart,
        AffectedAnimalsOverviewChart $affectedAnimalsOverviewChart,
        AffectedAnimalsOverviewSecondChart $affectedAnimalsOverviewSecondChart,

        // Trend
        AnimalPopulationTrendChart $animalPopulationTrendChart,
        YearlyCommonDiseaseTrendChart $yearlyCommonDiseaseTrendChart,
        AffectedAnimalsTrendChart $affectedAnimalsTrendChart,
        AnimalDeathTrendChart $animalDeathTrendChart,

    ) {
        // Years
        // Get the selected year from the request
        $selectedYear = $request->input('year', session('selectedYear'));
        session(['selectedYear' => $selectedYear]);

        // If no year is selected, default to the latest year
        if (!$selectedYear) {
            $selectedYear = AnimalPopulation::max('year');
        }

        // Fetch year and recent year
        $years = AnimalPopulation::distinct()->pluck('year');
        $recentYear = AnimalPopulation::max('year');



        // Overview contents
        // 
        // Animal Type Cards (mostly poultry types)
        $animalTypes = AnimalType::whereNotNull('type')->get();
        $animalPopulationData = $this->getAnimalTypeData($selectedYear, $animalTypes);
        $overallAnimalPopulationCount = array_sum($animalPopulationData);


        // Table Carousel per municipality (Animal Population)
        $animalPopulationsByMunicipality = AnimalPopulation::where('year', $selectedYear)
            ->with('municipality', 'animal')
            ->get()
            ->groupBy('municipality_id');
        $municipalities = Municipality::all();
        $currentSlide = 0;


        // Animal Population Overview Chart
        $animalPopulationOverviewData = $this->getAnimalPopulationData($selectedYear);
        $animalPopulationOverviewChart = $animalPopulationOverviewChart->build($animalPopulationOverviewData);

        // Affected Animals
        $AffectedAnimalsTrendData = $this->getAffectedAnimalsTrendData();
        $affectedAnimalsTrendChart = $affectedAnimalsTrendChart->build($AffectedAnimalsTrendData);


        // Animal Death Overview Data
        $animalDeathOverviewData = $this->getAnimalDeathOverviewData($selectedYear);
        $animalDeathOverviewChart = $animalDeathOverviewChart->build($animalDeathOverviewData);
        // Second Animal Death Chart
        $animalDeathOverviewSecondData = $this->getAnimalDeathOverviewSecondData($selectedYear);
        $animalDeathOverviewSecondChart = $animalDeathOverviewSecondChart->build($animalDeathOverviewSecondData);

        // Affected Animals Overview Data
        $affectedAnimalsOverviewData = $this->getAffectedAnimalsOverviewData($selectedYear);
        $affectedAnimalsOverviewChart = $affectedAnimalsOverviewChart->build($affectedAnimalsOverviewData);

        // Second Animal Death Chart
        $affectedAnimalsOverviewData = $this->getAffectedAnimalsOverviewSecondData($selectedYear);
        $affectedAnimalsOverviewSecondChart = $affectedAnimalsOverviewSecondChart->build($affectedAnimalsOverviewData);

        // Veterinary Clinics Chart
        $veterinaryClinicsChartData = [
            'private' => VeterinaryClinics::where('sector', 'private')->count(),
            'government' => VeterinaryClinics::where('sector', 'government')->count(),
        ];
        $veterinaryClinicsChart = $veterinaryClinicsChart->build($veterinaryClinicsChartData);

        // 
        // End of Overview contents


        // Trend Content
        // 
        // Animal Population  
        $AnimalPopulationTrendData = $this->getAnimalPopulationTrendData();
        $animalPopulationTrendChart = $animalPopulationTrendChart->build($AnimalPopulationTrendData);

        // Animal Death 
        $AnimalDeathTrendData = $this->getAnimalDeathTrendData();
        $animalDeathTrendChart = $animalDeathTrendChart->build($AnimalDeathTrendData);

        // Yearly Common Disease
        $yearlyCommonDiseaseTrendChart = $yearlyCommonDiseaseTrendChart->build();

        return view(
            'dashboard',
            compact(
                // Extras
                'recentYear',
                'currentSlide',
                'years',
                'selectedYear',
                'municipalities',
                'animalTypes',
                'animalPopulationData',
                'overallAnimalPopulationCount',


                // Overview
                'animalPopulationOverviewChart',
                'animalPopulationsByMunicipality',
                'animalDeathOverviewChart',
                'animalDeathOverviewSecondChart',
                'affectedAnimalsOverviewChart',
                'affectedAnimalsOverviewSecondChart',
                'veterinaryClinicsChart',
                

                // Trend
                'animalPopulationTrendChart',
                'yearlyCommonDiseaseTrendChart',
                'affectedAnimalsTrendChart',
                'animalDeathTrendChart',




            )
        );
    }

    private function getLatestYear()
    {
        return AnimalPopulation::max('year');
    }

    // Overview
    // 


    // Animal Population Overview
    public function getAnimalPopulationData($selectedYear)
    {
        return AnimalPopulation::where('year', $selectedYear)
            ->join('animal', 'animal_population.animal_id', '=', 'animal.id')
            ->pluck('animal_population_count', 'animal.animal_name');
    }

    private function getAnimalTypeData($selectedYear, $animalTypes)
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


    public function getAnimalDeathOverviewData($selectedYear)
    {
        // Retrieve all municipalities
        $municipalities = Municipality::all();

        $data = [];
        foreach ($municipalities as $municipality) {
            // Retrieve the count of animal deaths for the given municipality and year
            $deathCount = AnimalDeath::where('year', $selectedYear)
                ->where('municipality_id', $municipality->id)
                ->sum('count');

            // Add the municipality data to the result array
            $data[] = [
                'year' => $selectedYear,
                'municipality' => $municipality->municipality_name,
                'count' => $deathCount,
            ];
        }

        return $data;
    }

    public function getAnimalDeathOverviewSecondData($selectedYear)
    {
        $animals = Animal::all();

        $data = [];
        foreach ($animals as $animal) {
            $deathCount = AnimalDeath::where('year', $selectedYear)
                ->where('animal_id', $animal->id)
                ->sum('count');

            $data[] = [
                'year' => $selectedYear,
                'animal_name' => $animal->animal_name,
                'count' => $deathCount,
            ];
        }

        return $data;
    }

    public function getAffectedAnimalsOverviewData($selectedYear)
    {
        $municipalities = Municipality::all();

        $data = [];
        foreach ($municipalities as $municipality) {
            $affectedAnimalsCount = AffectedAnimals::where('year', $selectedYear)
                ->where('municipality_id', $municipality->id)
                ->sum('count');

            $data[] = [
                'year' => $selectedYear,
                'municipality' => $municipality->municipality_name,
                'count' => $affectedAnimalsCount,
            ];
        }

        return $data;
    }

    public function getAffectedAnimalsOverviewSecondData($selectedYear)
    {
        $animals = Animal::all();

        $data = [];
        foreach ($animals as $animal) {
            $affectedAnimalsSecondCount = AffectedAnimals::where('year', $selectedYear)
                ->where('animal_id', $animal->id)
                ->sum('count');

            $data[] = [
                'year' => $selectedYear,
                'animal_name' => $animal->animal_name,
                'count' => $affectedAnimalsSecondCount,
            ];
        }

        return $data;
    }





    // Trend
    // 

    // Affected Animals Trend
    public function getAffectedAnimalsTrendData()
    {
        $recentYears = AffectedAnimals::distinct('year')
            ->orderBy('year', 'desc')
            ->take(20)
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

    // Animal Death Trend
    public function getAnimalDeathTrendData()
    {
        $recentYears = AnimalDeath::distinct('year')
            ->orderBy('year', 'desc')
            ->take(20)
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


    public function getAnimalPopulationTrendData()
    {
        $recentYears = AnimalPopulation::distinct('year')
            ->orderBy('year', 'desc')
            ->take(20)
            ->pluck('year')
            ->toArray();

        $animalPopulationData = AnimalPopulation::whereIn('year', $recentYears)
            ->get();

        $data = [];
        foreach ($animalPopulationData as $record) {
            $data[$record->year] = $record->animal_population_count;
        }

        ksort($data);

        return $data;
    }









}