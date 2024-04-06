<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    public function userDetalles()
    {
        return $this->hasMany(UserDetalle::class);
    }

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class);
    }
}
