<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platos extends Model
{
    use HasFactory;
    protected $table = 'platos';

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Imagen',
        'Imagen2',
        'Imagen3',
        'Estok',
        'Estok-min', 
        'Precio'
    ]; 
    public $timestamps = true; 
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
}
