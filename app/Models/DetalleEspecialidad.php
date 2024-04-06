<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEspecialidad extends Model
{
    use HasFactory;

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }
}
