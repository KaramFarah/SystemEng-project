<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knn extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'age',
        'survival_time',
        'mutations',
        'mutated_genes',
        'tumor_stage',
    ];
}
