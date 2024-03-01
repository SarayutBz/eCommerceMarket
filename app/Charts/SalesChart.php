<?php

// app/Charts/SalesChart.php
// app/Charts/SalesChart.php
namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SalesChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $this->labels(['January', 'February', 'March', 'April', 'May']);
        $this->dataset('Sales', 'line', [10, 25, 30, 15, 20])
            ->color('rgba(75, 192, 192, 0.2)')
            ->backgroundcolor('rgba(75, 192, 192, 1)');
    }
}
