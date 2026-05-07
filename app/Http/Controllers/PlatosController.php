<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Platos;

class PlatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request  $request)
    { 
        if (isset($request->estado)) { 
            $platos = Platos::where('Estado', $request->estado)->get();
        } else{ 
            $platos = Platos::all();
        }
        return view('admin.platos.index', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create(Request $request)
    {
         //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function store(Request  $request)
    {
        $txtadjunto = '';
        if ($request->file('imagen')) {
            $archivo = $request->file('imagen');
            $txtadjunto = 'img_' . Str::random(10) . '.png';
            $path = public_path() . '/platos';
            $archivo->move($path, $txtadjunto);
        }
        $txtadjunto2 = '';
        if ($request->file('imagen2')) {
            $archivo = $request->file('imagen2');
            $txtadjunto2 = 'img_2' . Str::random(10) . '.png';
            $path = public_path() . '/platos';
            $archivo->move($path, $txtadjunto2);
        }
        $txtadjunto3 = '';
        if ($request->file('imagen3')) {
            $archivo = $request->file('imagen3');
            $txtadjunto3 = 'img_3' . Str::random(10) . '.png';
            $path = public_path() . '/platos';
            $archivo->move($path, $txtadjunto3);
        }

        if ($request->id==0) {
            $platos = new Platos();
            $platos->Nombre = $request->nombre;
            $platos->Descripcion = $request->descripcion;
            $platos->Precio = $request->precio;
            $platos->Estok = $request->estok;
            $platos->Estok_min = $request->estok_min;
            $platos->Imagen = $txtadjunto;
            $platos->Imagen2 = $txtadjunto2;
            $platos->Imagen3 = $txtadjunto3;
            if ($request->estado == 'on') {
                $platos->Estado = true;
            } else {
                $platos->Estado = false;
            }
            $platos->save();
             
        }else{
            $platos =  Platos::find($request->id);
            $platos->Nombre = $request->nombre;
            $platos->Descripcion = $request->descripcion;
            $platos->Precio = $request->precio;
            $platos->Estok = $request->estok;
            $platos->Estok_min = $request->estok_min;
            if ($request->file('imagen')) {
                $platos->Imagen = $txtadjunto;
            }
            if ($request->file('imagen2')) {
                $platos->Imagen2 = $txtadjunto2;
            }
            if ($request->file('imagen3')) {
                $platos->Imagen3 = $txtadjunto3;
            }
            if ($request->estado == 'on') {
                $platos->Estado = true;
            } else {
                $platos->Estado = false;
            }
            $platos->save();
        } 

        return redirect()->route('platoss.index');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
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
    protected function destroy($id)
    {
        $platos = Platos::find($id); 
        $platos->delete();
        return redirect()->route('platoss.index');
    }
}
