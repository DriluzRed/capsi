<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre'];
    public function detalleEspecialidades()
    {
        return $this->hasMany(DetalleEspecialidad::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
