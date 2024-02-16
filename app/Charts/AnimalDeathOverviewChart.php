<?php

namespace App\Charts;

use App\Models\Animal;
use App\Models\AnimalDeath;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AnimalDeathOverviewChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($animalDeathOverviewData): \ArielMejiaDev\LarapexCharts\HorizontalBar
{
    $municipalities = collect($animalDeathOverviewData)->pluck('municipality')->toArray();
    $counts = collect($animalDeathOverviewData)->pluck('count')->toArray();

    return $this->chart->horizontalBarChart()
        ->setLabels($municipalities)
        ->addData('Animal Deaths', $counts)
        ->setColors(['#ff6384'])
        ->setGrid()
        ->setFontFamily('Poppins')
        ->setFontColor('#808080')
        ->setHeight(400);
}
}