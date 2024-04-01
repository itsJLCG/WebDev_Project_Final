<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'stockQuantity' => 'required|integer|min:0',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->stockQuantity = $request->stockQuantity;
        $stock->save();

        return redirect()->route('stocks.index')->with('success', 'Stock quantity updated successfully.');
    }

    public function edit(Stock $stock)
    {
        // You can implement the logic to fetch the stock and pass it to the view
        return view('stocks.edit', compact('stock'));
    }

    public function showGraph()
{
    $stocks = Stock::all(); // Fetch stocks data from database
    return view('stocks.graph', compact('stocks'));
}

}
