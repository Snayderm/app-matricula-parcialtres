<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'email',
        'celular',
        'carreraid',
    ];

public function carrera()
{
    return $this->belongsTo(Carrera::class, 'carreraid');
}
}