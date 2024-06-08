<?php

use App\Models\Sale;
use App\Models\Test;
use App\Models\Support;
use App\Models\Combonation;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

Route::get('/', [DashboardController::class, 'index'])->name('homepage');


Route::get('test' , function(){
    $combonations = Combonation::where('test_id' , 1)
    ->where('support' , '>=' , 1)    // 1
    ->where('confidence' , '>=' , 0.01) // 0.01
    ->orderBy('confidence')
    ->get();

    return view('results' , compact('combonations'));
});
// DashBoard
Route::get('dashboard' , function(){return view('dashboard.pages-blank');})->name('dashboard.blank');
Route::get('dashboard/single-product/{product}' , [DashboardController::class, 'singleProduct'])->name('dashboard.single-product');

// slaes import
Route::get('sales', [SaleController::class, 'index'])->name('dashboard.sales');
Route::post('sales-import', [SaleController::class, 'import'])->name('sales.import');
Route::delete('sales-massDestroy', [SaleController::class, 'massDestroy'])->name('sales.massDestroy');

// Product
Route::get('products', [ProductController::class, 'index'])->name('dashboard.products');
Route::post('products-import', [ProductController::class, 'import'])->name('products.import');
Route::delete('products-massDestroy', [ProductController::class, 'massDestroy'])->name('products.massDestroy');

// TestCase
Route::get('tests', [TestController::class, 'index'])->name('dashboard.tests');
Route::get('tests/generate', [TestController::class, 'generate'])->name('tests.generate');
Route::delete('tests-massDestroy', [ProductController::class, 'massDestroy'])->name('tests.massDestroy');
