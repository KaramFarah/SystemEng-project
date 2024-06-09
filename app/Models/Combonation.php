<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combonation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getFirstProductAttribute(){
        return Product::where('name' , $this->product_a)->first();
    }
    public function getSecondProductAttribute(){
        return Product::where('name' , $this->product_b)->first();
    }
}
