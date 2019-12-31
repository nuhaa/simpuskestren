<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function polies()
    {
        return $this->hasMany(Poly::class, 'id', 'poly_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
}
