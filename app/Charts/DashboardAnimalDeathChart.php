<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardAnimalDeathChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build(array $data): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $years = array_keys($data);
        $counts = array_values($data);

        return $this->chart->lineChart()
            ->addData('Animal Deaths Count', $counts)
            ->setXAxis($years)
            ->setColors(['#FF69B4'])
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setGrid()
            ->setHeight(350)
            ->setMarkers(['#E040FB', '#E040FB '], 7, 10);
    }
}