<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


class StockChartController extends Controller
{
    public function showChart()
    {
        $stocks = Stock::all();

        $chart = new Chart;
        $chart->labels($stocks->pluck('product_name'));
        $chart->dataset('Stock Quantity', 'bar', $stocks->pluck('stockQuantity'))
            ->backgroundColor('rgba(75, 192, 192, 0.2)')
            ->color('rgba(75, 192, 192, 1)');

        return view('chart', compact('chart'));
    }
}
