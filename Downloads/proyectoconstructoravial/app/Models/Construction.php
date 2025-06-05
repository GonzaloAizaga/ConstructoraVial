<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
protected $casts = [
        'dateStart'  => 'date',  
        'dateFinish' => 'date',
    ];

    public function province()
{
    return $this->belongsTo(Province::class, 'id_province');
}

public function assignments()
{
    return $this->hasMany(Assignment::class, 'id_constructions');
}

}
