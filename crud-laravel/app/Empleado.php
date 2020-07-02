<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model{
    protected $fillable = [

        'nombres', 'apellidos', 'cedula', 'email', 'lugar_nacimiento',
        'sexo', 'estado_civil', 'telefono', 'id_dep'

    ];
}
