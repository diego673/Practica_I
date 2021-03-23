<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'nombre',
        'A_paterno',
        'A_materno',
        'rut',
        'correo'
    ];


    protected $primaryKey = 'id';

    public $incrementing = false;
    
    protected $keyType = 'int';
}
