<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use App\Imports\ProductsImport;
use App\Imports\BuyingDatesImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required',
        ]);
  
        Excel::import(new ProductsImport, $request->file('file'));

        return back()->with('success', 'products imported successfully.');
    }

    public function index()
    {
        $products = product::get();
  
        return view('dashboard.products', compact('products'));
    }

    public function massDestroy(){
        $products = product::get();
        foreach($products as $product){
            $product->delete();
        }
        return back()->with('success', 'products Was Deleted successfully.');
    }
}
