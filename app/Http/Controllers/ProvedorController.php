<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use Illuminate\Support\Facades\Input;
use SisVentas\Provedor;
use SisVentas\TipoPer;
use Yajra\Datatables\Datatables;

class ProvedorController extends Controller
{
    public function index(){

        $produc = DB::table('tipopersona')
            ->join('provedor', 'provedor.tipoPersona_idtipoPersona', '=', 'tipopersona.idtipoPersona')
            ->select([

               DB::raw("CONCAT(nombre,' ',Apellido_paterno,' ',Apellido_Materno) as fullname"),'Direccion', 'dni',
                'telefono', 'sexo', 'gmail', 'Fecha_Ingreso', 'provedor.idprovedor', 'provedor.estado'
            ]);
        if (request()->ajax()) {

            return Datatables::of($produc)
                ->addColumn('action', function ($id){

                    return '<a data-toggle="modal" data-target="#modal-editProve"  onclick="editar('. $id->idprovedor . ')" >
<button type="button" class="btn btn-outline-success btn-social-icon-text"><i class="fas fa-pencil-alt btn-icon-append"></i></button></a>
                       <a data-toggle="modal" data-target="#deletProv"   onclick="eliminar('. $id->idprovedor . ')" >
                        <button type="button" class="btn btn-outline-success ">
                          <i class="fas fa-trash text-danger"></i>                          
                        </button>
</a>';
                })->filterColumn('fullname', function($query, $keyword) {
                    $sql = "CONCAT(nombre,' ',Apellido_paterno,' ',Apellido_Materno)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })->make(true);

        }


        return view('provedor.provedor');
    }

    public  function crearprove(Request $request){


        $regla=
            [
                'nombre'=>'required | max:50',
                'Apellido_paterno'=>'required |unique:users',
                'Apellido_Materno'=>'required |unique:users',
                'direccion'  =>'required | max:50',
                'dni'=>'required | max:50',
                'telefono'=>'required | max:50',
                'sexo'=>'required | max:50',
                'correo'=>'required | max:50',
                'Fecha_ingreso'=>'required | max:50',
                'Fecha_cumple'=>'required | max:50',


            ];
        $validate=Validator::make(Input::all(),$regla);

        if($validate->fails()){
            return Redirect('regis/provedor')->withErrors($validate);
        } else{
            DB::beginTransaction();

            $tiper= new TipoPer();
            $tiper->nombre=$request->get('nombre');
            $tiper->Apellido_paterno=$request->get('Apellido_paterno');
            $tiper->Apellido_Materno=$request->get('Apellido_Materno');
            $tiper->Direccion=$request->get('direccion');
            $tiper->dni=$request->get('dni');
            $tiper->telefono=$request->get('telefono');
            $tiper->sexo=$request->get('sexo');
            $tiper->gmail=$request->get('correo');
            $tiper->Fecha_Ingreso=$request->get('Fecha_ingreso');
            $tiper->Fecha_nacimiento=$request->get('Fecha_cumple');
            $tiper->save();

            $prove=new Provedor();
            $prove->tipoPersona_idtipoPersona = $tiper->idtipoPersona;
            $prove->estado=$request->get('estado');
            $prove->save();
            DB::commit();
        }
        return Redirect('Provedor');


    }
    public function registrar(Request $request){

        $tiper= new TipoPer();
        $tiper->nombre=$request->get('nombre');
        $tiper->Apellido_paterno=$request->get('Apellido_paterno');
        $tiper->Apellido_Materno=$request->get('Apellido_Materno');
        $tiper->Direccion=$request->get('Direccion');
        $tiper->dni=$request->get('dni');
        $tiper->telefono=$request->get('telefono');
        $tiper->sexo=$request->get('sexo');
        $tiper->gmail=$request->get('gmail');
        $tiper->Fecha_Ingreso=$request->get('Fecha_Ingreso');
        $tiper->Fecha_nacimiento=$request->get('Fecha_cumple');
        $tiper->save();

        $prove=new Provedor();
        $prove->tipoPersona_idtipoPersona = $tiper->idtipoPersona;
        $prove->estado=$request->get('estado');
        $prove->save();
        DB::commit();

        return Redirect('Provedor');

    }

    public function editPro(Request $request,$id){

        $prove=DB::table('provedor')
            ->join('tipopersona', 'provedor.tipoPersona_idtipoPersona', '=', 'tipopersona.idtipoPersona')
            ->select([

               'nombre', 'Apellido_paterno', 'Apellido_Materno' ,'Direccion', 'dni',
                'telefono', 'sexo', 'gmail', 'Fecha_Ingreso','Fecha_nacimiento', 'idprovedor', 'estado'
            ])
        ->where('idprovedor','=',$id)
        ->first();
        echo json_encode($prove);
    }

    public function editarprovedor(Request $request,$id){

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

        $validate=Validator::make(Input::all(),$regla);


        if($validate->fails()){

            return response()->json(array('errors' => $validate->getMessageBag()->toArray()));

        }

        else{

            $provdor=TipoPer::find($id);

            $provdor->nombre=$request->get('nombress');
            $provdor->Apellido_paterno=$request->get('Apellido_paterno');
            $provdor->Apellido_Materno=$request->get('Apellido_Materno');
            $provdor->Direccion=$request->get('Direccion');
            $provdor->dni=$request->get('dni');
            $provdor->telefono=$request->get('telefono');
            $provdor->sexo=$request->get('sexo');
            $provdor->gmail=$request->get('gmail');
            $provdor->Fecha_Ingreso=$request->get('Fecha_Ingreso');
            $provdor->Fecha_nacimiento=$request->get('Fecha_cumple');
            $provdor->save();

            $prove=new Provedor();
            $prove->tipoPersona_idtipoPersona = $provdor->idprovedor;
            $prove->estado=$request->get('estado');
            $prove->save();
            DB::commit();
        }







    }
    public function eliminarProve($id){
        $prove=Provedor::find($id);
   $data=   $prove->delete();
      echo  json_encode($data);


    }


}
