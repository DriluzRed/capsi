<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEspecialidad extends Model
{
    use HasFactory;
    protected $table = 'user_especialidades';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }
}
