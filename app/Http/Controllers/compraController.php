<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;

use SisVentas\Categoria;
use SisVentas\compra;
use SisVentas\Producto;
use SisVentas\Provedor;
use Validator;
use Redirect;
use DB;
use SisVentas\almacen;
use Yajra\Datatables\Datatables;
use Inventario\Http\Requests;
use Illuminate\Support\Facades\Input;
use SisVentas\detallecompra;
class compraController extends Controller
{
    public function index(){
        $cate=Categoria::all();
        $prove=DB::select("SELECT provedor.idprovedor,Concat(tipopersona.nombre,' ',tipopersona.Apellido_pat,' ',tipopersona.Apellido_Materno)as fullname FROM provedor , tipopersona WHERE provedor.tipoPersona_idtipoPersona=tipopersona.idtipoPersona");
        return view('compra.compra',['prove'=>$prove,'cate'=>$cate]);
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
        $query=DB::select("SELECT p.idproducto,p.nombre_pro, p.codigo,p.stock,p.codigo,p.idproducto
            from producto as p WHERE( p.nombre_pro LIKE '%".$produ."%' ) and p.stock=0");
        foreach ($query as $quer)
        {
            $resulta[] = [ 'value' =>$quer->nombre_pro,'codigo' =>$quer->codigo, 'cantidad' =>$quer->stock,'codigo' =>$quer->codigo,'idpr'=>$quer->idproducto];
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
        and p.Apellido_Materno LIKE '%".$prove."%' and c.estado='Activado'");

        foreach ($query as $quer)
        {
            $resulta[] = [ 'id' => $quer->idprovedor, 'value' =>$quer->nombre.' '.$quer->Apellido_pat.' '.$quer->Apellido_Materno];
        }

        $data=array('hecho'=>'si','list_prove'=>$resulta);

        echo json_encode($data);
    }
    public function guardar(Request $request){

        $compra=new  compra();
        $data =$request->get('array');
        $data = implode(',', (array)$data);
        $compra->provedor_idprovedor=$data;
        $compra->producto_idproducto=$data;
        $compra->cantidad=$data;
        $compra->precio_compra=$data;
        $compra->save();
        echo json_encode($compra);

    }

    public function RegistrarProductos(){

        $model = new detallecompra();
        $data = $_POST['array1'];
        $dataProducto = json_decode($data);
        $idproducto= $dataProducto->{"idproducto"};
        $cantidad= $dataProducto->{"cantidad"};
        $monto= $dataProducto->{"monto"};
        $model->id_producto=$idproducto;
        $model->cantidad=$cantidad;
        $model->precio_venta=$monto;
        $model->idcompra=1;
        $model->save();
    }
    public function RegisCompra(){
        $model = new compra();
        $data =$_POST['array2'];
        $dataVenta = json_decode($data);

        $totalventa=$dataVenta->{"ventatotal"};
        $provedor_idprovedor=$dataVenta->{"idpro"};
        $fecha=$dataVenta->{'fechaRegi'};
        $model->precio_compra=$totalventa;
        $model->provedor_idprovedor=$provedor_idprovedor;
        $model->fecha_comp=$fecha;
        $model->save();
    }

    public function RegistrarCompra(Request $request){
        DB::beginTransaction();
        $producto=new Producto();

        $producto->codigo=$request->get('codigo');
        $producto->nombre_pro=$request->get('nombre_pro');
        $producto->idcategoria=$request->get('idcategoria');
        $producto->stock=$request->get('cantidad_pro');
        $producto->descripcion="Prodcuto bueno";
        $producto->imagen="prodcuto_Default.png";
        $producto->estado='Producto Activado';
        $producto->Precio_Pro=$request->get('pre_pro');
        $producto->Fecha_Registro=$request->get('fecha');
        $producto->save();
        $compra=new compra();
        $compra->producto_idproducto=$producto->idproducto;
        $compra->provedor_idprovedor=$request->get('prove');
        $compra->precio_compra=$request->get('total_pago');
        $compra->fecha_comp=$request->get('fecha');
        $compra->save();
        $almacen=new almacen();
        $almacen->compra_compra_id=$compra->compra_id;
        $almacen->idproducto=$compra->producto_idproducto;
        $almacen->save();
        DB::commit();
        echo json_encode($almacen);

    }

    public function listado(){


        return view('compra.listarcompra');
    }

    public function listarCompras(Request $request){
        $compras=DB::select("SELECT compra.precio_compra,compra.fecha_comp ,concat(tipopersona.nombre,' ',tipopersona.Apellido_pat,' ',tipopersona.Apellido_Materno) as fullname FROM compra ,provedor,tipopersona WHERE compra.provedor_idprovedor=provedor.idprovedor and provedor.tipoPersona_idtipoPersona=tipopersona.idtipoPersona");
        if ($request->ajax()){
            return Datatables::of($compras)
                ->make(true);
        }

    }

    public function ListarComprasNuevas(Request $request){
        $com=DB::select("SELECT compra.precio_compra,compra.fecha_comp,tipopersona.idtipoPersona ,Concat(tipopersona.nombre,' ',tipopersona.Apellido_pat,' ',tipopersona.Apellido_Materno)as fullname,producto.codigo,producto.nombre_pro,producto.stock,producto.Fecha_Registro,producto.Precio_Pro,categoria.nombre_cate FROM compra ,almacen,producto,categoria,provedor,tipopersona WHERE almacen.compra_compra_id=compra.compra_id and compra.provedor_idprovedor=provedor.idprovedor and almacen.idproducto=producto.idproducto and producto.idcategoria=categoria.idcategoria and provedor.tipoPersona_idtipoPersona=tipopersona.idtipoPersona");

        if ($request->ajax()){
            return Datatables::of($com)
                ->make(true);
        }
        return view('compra.lisProduNuevos');
    }


















}
