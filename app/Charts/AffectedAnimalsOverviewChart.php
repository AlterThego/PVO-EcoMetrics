<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AffectedAnimalsOverviewChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($affectedAnimalsOverviewData): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $municipalities = collect($affectedAnimalsOverviewData)->pluck('municipality')->toArray();
        $counts = collect($affectedAnimalsOverviewData)->pluck('count')->toArray();

        return $this->chart->horizontalBarChart()
            // ->setTitle('Affected Animals')
            ->setLabels($municipalities)
            ->addData('Affected Aniimals', $counts)
            ->setColors(['#17becf'])
            ->setGrid()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(600);
    }
}
