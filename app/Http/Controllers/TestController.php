<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Test;
use App\Models\Product;
use App\Models\Support;
use App\Models\Combonation;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        return view('dashboard.tests');
    }

    public function generate(){
        set_time_limit(3600);
        $min_sup = request()->min_supp;
        $min_conf = request()->min_conf;
        // generating a Test
            $test = Test::create([
                'min_supp' => $min_sup,
                'min_confidence' => $min_conf
            ]);
        // END generating a Test

        // generating support table for the test parameters and the products that we have
            $productsData = Product::all();
            $salesCount = Sale::distinct('invoiceNo')->get(['invoiceNo'])->count();
            foreach($productsData as $product){

                // عدد المناقلات يلي ظهر فيها المنتج
                $ProductFrequency = Sale::where('product_name', $product->name)->count();

                
                $productSupport = number_format(($ProductFrequency / $salesCount) * 100, 2);
                $supp = Support::create([
                    'test_id'           => $test->id,
                    'product_name'      => $product->name,
                    'product_frequency' => $ProductFrequency,
                    'support'           => $productSupport 
                ]);
                
            }
        // END generating support table
        // dd('we here');
        // generating combonations that meets the minimum support and conf
            // products that satisfy minmium Support condition
            $productsA = Support::where('test_id', $test->id)
            ->where('support', '>=', $min_sup)
            ->get();
            // dd($productsA);
            foreach($productsA as $productA){

                $productsB = Support::where('test_id', $test->id)
                ->where('support', '>=', $min_sup)
                ->get();
                // dd('product B' , $productsB);
                foreach($productsB as $productB){

                    // we already examend this combonations in the first loop
                    $jumB = Combonation::where('product_a', $productB->product_name)->count();

                    if($jumB > 0){

                    }else{
                        // we dont need combonations of the same item
                        if($productA->product_name == $productB->product_name){}
                        else{
                            Combonation::create([
                                'test_id' => $test->id,
                                'product_a' => $productA->product_name,
                                'product_b' => $productB->product_name,
                                'combonation_frequency' => 0,
                                'support' => 0,
                            ]);
                        }
                    }
                }
            }
        // END generating combonations
        // dd('we here');
        //getting all combonations we created for this test

        $testCombonations = Combonation::where('test_id', $test->id)->get();
            
        foreach($testCombonations as $combo){
            $product_a = $combo -> product_a;
            $product_b = $combo -> product_b;

            // total transactions count
            $totalInvoices = Sale::distinct('invoiceNo')->get(['invoiceNo']);
            
            $combonation_frequency = 0;

            foreach($totalInvoices as $invoice){
                
                $a_buffer = Sale::where('invoiceNo', $invoice->invoiceNo) -> where('product_name', $product_a) -> count();
                $b_buffer = Sale::where('invoiceNo', $invoice->invoiceNo) -> where('product_name', $product_b) -> count();
                
                if($a_buffer == 1 && $b_buffer == 1){
                    $combonation_frequency++;
                }
            }
            $support = number_format(($combonation_frequency / $salesCount) * 100 , 2);
            
            $confidence = number_format( $support / Product::where('name' , $product_a)->first()->frequency , 2) ;

            Combonation::where('test_id', $test->id) 
            ->where('id', $combo->id)
            ->update([
                'combonation_frequency' => $combonation_frequency,
                'confidence' => $confidence, 
                'support' => $support
            ]);
        }
        


        $combonations = Combonation::where('test_id' , 1)
        ->where('support' , '>=' , $min_sup)    // 1
        ->where('confidence' , '>=' , $min_conf) // 0.01
        ->orderBy('confidence')
        ->get();
        foreach($combonations as $combo){
            $combo->update([
                'active' => 1,
            ]);
        }
        return view('dashboard.results' , compact('combonations'));
    }
}
