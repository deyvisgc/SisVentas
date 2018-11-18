<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class ventaController extends Controller
{
    public function index(){

        return view('Venta.venta');

    }
    public function cargar(){
   $produ=Input::get('texto');
   $resulta=array();
   /**
   $query=DB::table('producto')
       ->where('codigo', 'LIKE', '%'.$produ.'%')
       ->select('Precio_Pro','nombre_pro','codigo','idproducto')
       ->orWhere('nombre_pro', 'LIKE', '%'.$produ.'%')
       ->take(5)->get();
*/
   $query=DB::select("SELECT p.idproducto,p.nombre_pro,p.Precio_Pro, p.codigo,p.cantidad
            from producto as p WHERE( p.nombre_pro LIKE '%".$produ."%' Or p.codigo LIKE '%".$produ."%')");
        foreach ($query as $quer)
        {
            $resulta[] = [ 'precio' => $quer->Precio_Pro, 'value' =>$quer->nombre_pro,'codigo' =>$quer->codigo, 'cantidad' =>$quer->cantidad];
        }
        $data=array('hecho'=>'si','list_cliente'=>$resulta);

        echo json_encode($data);
    }
    public function cargarClie(){
        $produ=Input::get('texto');
        $resulta=array();
        $query=DB::select("SELECT p.nombre ,p.Apellido_paterno,p.Apellido_Materno,p.idtipoPersona,
        c.idcliente FROM cliente as c , tipopersona as p 
        WHERE c.tipoPersona_idtipoPersona=p.idtipoPersona 
        and p.nombre LIKE '%".$produ."%' OR p.Apellido_paterno LIKE '%".$produ."%'
        OR p.Apellido_Materno LIKE '%".$produ."%'");

        foreach ($query as $quer)
        {
            $resulta[] = [ 'id' => $quer->idcliente, 'value' =>$quer->nombre.' '.$quer->Apellido_paterno.' '.$quer->Apellido_Materno];
        }

        $data=array('hecho'=>'si','list_cliente'=>$resulta);

        echo json_encode($data);
    }
}
