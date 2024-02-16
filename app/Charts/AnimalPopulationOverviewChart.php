<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AnimalPopulationOverviewChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($animalPopulationOverviewData): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $animalIds = $animalPopulationOverviewData->keys()->toArray();
        $populationCounts = $animalPopulationOverviewData->values()->toArray();


        return $this->chart->barChart()
            ->setTitle('Overall Animal Population')
            ->addData('Population', $populationCounts)
            ->setColors(['rgba(54, 162, 235, 1)', '#ff6384'])
            ->setGrid()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(425)
            ->setXAxis($animalIds);
    }
}
