<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteCategory extends Model
{
    protected $fillable = [
        'category',
        'sub_category',
        'name',
        'price_per_kg',
        'trend',
        'trend_amount'
    ];
}
