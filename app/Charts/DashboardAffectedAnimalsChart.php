<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\AffectedAnimals;

class DashboardAffectedAnimalsChart
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
            ->addData('Affected Animals Count', $counts)
            ->setXAxis($years)
            ->setColors(['#00FFFF'])
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setGrid()
            ->setHeight(350)
            ->setMarkers(['#FF0000 ', '#E040FB '], 7, 10);
    }
}