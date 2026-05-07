<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\OrdenesController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 
});
Route::get('/calificaciones', function () {
    return view('admin/calificacion/cali_estar'); 
});
 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/clientes',[ClientesController::class,'index'])->name('admin.clientes.index');    
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('admin.clientes.create');
Route::post('/clientes/create', [ClientesController::class, 'store'])->name('admin.clientes.store');

Route::post('/orden', [OrdenesController::class, 'create'])->name('ordencreate');
Route::get('/orden/pedidos', [OrdenesController::class, 'index'])->name('orden.pedidos');
Route::get('/orden/detail/{id}',[OrdenesController::class,'detail'])->name('arden.detalle');  
Route::get('/orden/store/{id}',[OrdenesController::class,'store'])->name('orden.finalizar');
Route::get('/contadororden', [OrdenesController::class, 'getcontorden'])->name('contadororden');  

Route::get('/client/carrito',[ClientController::class,'carrito'])->name('client.carrito');  
Route::get('/client/menu',[ClientController::class,'menu'])->name('client.menu');  
Route::get('/client/detail/{id}',[ClientController::class,'detail'])->name('client.detail');  
Route::get('/calificacion',[ClientController::class,'calificacion'])->name('client.calificacion'); 
 
Route::get('/client/starlist',[ClientController::class,'cali_estar'])->name('client.list');  

 
Route::resource('platoss', PlatosController::class); 
Route::get('/platos/destroy/{id}', [PlatosController::class, 'destroy'])->name('platoss.destroy');

Route::resource('usuarios', UsuariosController::class); 
Route::get('/usuarios/destroy/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

Route::resource('carrito', CarritoController::class); 
Route::get('/carrito/destroy/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');

Route::get('/contador', [CarritoController::class, 'contCarrito'])->name('contador');


