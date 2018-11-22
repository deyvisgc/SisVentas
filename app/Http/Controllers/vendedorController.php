<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use Illuminate\Support\Facades\Input;
use SisVentas\Persona;
use SisVentas\Rol;
use SisVentas\vendedor;
use Yajra\Datatables\Datatables;
class vendedorController extends Controller
{

    public function index(){
        $rol=DB::select("SELECT * FROM roles where rol_estado='Activado'");
        $vende = DB::table('persona')
            ->join('vendedor', 'vendedor.persona_idpersona', '=', 'persona.idpersona')
            ->join('roles', 'persona.rol_idrol','=','roles.idroles')
            ->select([
                DB::raw("CONCAT(nombre,' ',Apellido_Pater,' ',Apellido_Mater) as fullname"), 'dni',
                'telefono', 'email', 'Fecha_ingreso', 'vendedor.idVendedor', 'vendedor.estado','.idroles',
                'roles.nombre_rol']);
        if (request()->ajax()) {
            return Datatables::of($vende)
                ->addColumn('action', function ($id){
                    return '
                          <button class="btn btn-outline-warning btn-sm dropdown-toggle"  type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-globe"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                    <a data-toggle="modal" data-target="#mUpdate"  onclick="editarV('. $id->idVendedor . ')"  class="dropdown-item"  style="color: #1b5e20" ">Actualizar</a>
                            <a class="dropdown-item"  style="color: #002a80" onclick="Activar('. $id->idVendedor .')">Activar</a>
                             <a class="dropdown-item"  style="color: red" onclick="Desactivar('. $id->idVendedor .')">Desactivar</a>
                            <div class="dropdown-divider"></div>
                           </div>
                         
                          




';
                })->filterColumn('fullname', function($query, $keyword) {
                    $sql = "CONCAT(nombre,' ',Apellido_Pater,' ',Apellido_Mater)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })->make(true);
        }
        return view('Vendedor.vendedor',['rol'=>$rol]);
    }
    public function store(Request $request){
        $regla=[

            'nombre_ve'=>'required',
            'apellido_pa_V'=>'required',
            'apellido_ma_V'=>'required',
            'dni_Ve'=>'required',
            'Direccion_ve'=>'required',
            'telefono_ve'=>'required',
            'estado_ve'=>'required',
            'rol_ve'=>'required',
            'fecha_ingreso_ve'=>'required',
            'fecha_naci_ve'=>'required',
            'correo_ve'=>'required',
        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        } else{
            DB::beginTransaction();
            $perso=new Persona();
            $perso->nombre=$request->get('nombre_ve');
            $perso->dni=$request->get('dni_Ve');
            $perso->Direccion=$request->get('Direccion_ve');
            $perso->telefono=$request->get('telefono_ve');
            $perso->Apellido_Mater=$request->get('apellido_ma_V');
            $perso->Apellido_Pater=$request->get('apellido_pa_V');
            $perso->Fecha_nacimiento=$request->get('fecha_naci_ve');
            $perso->rol_idrol=$request->get('rol_ve');
            $perso->Fecha_ingreso=$request->get('fecha_ingreso_ve');
            $perso->email=$request->get('correo_ve');
            $perso->save();
            $vende=new vendedor();
            $vende->persona_idpersona=$perso->idpersona;
            $vende->estado=$request->get('estado_ve');
            $vende->save();
            DB::commit();


        }
        return response()->json(array("success"=>true));

    }
    public function cargar($id){

     $ven=DB::select("SELECT p.idpersona,p.nombre,p.dni,p.Direccion,p.telefono,p.email,p.Apellido_Mater,p.Apellido_Pater,p.Fecha_nacimiento,p.rol_idrol,p.Fecha_ingreso,v.idVendedor,v.estado,v.persona_idpersona FROM vendedor as v 
,persona as p WHERE v.persona_idpersona=p.idpersona and v.idVendedor=$id");
     $rol=Rol::all();
     $data=array('vende'=>$ven,'rol'=>$rol);
        return response()->json($data);


    }
    public function actualizar(Request  $request , $id){
        $regla=[

            'nombre_ve'=>'required',
            'apellido_pa_V'=>'required',
            'apellido_ma_V'=>'required',
            'dni_Ve'=>'required',
            'telefono_ve'=>'required',
            'estado_ve'=>'required',
            'rol_ve'=>'required',
            'fecha_ingreso_ve'=>'required',
            'fecha_naci_ve'=>'required',
            'correo_ve'=>'required',
        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        }else{

            $ven=vendedor::find($id);
            $perso=Persona::find(Input::get('idpersona'));
            $perso->nombre=$request->get('nombre_ve');
            $perso->dni=$request->get('dni_Ve');
            $perso->Direccion=$request->get('Direccion_ve');
            $perso->telefono=$request->get('telefono_ve');
            $perso->Apellido_Mater=$request->get('apellido_ma_V');
            $perso->Apellido_Pater=$request->get('apellido_pa_V');
            $perso->Fecha_nacimiento=$request->get('fecha_naci_ve');
            $perso->rol_idrol=$request->get('rol_ve');
            $perso->Fecha_ingreso=$request->get('fecha_ingreso_ve');
            $perso->email=$request->get('correo_ve');
            $perso->update();
            $ven->persona_idpersona=$perso->idpersona;
            $ven->estado=$request->get('estado_ve');
            $ven->update();
        }

        return response()->json($ven);

    }
    public function Eliminar($id){
        $ven=vendedor::find($id);
        $ven->delete();

        return response()->json($ven);

    }
    public function Activar($id){
        $ven=vendedor::where('idVendedor',$id)->update(['estado'=>'Activado']);
        echo json_encode($ven);


    }

    public function Desactivar($id){
        $ven=vendedor::where('idVendedor',$id)->update(['estado'=>'Desactivo']);
        echo json_encode($ven);


    }


}
