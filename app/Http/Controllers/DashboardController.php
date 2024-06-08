<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Combonation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $salesCount = Sale::distinct('invoiceNo')->get(['invoiceNo'])->count();
        $products = Product::count();
        $topSelling = Combonation::orderBy('combonation_frequency' , 'DESC')->get()->take(7);


        return view('dashboard.index' , compact('salesCount' , 'products' , 'topSelling'));
    }
}
