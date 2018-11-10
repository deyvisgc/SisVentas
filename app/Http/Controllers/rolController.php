<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use SisVentas\Rol;
use Validator;
use Redirect;
use DB;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;

class rolController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            return Datatables::of(Rol::query())
                ->addColumn('action',function($rol){
                    return
                        '<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#EditRol"   onclick="editRol('.$rol->idroles.')">Editar</button>
               <a data-toggle="modal" data-target="#deletRol" onclick="eliminar('.$rol->idroles.')"> <button type="button" class="btn btn-outline-danger " id=""><i class="glyphicon glyphicon-remove">Eliminar</button></a>
          
              <span class="dropdown-toggle btn btn-outline-success" id="languageDropdown" data-toggle="dropdown">Estado</span>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item font-weight-normal" onclick="Cambiaresta('.$rol->idroles.')" >
              <label style="color:#0d47a1;">Desactivar</label>    
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-normal" onclick="Cambiarest('.$rol->idroles.')">
                <label style="color:red;">Activar</label>  
                </a>
               
      
            ';

                })
                ->make(true);
        }
        return view('Rol.rol');

    }
    public function store(Request $request){
        $regla=[
            'nombre_rol'=>'required',
            'estado'=>'required',

        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        }else{
            $rol=new Rol();
            $rol->nombre_rol=$request->get('nombre_rol');
            $rol->rol_estado=$request->get('estado');
            $rol->save();
        }
        return json_encode($rol);

    }

    public function cargar($id){

     $rol=DB::select("Select * from roles where idroles=$id");
     return json_encode($rol);

    }
    public function update(Request $request,$id){
        $regla=[
            'nombre_rol'=>'required',


        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        }else{
            $rol=Rol::find($id);
            $rol->nombre_rol=$request->get('nombre_rol');
            $rol->update();
        }
        return json_encode($rol);
    }
    public function canDesactivo($id){
      $ro=DB::table('roles')
          ->where('idroles', $id)
          ->update(['rol_estado' => 'Desactivado']);

      echo json_encode($ro);

    }
public function canActivo($id){
    $ro=DB::table('roles')
        ->where('idroles', $id)
        ->update(['rol_estado' => 'Activo']);

    echo json_encode($ro);
}
}
