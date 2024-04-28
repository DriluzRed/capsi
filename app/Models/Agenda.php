<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{   
    protected $table = 'agenda';
    protected $fillable = [
        'fecha',
        'hora',
        'profesional_id',
        'user_id',
        'turno_id',
        'descripcion',
        'estado',
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function paciente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profesional()
    {
        return $this->belongsTo(User::class, 'profesional_id');
    }
    
}
