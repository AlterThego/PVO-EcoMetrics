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
            // ->setTitle('Veterinary Clinics per Sector')
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setColors(['rgba(255, 99, 132, 0.9)', 'rgba(255, 205, 86, 0.9)'])
            ->addData('Private', [$data['private']])
            ->addData('Government', [$data['government']])
            ->setHeight(370)
            ->setXAxis(['Count']);
    }
}