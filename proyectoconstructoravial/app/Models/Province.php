<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function constructions()
{
    return $this->hasMany(Construction::class, 'id_province');
}

}
