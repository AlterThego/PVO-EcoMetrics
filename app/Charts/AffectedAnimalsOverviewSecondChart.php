<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AffectedAnimalsOverviewSecondChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($affectedAnimalsOverviewSecondData): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $animalNames = collect($affectedAnimalsOverviewSecondData)->pluck('animal_name')->toArray();
        $counts = collect($affectedAnimalsOverviewSecondData)->pluck('count')->toArray();

        return $this->chart->horizontalBarChart()
            // ->setTitle('Affected Animals per Kind')
            ->setLabels($animalNames)
            ->addData('Animal Deaths', $counts)
            ->setColors(['#9467bd'])
            ->setGrid()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(600);
    }
}
