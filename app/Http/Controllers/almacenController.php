<?php

namespace SisVentas\Http\Controllers;
use Illuminate\Http\Request;
use SisVentas\Persona;
use SisVentas\Producto;
use SisVentas\Categoria;
use Validator;
use Redirect;
use SisVentas\almacen;
use DB;
use Yajra\Datatables\Datatables;
use Inventario\Http\Requests;
use Illuminate\Support\Facades\Input;
class almacenController extends Controller
{

    public function index(Request $request){

        $producto=DB::select("SELECT producto.idproducto,producto.idcategoria,producto.codigo,producto.nombre_pro,producto.stock,producto.descripcion,producto.estado,producto.Fecha_Registro,producto.Precio_Pro,almacen.idalmacen,categoria.nombre_cate FROM almacen ,producto,categoria WHERE almacen.idproducto=producto.idproducto and producto.idcategoria=categoria.idcategoria");
        if ($request->ajax()){
            return Datatables::of($producto)
                ->make(true);
        }

        return view('almacen.almacen');

    }
    public function cargarInve($id){
        $producto=DB::select("SELECT producto.idproducto,producto.idcategoria,producto.codigo,producto.nombre_pro,producto.stock,producto.descripcion,producto.estado,producto.Fecha_Registro,producto.Precio_Pro,almacen.idalmacen,categoria.nombre_cate FROM almacen ,producto,categoria WHERE almacen.idproducto=producto.idproducto and producto.idcategoria=categoria.idcategoria and almacen.idalmacen=$id");

         return response()->json($producto);
    }
    public function actualizarInv(Request $request,$id){

        $regla=[


            'Fecha_Ingreso'=>'required',
            'stock'=>'required',

        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));

        } else{
            DB::beginTransaction();
            $inven=almacen::find($id);
            $producto=Producto::find(Input::get('idprod'));
            $producto->Fecha_Registro=$request->get('Fecha_Ingreso');
            $producto->stock=$request->get('stock');
            $producto->update();
            $inven->idproducto=$producto->idproducto;
            DB::commit();
        }
        $data=array('hecho'=>'si','campos'=>$producto);
        echo json_encode($data);

    }
}
