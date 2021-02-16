<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Academico extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estudiante';

    public $incrementing = false;
    
    protected $keyType = 'int';
}
