<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nombre', 'pais_id'];
    protected $table = 'departamento';
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
