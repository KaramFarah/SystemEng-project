<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Customer;
use App\Models\BuyingDates;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{

    public function model(array $row)
    {
        $productName = $row[2];
        if(Product::where('name' , $productName)->count() == 0)
        return new Product([
            'name' => $productName
        ]);

    }
}
