<?php

namespace App\Charts;

use App\Models\AnimalPopulation;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class YearlyCommonDiseaseTrendChart
{

    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build(array $data): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $years = array_keys($data);
        $counts = array_values($data);

        return $this->chart->areaChart()
            // ->setTitle('Animal Population Trend')
            // ->setSubtitle('For the past 20 years')
            ->addData('Yearly Common Disease', $counts)
            ->setXAxis($years)
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            // ->setGrid()
            ->setHeight(450)
            // ->setMarkers(['#FF5722', '#E040FB'], 7, 10)
        ;
    }
}