<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecordsListMedicine extends Model
{
    public function listMedicine()
    {
        return $this->hasMany(ListMedicine::class, 'id', 'list_medicine_id');
    }
}
