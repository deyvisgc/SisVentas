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
                 return '<a data-toggle="modal" data-target="#modal-editProve"  onclick="editarClient('. $id->idcliente . ')" >
<button type="button" class="btn btn-outline-success btn-social-icon-text"><i class="fas fa-pencil-alt btn-icon-append"></i></button></a>
                       <a data-toggle="modal" data-target="#deletProv"   onclick="eliminarCliente('. $id->idcliente . ')" >
                        <button type="button" class="btn btn-outline-success ">
                          <i class="fas fa-trash text-danger"></i>                          
                        </button>
</a>';
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
         'nombre'=>'required ',
         'Apellido_paterno'=>'required ',
         'Apellido_Materno'=>'required ',
         'telefono'=>'required ',
         'Direccion' =>'required ',
         'dni'=>'required |',
         'gmail'=>'required |',
         'Fecha_cumple'=>'required ',
         'Fecha_Ingreso'=>'required ',
         'sexo'=>'required ',


     ];

     $valida=Validator::make(Input::all(),$regla);

     if ($valida->fails()){
         return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
     } else{
         DB::beginTransaction();
         $prove=new TipoPer();
         $prove->nombre=$request->get('nombre');
         $prove->Apellido_pat=$request->get('Apellido_paterno');
         $prove->Apellido_Materno=$request->get('Apellido_Materno');
         $prove->Direccion=$request->get('Direccion');
         $prove->dni=$request->get('dni');
         $prove->telefono=$request->get('telefono');
         $prove->sexo=$request->get('sexo');
         $prove->gmail=$request->get('gmail');
         $prove->Fecha_Ingreso=$request->get('Fecha_Ingreso');
         $prove->Fecha_nacimiento=$request->get('Fecha_cumple');
         $prove->save();

         $provedor=new Client();
         $provedor->tipoPersona_idtipoPersona=$prove->idtipoPersona;
         $provedor->clien_estado=$request->get('estado');
         $provedor->save();
         DB::commit();
     }
echo json_encode($provedor);

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


}
