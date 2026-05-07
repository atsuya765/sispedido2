<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $filltable=[ 
        'Nombres',
        'Direccion',
        'Telefono',
        'Correo',
        'Ruc',
        'Estado'
    ];
}
