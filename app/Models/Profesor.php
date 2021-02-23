<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'A_paterno',
        'A_materno',
        'rut',
        'asignatura',
        'correo'
    ];

    protected $primaryKey = 'rut';

    public $incrementing = false;
    
    protected $keyType = 'string';
}
