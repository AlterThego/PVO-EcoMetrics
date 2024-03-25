<?php

namespace App\Charts;
use Illuminate\Support\Facades\App;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AnimalDeathTrendChart
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
            // ->setTitle('Animal Death Trend')
            ->addData('Animal Deaths Count', $counts)
            ->setXAxis($years)
            ->setColors(['#B10DC9'])
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            // ->setGrid()
            ->setHeight(475)
            // ->setMarkers(['#E040FB', '#E040FB '], 7, 10)
            ;
    }
}