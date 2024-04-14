<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'departamento_id'];
    protected $table = 'ciudad';
    public function userDetalles()
    {
        return $this->hasMany(UserDetalle::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
