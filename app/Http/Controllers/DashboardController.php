<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Models
use App\Models\AffectedAnimals;
use App\Models\Animal;
use App\Models\AnimalDeath;
use App\Models\AnimalPopulation;
use App\Models\AnimalType;
use App\Models\Municipality;
use App\Models\Population;
use App\Models\VeterinaryClinics;
use App\Models\Disease;
use App\Models\YearlyCommonDisease;

// Overview
use App\Charts\AnimalPopulationOverviewChart;
use App\Charts\VeterinaryClinicsChart;
use App\Charts\AnimalDeathOverviewChart;
use App\Charts\AnimalDeathOverviewSecondChart;
use App\Charts\AffectedAnimalsOverviewChart;
use App\Charts\AffectedAnimalsOverviewSecondChart;
use App\Charts\YearlyCommonDiseaseOverviewChart;

// Trend
use App\Charts\YearlyCommonDiseaseTrendChart;
use App\Charts\AffectedAnimalsTrendChart;
use App\Charts\AnimalDeathTrendChart;
use App\Charts\AnimalPopulationTrendChart;

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
        YearlyCommonDiseaseOverviewChart $yearlyCommonDiseaseOverviewChart,

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
        $animalPopulationOverviewData = $this->getAnimalPopulationOverviewData($selectedYear);
        $animalPopulationOverviewChart = $animalPopulationOverviewChart->build($animalPopulationOverviewData);


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

        // Yearly Common Disease Overview
        $yearlyCommonDiseaseOverviewData = $this->getYearlyCommonDiseaseOverviewData($selectedYear);
        $yearlyCommonDiseaseOverviewChart = $yearlyCommonDiseaseOverviewChart->build($yearlyCommonDiseaseOverviewData);
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

        // Affected Animals
        $AffectedAnimalsTrendData = $this->getAffectedAnimalsTrendData();
        $affectedAnimalsTrendChart = $affectedAnimalsTrendChart->build($AffectedAnimalsTrendData);

        // Yearly Common Disease
        $YearlyCommonDiseaseTrendChart = $this->getYearlyCommonDiseaseTrendChart();
        $yearlyCommonDiseaseTrendChart = $yearlyCommonDiseaseTrendChart->build($YearlyCommonDiseaseTrendChart);
        // $yearlyCommonDiseaseTrendChart = $yearlyCommonDiseaseTrendChart->build();


        // Density and Ratio
        $animalDensityAndRatio = [];
        foreach ($municipalities as $municipality) {
            $animalDensityAndRatio[$municipality->id] = $this->calculateAnimalPopulationDensityAndRatio($municipality->id, $selectedYear);
        }

        // Getting previous year for dashboard growth and loss
        $previousYear = $selectedYear - 1;

        // Total Animal Count and last year
        $totalAnimalCountLastYear = AnimalPopulation::where('year', $previousYear)->sum('animal_population_count');
        $totalAnimalCount = AnimalPopulation::where('year', $selectedYear)->sum('animal_population_count');


        // Total Yearly Common Disease and last year
        $totalYearlyDiseaseLastYear = YearlyCommonDisease::where('year', $previousYear)->sum('disease_count');
        $totalYearlyDisease = YearlyCommonDisease::where('year', $selectedYear)->sum('disease_count');


        // Total Yearly Common Disease and last year
        $totalAffectedAnimalsLastYear = AffectedAnimals::where('year', $previousYear)->sum('count');
        $totalAffectedAnimals = AffectedAnimals::where('year', $selectedYear)->sum('count');


        // Total Animal Death
        $totalAnimalDeathLastYear = AnimalDeath::where('year', $previousYear)->sum('count');
        $totalAnimalDeath = AnimalDeath::where('year', $selectedYear)->sum('count');



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
                'animalPopulationsByMunicipality',
                'animalPopulationOverviewChart',
                'animalDeathOverviewChart',
                'animalDeathOverviewSecondChart',
                'affectedAnimalsOverviewChart',
                'affectedAnimalsOverviewSecondChart',
                'veterinaryClinicsChart',
                'yearlyCommonDiseaseOverviewChart',


                // Trend
                'animalPopulationTrendChart',
                'yearlyCommonDiseaseTrendChart',
                'affectedAnimalsTrendChart',
                'animalDeathTrendChart',

                // Compare
                'animalDensityAndRatio',

                // Total
                'totalAnimalCount',
                'totalYearlyDisease',
                'totalAffectedAnimals',
                'totalAnimalDeath',

                'totalAnimalCountLastYear',
                'totalYearlyDiseaseLastYear',
                'totalAffectedAnimalsLastYear',
                'totalAnimalDeathLastYear',



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
    public function getAnimalPopulationOverviewData($selectedYear)
    {
        $animals = Animal::all();

        $data = [];
        foreach ($animals as $animal) {
            $animalPopulationCount = AnimalPopulation::where('year', $selectedYear)
                ->where('animal_id', $animal->id)
                ->sum('animal_population_count');

            $data[] = [
                'year' => $selectedYear,
                'animal_name' => $animal->animal_name,
                'count' => $animalPopulationCount,
            ];
        }

        return $data;
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

        $data = [];

        foreach ($recentYears as $year) {
            $affectedAnimalsRecords = AffectedAnimals::where('year', $year)->get();
            $totalAffectedAnimals = 0;

            foreach ($affectedAnimalsRecords as $record) {
                $totalAffectedAnimals += $record->count;
            }

            $data[$year] = $totalAffectedAnimals;
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

        $data = [];

        foreach ($recentYears as $year) {
            $animalDeathRecords = AnimalDeath::where('year', $year)->get();
            $totalAnimalDeath = 0;

            foreach ($animalDeathRecords as $record) {
                $totalAnimalDeath += $record->count;
            }

            $data[$year] = $totalAnimalDeath;
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

        $data = [];

        foreach ($recentYears as $year) {
            $populationRecords = AnimalPopulation::where('year', $year)->get();

            $totalPopulation = 0;

            foreach ($populationRecords as $record) {
                $totalPopulation += $record->animal_population_count;
            }

            $data[$year] = $totalPopulation;
        }

        ksort($data);

        return $data;
    }

    public function getYearlyCommonDiseaseTrendChart()
    {
        $recentYears = YearlyCommonDisease::distinct('year')
            ->orderBy('year', 'desc')
            ->take(20)
            ->pluck('year')
            ->toArray();

        $data = [];

        foreach ($recentYears as $year) {
            $diseaseRecords = YearlyCommonDisease::where('year', $year)->get();
            $totalDiseaseCount = 0;

            foreach ($diseaseRecords as $record) {
                $totalDiseaseCount += $record->disease_count;
            }

            $data[$year] = $totalDiseaseCount;
        }

        ksort($data);

        return $data;
    }

    // Comparison of Density and Ratio per Municipality
    public function calculateAnimalPopulationDensityAndRatio($municipalityId, $selectedYear)
    {
        // Get total animal population count for the specified municipality and year
        $totalAnimalPopulation = AnimalPopulation::where('municipality_id', $municipalityId)
            ->where('year', $selectedYear)
            ->sum('animal_population_count');

        // Get total human population count for the specified municipality and year
        $totalHumanPopulation = Population::where('municipality_id', $municipalityId)
            ->where('census_year', $selectedYear)
            ->sum('population_count');

        // Calculate density (animals per square kilometer, assuming land area is in square kilometers)
        $municipality = Municipality::find($municipalityId);
        if ($municipality) {
            $density = $totalAnimalPopulation / $municipality->land_area;
        } else {
            $density = null;
        }

        // Check if totalHumanPopulation is greater than zero to avoid division by zero
        if ($totalHumanPopulation > 0) {
            // Calculate ratio of animals to humans
            $ratio = $totalAnimalPopulation / $totalHumanPopulation;
        } else {
            $ratio = null;
        }

        return [
            'density' => $density,
            'ratio' => $ratio,
        ];
    }


    public function getYearlyCommonDiseaseOverviewData($selectedYear)
    {
        // Retrieve all municipalities
        $diseases = Disease::all();

        $data = [];
        foreach ($diseases as $disease) {
            $diseaseCount = YearlyCommonDisease::where('year', $selectedYear)
                ->where('disease_id', $disease->id)
                ->sum('disease_count');

            $data[] = [
                'year' => $selectedYear,
                'disease' => $disease->disease_name,
                'disease_count' => $diseaseCount,
            ];
        }

        return $data;
    }
}