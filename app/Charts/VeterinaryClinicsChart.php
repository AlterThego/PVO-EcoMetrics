<?php

namespace App\Charts;

use App\Models\VeterinaryClinics;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class VeterinaryClinicsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($data): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        return $this->chart->horizontalBarChart()
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setColors(['#FF6384', '#63B6FF'])
            ->addData('Private', [$data['private']])
            ->addData('Government', [$data['government']])
            ->setHeight(350)
            ->setXAxis(['Count']);
    }
}