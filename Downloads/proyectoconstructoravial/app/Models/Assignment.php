<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function machine(){
        return $this->belongsTo(Machine::class, 'id_machines');
    }

    public function construction(){
        return $this->belongsTo(Construction::class, 'id_constructions');
    }

}
