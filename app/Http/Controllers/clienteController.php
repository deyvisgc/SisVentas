<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use SisVentas\TipoPer;
use Illuminate\Support\Facades\Input;
use SisVentas\Client;
use Yajra\Datatables\Datatables;

class clienteController extends Controller
{
 public function index(){

     $cliente = DB::table('tipopersona')
         ->join('cliente', 'cliente.tipoPersona_idtipoPersona', '=', 'tipopersona.idtipoPersona')
         ->select([
             DB::raw("CONCAT(nombre,' ',Apellido_pat,' ',Apellido_Materno) as fullname"),'Direccion', 'dni',
             'telefono', 'sexo', 'gmail', 'Fecha_Ingreso', 'cliente.idcliente', 'cliente.clien_estado'
         ]);
     if (request()->ajax()) {
         return Datatables::of($cliente)
             ->addColumn('action', function ($id){
                 return '    <span class="dropdown-toggle btn btn-outline-danger" id="languageDropdown" data-toggle="dropdown">Opciones</span>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item font-weight-normal" onclick="DesactiCl('.$id->idcliente.')" >
              <label style="color:#0d47a1;">Desactivar</label>    
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-normal" onclick="ActivCli('.$id->idcliente.')">
                <label style="color:red;">Activar</label>  
                </a>
                  <div class="dropdown-divider"></div>
                <a  class="dropdown-item font-weight-normal" 
data-toggle="modal" data-target="#modal-editProve"  onclick="editarClient('. $id->idcliente . ')"">
                <label style="color:#0f1531;">Actualizar</label>  ';
             })->filterColumn('fullname', function($query, $keyword) {
                 $sql = "CONCAT(nombre,' ',Apellido_pat,' ',Apellido_Materno)  like ?";
                 $query->whereRaw($sql, ["%{$keyword}%"]);
             })->make(true);
     }
     return view('Cliente.Clientes');

 }

 public function crear(Request $request)
 {
     $regla=[
         'nombre'=>'required|min:2|max:32',
         'Apellido_paterno'=>'required|min:2|max:32',
         'Apellido_Materno'=>'required|min:2|max:32',
         'telefono'=>'required|min:2|max:32',
         'Direccion' =>'required|min:2|max:32',
         'dni'=>'required|min:2|max:32',
         'gmail'=>'required|min:2|max:32',
         'Fecha_cumple'=>'required|min:2|max:32',
         'Fecha_Ingreso'=>'required|min:2|max:32',
         'sexo'=>'required|min:2|max:32',
         'estado'=>'required|min:2|max:32',


     ];

     $valida=Validator::make(Input::all(),$regla);

     if ($valida->fails()){
         return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
     } else{
         DB::beginTransaction();
         $prove=new TipoPer();
         $prove->nombre=$request->nombre;
         $prove->Apellido_pat=$request->Apellido_paterno;
         $prove->Apellido_Materno=$request->Apellido_Materno;
         $prove->Direccion=$request->Direccion;
         $prove->dni=$request->dni;
         $prove->telefono=$request->telefono;
         $prove->sexo=$request->sexo;
         $prove->gmail=$request->gmail;
         $prove->Fecha_Ingreso=$request->Fecha_Ingreso;
         $prove->Fecha_nacimiento=$request->Fecha_cumple;
         $prove->save();

         $provedor=new Client();
         $provedor->tipoPersona_idtipoPersona=$prove->idtipoPersona;
         $provedor->clien_estado=$request->get('estado');
         $provedor->save();
         DB::commit();
     }
     return response()->json(array("success"=>true));

 }
 public function cargar($id)
 {
     $clien=DB::select("SELECT tp.idtipoPersona,tp.nombre,tp.Apellido_pat,tp.Apellido_Materno,tp.dni, tp.Direccion,tp.telefono,tp.sexo,tp.gmail,tp.Fecha_Ingreso,tp.Fecha_nacimiento, c.idcliente,c.tipoPersona_idtipoPersona,c.clien_estado FROM cliente as c , tipopersona as
 tp WHERE c.tipoPersona_idtipoPersona=tp.idtipoPersona and c.idcliente=$id");

   echo  json_encode($clien);



 }
 public function actualizar(Request $request,$id){
         $regla=
         [
             'nombress'=>'required ',
             'Apellido_paterno'=>'required ',
             'Apellido_Materno'=>'required ',
             'Direccion' =>'required ',
             'dni'=>'required |',
             'telefono'=>'required ',
             'gmail'=>'required |',
             'Fecha_Ingreso'=>'required ',
             'Fecha_cumple'=>'required ',
         ];

     $valida=Validator::make(Input::all(),$regla);

     if ($valida->fails()){
         return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
     }else{
         DB::beginTransaction();
         $clien=Client::find($id);
         $tipo=TipoPer::find(Input::get('idprod'));
         $tipo->nombre=$request->get('nombress');
         $tipo->Apellido_pat=$request->get('Apellido_paterno');
         $tipo->Apellido_Materno=$request->get('Apellido_Materno');
         $tipo->Direccion=$request->get('Direccion');
         $tipo->dni=$request->get('dni');
         $tipo->telefono=$request->get('telefono');
         $tipo->sexo=$request->get('sexo');
         $tipo->gmail=$request->get('gmail');
         $tipo->Fecha_Ingreso=$request->get('Fecha_Ingreso');
         $tipo->Fecha_nacimiento=$request->get('Fecha_cumple');
         $tipo->update();
         $clien->tipoPersona_idtipoPersona=$tipo->idtipoPersona;
         $clien->clien_estado=$request->get('estado');
         $clien->update();
         DB::commit();


     }

echo  json_encode($clien);

 }

 public  function Desactivar($id){
     DB::table('cliente')
         ->where('idcliente', $id)
         ->update(['clien_estado' => 'Desactivado']);
     return response()->json(array("success"=>true));

 }
    public  function Activar($id){
        DB::table('cliente')
            ->where('idcliente', $id)
            ->update(['clien_estado' => 'Activado']);
        return response()->json(array("success"=>true));

    }


}
