<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 
        'waste_category_id', 
        'weight', 
        'total_amount', 
        'status',
        'shipping_type',
        'address',
        'ecopoint_branch',
        'pickup_date',
        'notes',
        'waste_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wasteCategory()
    {
        return $this->belongsTo(WasteCategory::class);
    }
}
