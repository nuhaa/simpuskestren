<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = [
         'register_id', 'doctor_id', 'poly_id', 'first_diagnosis', 'doctor_diagnosis', 'keterangan',
    ];

    public function MedicalRecordsListMedicines()
    {
         return $this->belongsToMany(ListMedicine::class, 'medical_records_list_medicines', 'medical_record_id', 'list_medicine_id');
    }

}
