<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\AffectedAnimals;
use Illuminate\Support\Facades\Request;

class AffectedAnimalsTrendChart
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

        $isDarkMode = Request::is('dark') || Request::is('*dark*');

        // Define font color dynamically based on dark mode
        $fontColor = $isDarkMode ? '#FFFFFF' : '#808080';

        return $this->chart->areaChart()
            // ->setTitle('Affected Animals with Disease Trend')
            ->addData('Affected Animals Count', $counts)
            ->setXAxis($years)
            ->setColors(['#7f7f7f'])
            ->setFontFamily('Poppins')
            ->setFontColor($fontColor)
            // ->setGrid()
            ->setHeight(475)
            // ->setMarkers(['#0074D9', '#E040FB '], 7, 10)
            ;
    }
}