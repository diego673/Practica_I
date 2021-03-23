<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'nombre',
        'A_paterno',
        'A_materno',
        'rut',
        'asignatura',
        'correo'
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;
    
    protected $keyType = 'int';
}
