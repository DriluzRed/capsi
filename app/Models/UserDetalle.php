<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetalle extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profesion()
    {
        return $this->belongsTo(Profesion::class);
    }
    
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function situacion_laboral()
    {
        return $this->belongsTo(SituacionLaboral::class);
    }

    public function nivel_escolar()
    {
        return $this->belongsTo(NivelEscolar::class, 'nivel_escolaridad_id');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    

}
