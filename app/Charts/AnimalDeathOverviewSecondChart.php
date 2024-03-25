<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AnimalDeathOverviewSecondChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($animalDeathOverviewSecondData): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $animalNames = collect($animalDeathOverviewSecondData)->pluck('animal_name')->toArray();
        $counts = collect($animalDeathOverviewSecondData)->pluck('count')->toArray();

        return $this->chart->horizontalBarChart()
            // ->setTitle('Animal Death per Kind')
            ->setLabels($animalNames)
            ->addData('Animal Deaths', $counts)
            ->setColors(['#8c564b'])
            ->setGrid()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(600);
    }
}