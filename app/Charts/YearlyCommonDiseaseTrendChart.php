<?php

namespace App\Charts;

use App\Models\YearlyCommonDisease;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class YearlyCommonDiseaseTrendChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        // Fetch data for the recent 20 years from the YearlyCommonDisease model, ordered by year descending
        $recentYearsData = YearlyCommonDisease::orderBy('year', 'desc')->take(20)->get();

        // Aggregate disease counts for the same year
        $aggregatedData = [];
        foreach ($recentYearsData as $data) {
            $year = $data->year;
            $diseaseCount = $data->disease_count;

            // If the year already exists in aggregatedData, add the disease count
            if (isset($aggregatedData[$year])) {
                $aggregatedData[$year] += $diseaseCount;
            } else {
                // Otherwise, initialize the disease count for the year
                $aggregatedData[$year] = $diseaseCount;
            }
        }

        // Extract years and aggregated disease counts from the aggregated data
        $recentYears = array_keys($aggregatedData);
        $recentYearsDiseaseCounts = array_values($aggregatedData);

        return $this->chart->areaChart()
            // ->setTitle('Disease Trend')
            // ->setSubtitle('Cases of common diseases reported for the recent 20 years')
            ->setXAxis(array_reverse($recentYears))
            ->addData('Cases', array_reverse($recentYearsDiseaseCounts))
            ->setFontFamily('Poppins')
            ->setFontColor('#808080')
            ->setHeight(525);
    }

}