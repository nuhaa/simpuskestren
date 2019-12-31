<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListMedicine extends Model
{
    protected $fillable = [
        'stock', 'medicine_id', 'price', 'date_buy', 'date_expired', 'information', 'status'
    ];

    public function medicines()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
