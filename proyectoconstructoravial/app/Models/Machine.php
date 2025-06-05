<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['serial_number', 'model', 'kilometers', 'id_machines_type'];

    public function machines_type(){
        return $this->belongsTo(Machines_type::class, 'id_machines_type');
    }
    public function assignments(){
        return $this->hasMany(Assignment::class, 'id_machines');
    }

}
