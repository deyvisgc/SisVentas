<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use Validator;
use SisVentas\Categoria;
use Illuminate\Support\Facades\Input;
use DB;
class categoriaController extends Controller
{

    public function __construct()
    {


    }
    public function index(Request $request){

        if($request->ajax()){
            return Datatables::of(Categoria::query())
                ->addColumn('action',function($cate){
                    return
                        '<button type="button" class="btn btn-outline-warning btnEdit" data-edit="/Categorias/'.$cate->idcategoria.'/edit">Editar</button>
                 <a data-toggle="modal" data-target="#deletD" onclick="eliminar('.$cate->idcategoria.')"> <button type="button" class="btn btn-outline-danger" id=""><i class="glyphicon glyphicon-remove">Eliminar</button></a>
                 
              <span class="dropdown-toggle btn btn-outline-success" id="languageDropdown" data-toggle="dropdown">Estado</span>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item font-weight-normal" onclick="CambiarEsta('.$cate->idcategoria.')" >
              <label style="color:#0d47a1;">Desactivar</label>    
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-normal" onclick="CambiarEs('.$cate->idcategoria.')">
                <label style="color:red;">Activar</label>  
                </a>
                 
                 
                 ';

                })
                ->make(true);
        }
        return view('Categoria.categoria');
    }

    public function store(Request $categoriaFormRequest){

        $Rules =[
            'nombre_Cate' => 'required|min:2|max:32' ,
            'estado' => 'required|min:2|max:32' ,
        ];
        $valida= Validator::make(Input::all(),$Rules);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        }else{
            $categoria=new Categoria();
            $categoria->nombre_cate=$categoriaFormRequest->get('nombre_Cate');
            $categoria->estado=$categoriaFormRequest->get('estado');
            $categoria->save();
            return response()->json(array("success"=>true));
        }
    }

    public function edit($id){
        $data = Categoria::find($id);
        return response()->json($data);

    }
    public function update(Request $request, $id){
        $rules= [
            'nombre' => 'required|min:2|max:32',

        ];

        $message = [
            'nombre.required' => 'El nombre es Obligatorio.',
            'estado.required' => 'El nombre es Obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 7 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 32 caracteres.',



        ];
        $Validator = Validator::make(Input::all(),$rules,$message);

        if ($Validator->fails()) {
            return response()->json(array('errors' => $Validator->getMessageBag()->toArray()));
        }else{
            $crud =Categoria::find($id);
            $crud->nombre_cate = $request->nombre;
            $crud->save();

            return response()->json(array("success"=>true));
        }
    }
    public function delete(){

    }
    public function eliminar($id){
        $depar=Categoria::find($id);
        $depar->delete();
        echo json_encode($depar);
    }
public function canDesactivo($id){
   $cate=Categoria::where('idcategoria',$id)->update(['estado'=>'Desactivado']);
   echo json_encode($cate);

}
    public function canActivo($id){
        $cate=Categoria::where('idcategoria',$id)->update(['estado'=>'Activcado']);
        echo json_encode($cate);

    }
}
