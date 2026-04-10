<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $fillable = [
    'nombre',
    'materias',
    'correo',
    'matricula'
];
}
