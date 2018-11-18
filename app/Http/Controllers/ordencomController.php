<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use SisVentas\Persona;
use SisVentas\Producto;
use SisVentas\Categoria;
use Validator;
use Redirect;
use SisVentas\ordencompra;
use DB;
use Yajra\Datatables\Datatables;
use Inventario\Http\Requests;
use Illuminate\Support\Facades\Input;

class ordencomController extends Controller
{
    public function index(Request $request){

       $orden=DB::select("SELECT producto.idproducto,producto.idcategoria,producto.codigo,producto.nombre_pro,producto.stock,producto.estado,producto.cantidad,producto.Fecha_Registro,producto.Precio_Pro,categoria.idcategoria,categoria.nombre_cate , orden_conpra.idorden_conpra,orden_conpra.fecha_Regis_orde FROM orden_conpra ,producto ,categoria WHERE orden_conpra.producto_idproducto=producto.idproducto and producto.idcategoria=categoria.idcategoria and producto.cantidad<5");
        if ($request->ajax()){
            return Datatables::of($orden)
                ->make(true);
        }
        return view('orden_compra.listarorden');


    }
    public function ProdFalantes(Request $request){

        $orden=DB::select("SELECT producto.idproducto,producto.idcategoria,producto.codigo,producto.nombre_pro,producto.stock,producto.estado,producto.cantidad,producto.Fecha_Registro,producto.Precio_Pro,categoria.idcategoria,categoria.nombre_cate , orden_conpra.idorden_conpra,orden_conpra.fecha_Regis_orde FROM orden_conpra ,producto ,categoria WHERE orden_conpra.producto_idproducto=producto.idproducto and producto.idcategoria=categoria.idcategoria and producto.cantidad=0");
        if ($request->ajax()){
            return Datatables::of($orden)
                ->make(true);
        }
        return view('orden_compra.prodfal');


    }
    public function cargarProd($id){
       $orden=DB::select("SELECT producto.idproducto,producto.idcategoria,producto.codigo,producto.nombre_pro,producto.stock,producto.estado,producto.cantidad,producto.Fecha_Registro,producto.Precio_Pro,categoria.idcategoria,categoria.nombre_cate , orden_conpra.idorden_conpra,orden_conpra.fecha_Regis_orde FROM orden_conpra ,producto ,categoria WHERE orden_conpra.producto_idproducto=producto.idproducto and producto.idcategoria=categoria.idcategoria and orden_conpra.idorden_conpra=$id");
       return response()->json($orden);
    }

    public function actualizarprod(Request $request,$id){

        $regla=[


            'cantidad'=>'required',
            'Fecha_Ingreso'=>'required',


        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));

        } else{
            DB::beginTransaction();
            $inven=ordencompra::find($id);
            $producto=Producto::find(Input::get('idprod'));
            $producto->Fecha_Registro=$request->get('Fecha_Ingreso');
            $producto->cantidad=$request->get('cantidad');
            $producto->update();
            $inven->producto_idproducto=$producto->idproducto;
            $inven->update();
            DB::commit();
        }
        $data=array('hecho'=>'si','campos'=>$producto);
        echo json_encode($data);


    }
}
