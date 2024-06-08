<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Imports\SalesImport;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use App\Imports\BuyingDatesImport;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    public function import(Request $request) 
    {
        set_time_limit(3600);
        $request->validate([
            'file' => 'required',
        ]);
        Excel::import(new SalesImport, $request->file('file'));
        $emptySales = Sale::whereNull('invoiceNo')->get();
        foreach($emptySales as $item)
        $item->delete();
        
        $salesCount = Sale::count();
        $products = Product::all();
        foreach($products as $product){

            $productFrequency = Sale::where('product_name' , $product->name)->count();
            
            $product->update([
                'frequency' => $productFrequency
            ]);
        }

        return back()->with('success', 'Sales imported successfully.');
    }

    public function index()
    {
        $sales = Sale::get();
  
        return view('dashboard.sales', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
    public function massDestroy(){
        $sales = Sale::get();
        foreach($sales as $sale){
            $sale->delete();
        }
        return back()->with('success', 'Sales Was Deleted successfully.');
    }
}
