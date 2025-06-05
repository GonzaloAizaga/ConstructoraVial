<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machines_type extends Model
{
    public function machines()
    {
        return $this->hasMany(Machine::class, 'id_machines_type');
    }
}
