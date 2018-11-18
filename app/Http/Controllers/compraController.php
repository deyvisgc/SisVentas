<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;

use SisVentas\Producto;
use Validator;
use Redirect;
use DB;
use Yajra\Datatables\Datatables;
use Inventario\Http\Requests;
use Illuminate\Support\Facades\Input;
class compraController extends Controller
{
    public function index(){
        return view('compra.compra');
    }

    public function cargarPrdo(){
        $produ=Input::get('texto');
        $resulta=array();
        /**
        $query=DB::table('producto')
        ->where('codigo', 'LIKE', '%'.$produ.'%')
        ->select('Precio_Pro','nombre_pro','codigo','idproducto')
        ->orWhere('nombre_pro', 'LIKE', '%'.$produ.'%')
        ->take(5)->get();
         */
        $query=DB::select("SELECT p.idproducto,p.nombre_pro, p.codigo,p.stock
            from producto as p WHERE( p.nombre_pro LIKE '%".$produ."%' ) and p.stock=0");
        foreach ($query as $quer)
        {
            $resulta[] = [ 'value' =>$quer->nombre_pro,'codigo' =>$quer->codigo, 'cantidad' =>$quer->stock];
        }
        $data=array('hecho'=>'si','list_producto'=>$resulta);

        echo json_encode($data);
    }

    public function cargarProve(){
        $prove=Input::get('texto');
        $resulta=array();
        $query=DB::select("SELECT p.nombre ,p.Apellido_pat,p.Apellido_Materno,p.idtipoPersona,
        c.idprovedor FROM provedor as c , tipopersona as p 
        WHERE c.tipoPersona_idtipoPersona=p.idtipoPersona 
        and p.nombre LIKE '%".$prove."%' and p.Apellido_pat LIKE '%".$prove."%'
        and p.Apellido_Materno LIKE '%".$prove."%' and c.estado='activo'");

        foreach ($query as $quer)
        {
            $resulta[] = [ 'id' => $quer->idprovedor, 'value' =>$quer->nombre.' '.$quer->Apellido_pat.' '.$quer->Apellido_Materno];
        }

        $data=array('hecho'=>'si','list_prove'=>$resulta);

        echo json_encode($data);
    }
}
