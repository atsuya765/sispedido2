<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function contCarrito(Request $request)
    {
        $id_user = Auth::user()->id;
        if ($request->ajax()) { 
            $cantidad = Carrito::where('id_user', $id_user)->count();
            $data = array('cont_carrito' => $cantidad);
            echo json_encode($data);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset( $request->id) && $request->id >= 0 ) {
            $id_user = Auth::user()->id;
            $carrito = Carrito::find($request->id);
            $carrito->id_platos = $request->id_platos;
            $carrito->cantidad = $request->cantidad;
            $carrito->id_user = $id_user;
            $carrito->save();
            return redirect()->route('client.carrito');
        } else {
            $id_user = Auth::user()->id;
            $carrito = new Carrito();
            $carrito->id_platos = $request->id_platos;
            $carrito->cantidad = $request->cantidad;
            $carrito->id_user = $id_user;
            $carrito->save(); 
            return redirect()->route('client.menu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_user=Auth::user()->id;
        $carrito = new Carrito();
        $carrito->id_platos = $id;
        $carrito->cantidad = 1;
        $carrito->id_user = $id_user;
        $carrito->save();
        return redirect()->route('client.menu');
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
        $carrito = Carrito::find($id);
        $carrito->delete();
        return redirect()->route('client.carrito');
    }
}
