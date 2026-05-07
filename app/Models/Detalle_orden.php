<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_orden extends Model
{
    use HasFactory;
    protected $table = 'detalle_orden';

    protected $fillable = [
        'id_orden',
        'id_platos',
        'precio',
        'cantidad',
        'total',
        'item'
    ];
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
}
