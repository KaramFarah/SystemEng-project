<?php

namespace App\Imports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\ToModel;

class SalesImport implements ToModel
{

    public function model(array $row)
    {
        $items = explode(',', $row[2]);
        foreach($items as $key => $value){
            Sale::create([
                'invoiceNo'     => $row[3],
                'product_name'    => $value,
            ]);
        }
        return new Sale();
        
    }
}
