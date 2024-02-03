<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\AnimalPopulation;

class AnimalPopulationChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Fetch total animal population count for all municipalities for the latest 6 years
        $totalPopulationData = AnimalPopulation::select('year', \DB::raw('SUM(animal_population_count) as total_population_count'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->take(6) 
            ->get();

        // Extract years and total population counts from the fetched data
        $years = $totalPopulationData->pluck('year')->toArray();
        $totalPopulationCounts = $totalPopulationData->pluck('total_population_count')->toArray();

        // Build and configure the chart using the fetched data
        return $this->chart->lineChart()
            // ->setTitle('Total Animal Population Across Municipalities')
            // ->setSubtitle('Latest 6 Years')
            ->addData('Total Animal Population', array_reverse($totalPopulationCounts))
            ->setXAxis(array_reverse($years))
            ->setColors(['#ff6384'])
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setGrid()
            ->setHeight(400);
            // ->setSparkline();
            // ->setWidth(600);
    }



}
