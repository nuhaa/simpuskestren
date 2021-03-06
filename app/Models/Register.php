<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Schedule;

class Register extends Model
{
    protected $fillable = [
      'user_id', 'poly_id', 'no_antrian', 'date_check', 'time_check_start', 'time_check_end', 'status_check'
    ];

    public function polies()
    {
        return $this->hasMany(Poly::class, 'id', 'poly_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'register_id', 'id');
    }
}
