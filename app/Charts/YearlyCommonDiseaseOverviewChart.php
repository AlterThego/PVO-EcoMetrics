<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class YearlyCommonDiseaseOverviewChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($yearlyCommonDiseaseOverviewData): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $diseases = collect($yearlyCommonDiseaseOverviewData)->pluck('disease')->toArray();
        $disease_count = collect($yearlyCommonDiseaseOverviewData)->pluck('disease_count')->toArray();

        return $this->chart->horizontalBarChart()
            // ->setTitle('Animal Disease Count')
            ->setLabels($diseases)
            ->addData('Disease Count', $disease_count)
            ->setColors(['#0074D9'])
            ->setGrid()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(675);
    }
}
