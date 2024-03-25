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
        $animalNames = collect($animalPopulationOverviewData)->pluck('animal_name')->toArray();
        $counts = collect($animalPopulationOverviewData)->pluck('count')->toArray();

        return $this->chart->barChart()
            // ->setTitle('Overall Animal Population')
            ->addData('Population', $counts)
            ->setColors(['rgba(54, 162, 235, 1)', '#ff6384'])
            ->setGrid()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(370)
            ->setXAxis($animalNames);
    }
}
