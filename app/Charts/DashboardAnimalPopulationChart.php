<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardAnimalPopulationChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($latestYearPopulationData): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $animalIds = $latestYearPopulationData->keys()->toArray();
        $populationCounts = $latestYearPopulationData->values()->toArray();
     

        return $this->chart->barChart()
            ->addData('Population', $populationCounts)
            ->setColors(['#008FFB', '#ff6384'])
            ->setGrid()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(350)
            ->setXAxis($animalIds);
    }
}
