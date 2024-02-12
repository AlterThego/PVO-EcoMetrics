<?php

namespace App\Charts;

use App\Models\YearlyCommonDisease;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardYearlyCommonDisease
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        // Fetch data for the recent 10 years from the YearlyCommonDisease model, ordered by year descending
        $recentYearsData = YearlyCommonDisease::orderBy('year', 'desc')->take(20)->get();

        // Extract disease counts and years from the fetched data
        $recentYearsDiseaseCounts = $recentYearsData->pluck('disease_count')->toArray();
        $recentYears = $recentYearsData->pluck('year')->toArray();

        return $this->chart->areaChart()
            ->setXAxis(array_reverse($recentYears))
            ->addData('Cases', $recentYearsDiseaseCounts)
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(425);
    }
}