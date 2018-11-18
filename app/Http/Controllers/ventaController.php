<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use function MongoDB\BSON\toJSON;
use SisVentas\detalle_venta;

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
   $query=DB::select("SELECT p.idproducto,p.nombre_pro,p.Precio_Pro, p.codigo,p.stock,p.idproducto
            from producto as p WHERE( p.nombre_pro LIKE '%".$produ."%' Or p.codigo LIKE '%".$produ."%') and p.stock>=5");
        foreach ($query as $quer)
        {
            $resulta[] = [ 'precio' => $quer->Precio_Pro, 'value' =>$quer->nombre_pro,'codigo' =>$quer->codigo, 'cantidad' =>$quer->stock,'idproducto'=>$quer->idproducto];
        }
        $data=array('hecho'=>'si','list_cliente'=>$resulta);

        echo json_encode($data);
    }
    public function cargarClie(){
        $produ=Input::get('texto');
        $resulta=array();
        $query=DB::select("SELECT p.nombre ,p.Apellido_pat,p.Apellido_Materno,p.idtipoPersona,
        c.idcliente FROM cliente as c , tipopersona as p 
        WHERE c.tipoPersona_idtipoPersona=p.idtipoPersona 
        and p.nombre LIKE '%".$produ."%' AND p.Apellido_pat LIKE '%".$produ."%'
        AND p.Apellido_Materno LIKE '%".$produ."%'");

        foreach ($query as $quer)
        {
            $resulta[] = [ 'id' => $quer->idcliente, 'value' =>$quer->nombre.' '.$quer->Apellido_pat.' '.$quer->Apellido_Materno];
        }

        $data=array('hecho'=>'si','list_cliente'=>$resulta);

        echo json_encode($data);
    }

    public function RegistrarProductos(){

        $model = new detalle_venta();
        $data = $_POST['array1'];

        $dataProducto = json_decode($data);
        $idproducto= $dataProducto->{"idproducto"};
        $cantidad= $dataProducto->{"cantidad"};
        $monto= $dataProducto->{"monto"};

        $data = array(
            'idventa'=>'1',
           'id_producto'=>$idproducto,
           'cantidad'=>$cantidad,
           'precio_venta'=>$monto
        );

        $model->save($data);
    }
}
