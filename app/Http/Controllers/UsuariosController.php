<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; 

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        if ($request->id == 0) {
            $users = new user();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->rol ='admin';
            $users->tipo_doc = $request->tipo_doc;
            $users->num_doc = $request->num_doc;
            $users->telefono = $request->telefono;
            $users->lugar = $request->lugar;
            $users->direccion = $request->direccion;
            $users->password = Hash::make($request->password);
            $users->save();
        } else {
            $users =  User::find($request->id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->rol = 'admin';
            $users->tipo_doc = $request->tipo_doc;
            $users->num_doc = $request->num_doc;
            $users->telefono = $request->telefono;
            $users->lugar = $request->lugar;
            $users->direccion = $request->direccion;  
            $users->save();
        }
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('usuarios.index');
    }
}
