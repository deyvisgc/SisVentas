<?php

namespace SisVentas\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use SisVentas\Persona;
use SisVentas\Producto;
use SisVentas\Categoria;
use Validator;
use Redirect;

use DB;
use Yajra\Datatables\Datatables;
use Inventario\Http\Requests;
use Illuminate\Support\Facades\Input;
class ProductoController extends Controller
{
    public  function index(Request $request){
        $cate=Categoria::all();


        $producto=DB::select("SELECT p.idproducto,p.idcategoria,p.codigo,p.nombre_pro,p.descripcion,p.imagen,p.estado,p.cantidad,p.Fecha_Registro,categoria.nombre_cate FROM producto as p , categoria  WHERE p.idcategoria=categoria.idcategoria");
        if ($request->ajax()){
            return Datatables::of($producto)
                ->addColumn('action', function ($id){

                    return '<a data-toggle="modal" data-target="#modal-editProve"  onclick="editar('. $id->idproducto . ')" >
<button type="button" class="btn btn-outline-success btn-social-icon-text"><i class="fas fa-pencil-alt btn-icon-append"></i></button></a>
                       <a data-toggle="modal" data-target="#deletProv"   onclick="eliminar('. $id->idproducto . ')" >
                        <button type="button" class="btn btn-outline-success ">
                          <i class="fas fa-trash text-danger"></i>                          
                        </button>
</a>';
                })->addColumn('imagen', function ($producto){
                    $url= asset('Imagenes/Producto/'.$producto->imagen);
                    return '<img src="'.$url.'"  height="60px" width="60px"/>';


                })->rawColumns(['imagen', 'action'])->make(true);
        }

        return view('Producto.producto',["cate"=>$cate]);
    }

    public function store(Request $request){

     $regla=[

         'nombre_pro'=>'required',
         'Codigo'=>'required',
         'cantidad'=>'required',
         'descripccion'=>'required',
         'estado'=>'required',
         'categoria'=>'required',
         'Fecha_Ingreso'=>'required',
         'imagen'=>'required',


     ];
     $valida=Validator::make(Input::all(),$regla);
     if($valida->fails()){
         return response()->json(array('errors' => $valida->getMessageBag()->toArray()));

     } else{
        $producto=new  Producto();
        $producto->	nombre_pro=$request->get('nombre_pro');
        $producto->codigo=$request->get('Codigo');
        $producto->descripcion=$request->get('descripccion');
        $producto->idcategoria=$request->get('categoria');
        $producto->estado=$request->get('estado');
        $producto->Fecha_Registro=$request->get('Fecha_Ingreso');
        $producto->cantidad=$request->get('cantidad');
        if($producto->imagen==null){
            if(Input::HasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/Imagenes/Producto',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
            }
        } else{
            $producto->imagen='imagen-default.jpg';
        }

        $producto->save();
        }
         $data=array('hecho'=>'si','campos'=>$producto);
         echo json_encode($data);
     }


}
