<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEscolar extends Model
{
    use HasFactory;
    protected $table = 'nivel_escolar';

    public function user_detalles()
    {
        return $this->hasMany(UserDetalle::class, 'nivel_escolaridad_id');
    }
}
