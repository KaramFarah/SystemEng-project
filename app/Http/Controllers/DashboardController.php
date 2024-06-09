<?php

namespace App\Http\Controllers;

use App\Models\CancerTestCases;
use App\Models\Knn;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Combonation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $salesCount = Sale::distinct('invoiceNo')->get(['invoiceNo'])->count();
        $products = Product::count();
        $topSelling = Combonation::orderBy('combonation_frequency', 'DESC')->distinct('product_a')->get()->take(6);
        
        $examinedCases = CancerTestCases::get()->count();
        $existCases = Knn::get()->count();

        return view('dashboard.index', compact('salesCount', 'products', 'topSelling', 'examinedCases', 'existCases'));
    }
    public function singleProduct(Product $product)
    {
        $sugestion = Combonation::where('active', 1)->where('product_a', $product->name)->get();
        return view('dashboard.single-product', compact('product', 'sugestion'));
    }
}
