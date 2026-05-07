<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{ 
    use HasFactory;
    protected $table = 'carrito';

    protected $fillable = [
        'id_platos',
        'cantidad',
        'id_user'
    ];
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
}
