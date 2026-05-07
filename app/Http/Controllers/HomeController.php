<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Platos;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rol =Auth::user()->rol;
        if ($rol == "cliente") {
            return view('welcome');
        }else{
            $clientes = User::where('rol', 'cliente')->get();
            $ventas = Orden::where('estado', 0)->get();
            $platos = Platos::all();
            return view('home',compact('clientes','ventas','platos'));
        }

    }
}
