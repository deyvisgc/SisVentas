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
                DB::raw("CONCAT(nombre,' ',Apellido_pat,' ',Apellido_Materno) as fullname"),'Direccion', 'dni',
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

    public function registro(Request $request)
    {
        $regla=[
            'nombress'=>'required ',
            'Apellido_pat'=>'required ',
            'Apellido_Mat'=>'required ',
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
        } else {
            DB::beginTransaction();
            $prove=new TipoPer();
            $prove->nombre=$request->get('nombress');
            $prove->Apellido_pat=$request->get('Apellido_pat');
            $prove->Apellido_Materno=$request->get('Apellido_Mat');
            $prove->Direccion=$request->get('Direccion');
            $prove->dni=$request->get('dni');
            $prove->telefono=$request->get('telefono');
            $prove->sexo=$request->get('sexo');
            $prove->gmail=$request->get('gmail');
            $prove->Fecha_Ingreso=$request->get('Fecha_Ingreso');
            $prove->Fecha_nacimiento=$request->get('Fecha_cumple');
            $prove->save();

            $provedor=new Provedor();
            $provedor->tipoPersona_idtipoPersona=$prove->idtipoPersona;
            $provedor->estado=$request->get('estado');
            $provedor->save();
            DB::commit();
        }
        return Redirect::to('Provedor');

    }
    public function editPro(Request $request,$id){
        $prove=DB::table('provedor')
            ->join('tipopersona', 'provedor.tipoPersona_idtipoPersona', '=', 'tipopersona.idtipoPersona')
            ->select([
             'tipoPersona_idtipoPersona', 'idtipoPersona' , 'nombre', 'Apellido_pat', 'Apellido_Materno' ,'Direccion', 'dni',
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
            DB::beginTransaction();

            $prov=Provedor::find($id);
            $prove=TipoPer::find(Input::get('idprove'));
            $prove->nombre=$request->get('nombress');
            $prove->Apellido_pat=$request->get('Apellido_paterno');
            $prove->Apellido_Materno=$request->get('Apellido_Materno');
            $prove->Direccion=$request->get('Direccion');
            $prove->dni=$request->get('dni');
            $prove->telefono=$request->get('telefono');
            $prove->sexo=$request->get('sexo');
            $prove->gmail=$request->get('gmail');
            $prove->Fecha_Ingreso=$request->get('Fecha_Ingreso');
            $prove->Fecha_nacimiento=$request->get('Fecha_cumple');
            $prove->update();

            $prov->tipoPersona_idtipoPersona = $prove->idtipoPersona;
            $prov->estado=$request->get('estado');
            $prov->update();
            DB::commit();
        }
        return json_encode($prov);
    }
    public function eliminarProve($id){
        $prove=Provedor::find($id);
        $data=   $prove->delete();
        echo  json_encode($data);
    }
}