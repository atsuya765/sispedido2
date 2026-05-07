<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $clientes = Clientes::all();
        return view('admin.clientes.index',compact('clientes'));
    }
    public function create()
    { 
        return view('admin.clientes.create');
    }
    public function store(Request $request)
    { 
        $cliente=new Clientes();
        $cliente->Nombres =$request->nombres;
        $cliente->Apellidos =$request->apellidos;
        $cliente->Direccion =$request->direccion;
        $cliente->Telefono =$request->telefono;
        $cliente->Ruc =$request->ruc;
        $cliente->Correo =$request->correo;
        if($request->estado == 'on'){
            $cliente->Estado =true;
        }else{
            $cliente->Estado =false; 
        }
        $cliente->save();
        return redirect()->route('admin.clientes.index');
    }
}
