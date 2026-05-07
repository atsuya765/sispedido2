<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Detalle_orden;
use App\Models\Orden;
use App\Models\Platos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdenesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $orden = Orden::where('estado', 1)->get();
        $orden = DB::table('orden')
            ->join('users', 'orden.id_cliente', '=', 'users.id')
            ->select('users.name as nombre', 'orden.*')
            ->where('orden.estado', '=', 1)
            ->get(); 

        return  view('admin.pedidos.index', compact('orden'));
    }
    public function create(Request $request)
    {
        $id_user = Auth::user()->id;
        $orden = new Orden();
        $orden->id_cliente = $id_user;
        $orden->total = $request->subtotal;
        $orden->envio = $request->envio;
        $orden->estado = 1;
        $orden->save();
        $orden->idguardado = $orden->id; 
        $carrito = DB::table('carrito')
            ->join('platos', 'carrito.id_platos', '=', 'platos.id')
            ->select('carrito.id as id_carrito', 'carrito.cantidad as cantidad', 'platos.*')
            ->where('carrito.id_user', '=', $id_user)
            ->get(); 

        $item = 0;   
        foreach($carrito as $row) {
            $item++;
            $detalle_orden = new Detalle_orden();
            $detalle_orden->id_orden = $orden->idguardado;
            $detalle_orden->id_platos = $row->id;
            $detalle_orden->precio = $row->Precio;
            $detalle_orden->cantidad = $row->cantidad;
            $detalle_orden->total =($row->Precio*$row->cantidad);
            $detalle_orden->item = $item;
            $detalle_orden->save();
            $platos =  Platos::find($row->id);
            $platos->Estok = $platos->Estok-1;
            $platos->save();
        }
        
        $car = Carrito::where('id_user',$id_user);
        $car->delete();
        return view('client.calificacion');
    }
    public function detail($id)
    { 
        $orden_detalle = DB::table('detalle_orden')
            ->join('orden', 'detalle_orden.id_orden', '=', 'orden.id')
            ->join('users', 'orden.id_cliente', '=', 'users.id')
            ->join('platos', 'detalle_orden.id_platos', '=', 'platos.id')
            ->select('detalle_orden.item as item','detalle_orden.cantidad as cantidad', 'orden.id as id_orden', 'orden.total as total', 'orden.envio','users.name as name','users.email as email', 'users.direccion as direccion', 'users.telefono as telefono', 'platos.*')
            ->where('detalle_orden.id_orden', '=', $id)
            ->get();  
        return  view('admin.pedidos.detail', compact('orden_detalle'));
    }
    public function store($id)
    {
        $orden =  Orden::find($id);
        $orden->estado = 0;
        $orden->save();
        return redirect()->route('orden.pedidos');
        // return $id;
    }
    public function getcontorden( Request $request)
    { 
        if ($request->ajax()) {
            $cantidad = Orden::where('estado', 1)->count();
            $data = array('cont_orden' => $cantidad);
            echo json_encode($data);
        } 
    }


}
