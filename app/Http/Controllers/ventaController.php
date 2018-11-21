<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use function MongoDB\BSON\toJSON;
use SisVentas\detalle_venta;
use SisVentas\venta;

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
        $model->id_producto=$idproducto;
        $model->cantidad=$cantidad;
        $model->precio_venta=$monto;
        $model->idventa=1;
        $model->save();
    }

    public function RegistrarVenta(){
        $model = new venta();
        $data =$_POST['array2'];
        $dataVenta = json_decode($data);

        $totalventa=$dataVenta->{"ventatotal"};
        $cliente_idcliente=$dataVenta->{"idcliente"};

        $model->total_venta=$totalventa;
        $model->cliente_idcliente=$cliente_idcliente;
        $model->save();
    }

    public function ImprimirBoleta(){
        $htmlContent = file_get_contents((resource_path('views/Venta/venta.blade.php')));

        $DOM = new \DOMDocument();
        libxml_use_internal_errors(true);
        $DOM->loadHTML($htmlContent);
        libxml_clear_errors();

        $Header = $DOM->getElementsByTagName('th');
        $Detail = $DOM->getElementsByTagName('td');

        //#Get header name of the table
        foreach($Header as $NodeHeader)
        {
            $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
        }
        //print_r($aDataTableHeaderHTML); die();

        //#Get row data/detail table without header name as key
        $i = 0;
        $j = 0;
        foreach($Detail as $sNodeDetail)
        {
            $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
            $i = $i + 1;
            $j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
        }
        //print_r($aDataTableDetailHTML); die();
        //#Get row data/detail table with header name as key and outer array index as row number
        for($i = 0; $i < count($aDataTableDetailHTML); $i++)
        {
            for($j = 0; $j < count($aDataTableHeaderHTML); $j++)
            {
                $aTempData[$i][$aDataTableHeaderHTML[$j]] = $aDataTableDetailHTML[$i][$j];
            }
        }
        $aDataTableDetailHTML = $aTempData; unset($aTempData);
        print_r($aDataTableDetailHTML); die();
    }

}
