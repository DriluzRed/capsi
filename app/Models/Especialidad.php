<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    public function detalleEspecialidades()
    {
        return $this->hasMany(DetalleEspecialidad::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
