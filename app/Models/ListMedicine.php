<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListMedicine extends Model
{
    protected $fillable = [
        'stock'
    ];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'list_medicines', 'medicine_id');
    }
}
