<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $table = 'seguimientos';

    public function user_detalle()
    {
        return $this->belongsTo(UserDetalle::class);
    }

    public function psicologo()
    {
        return $this->belongsTo(User::class);
    }
}
