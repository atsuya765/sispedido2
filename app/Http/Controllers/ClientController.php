<?php

namespace App\Http\Controllers;

use App\Models\Calificacion; 
use App\Models\Platos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
     
    public function index()
    { 
        return view('admin.clientes.index' );
    }
    public function detail(Request $request) 
    {
        $platos =  Platos::find($request->id);
        return view('client.detail', compact('platos'));
    }
    public function menu()
    {   
        $platos = Platos::where('Estado', 1)->get();
         
        return view('client.menu', compact('platos'));
    }
    public function carrito()
    {  
        if (Auth::user()) { 
            $id_user = Auth::user()->id;
            $carrito = DB::table('carrito')
            ->join('platos', 'carrito.id_platos', '=', 'platos.id')
            ->select('carrito.id as id_carrito','carrito.cantidad as cantidad', 'platos.*')
            ->where('carrito.id_user', '=', $id_user)
            ->get();
            return view('client.car', compact('carrito'));
        }
        return view('client.car');
    }
    public function store(Request $request)
    {
        
    }
    public function calificacion(Request $request)
    {
        $id_user = Auth::user()->id;
        if ($request->ajax()) { 
            $calificacion = new Calificacion();
            $calificacion->id_cliente = $id_user;
            $calificacion->puntuacion = $request->cont;
            $calificacion->opinion = $request->opinion;
            $rpt= $calificacion->save(); 
            if($rpt){
                $estado = 1;
            }else{
                $estado = 0;
            }
            echo json_encode($estado);
        }
    } 
    public function cali_estar(Request $request){ 
        if ($request->ajax()) {
            $cont = Calificacion::all()->count(); 
            $calificacion = DB::table('calificacion')
            ->join('users', 'calificacion.id_cliente', '=', 'users.id')
            ->select('users.name as nombres',  'calificacion.*') 
            ->get();

            $data = array('calificacion' => $calificacion, 'cont' => $cont);
            echo json_encode($data);
        }
    }
}
