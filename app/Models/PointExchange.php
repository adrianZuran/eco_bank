<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointExchange extends Model
{
    protected $fillable = ['user_id', 'reward_type', 'points_deducted', 'account_info', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
