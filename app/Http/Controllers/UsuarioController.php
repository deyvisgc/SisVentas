<?php

namespace SisVentas\Http\Controllers;
use Illuminate\Notifications\Channels\MailChannel;
use SisVentas\Rol;
use SisVentas\User;
use SisVentas\Persona;
use Validator;
use DB;
use Mockery\Exception;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class UsuarioController extends Controller
{

    public function redirec(){
        $rol=Rol::all();

        return view('Usuario.usuario',['rol'=>$rol]);
    }

    public function index(Request $request){
        $rol=Rol::all();
        if($request ){
            $query=trim($request->get('buscar'));
            $users=DB::table('users as us')
                ->join('persona as p','us.Persona_idPersona','=' ,'p.idpersona')
                ->join('roles as r','p.rol_idrol','=','r.idroles')
                ->select(['us.id','us.email','us.username','us.imagen','p.nombre','p.Apellido_Pater','p.Apellido_Mater','p.dni','p.Fecha_nacimiento',
                    'p.Direccion','p.telefono','p.idPersona','r.idroles','r.nombre_rol'])
                ->where('nombre','like','%'.$query.'%')
                ->orwhere('us.email','like','%'.$query.'%')
                ->orwhere('p.Apellido_Pater','like','%'.$query.'%')
                ->orwhere('p.dni','LIKE','%'.$query.'%')
                ->orderBy('p.nombre','desc')
                ->paginate(7);

        }
        return view('Usuario.index',['user'=>$users,'buscar'=>$query,'rol'=>$rol]);


    }
    public function creauser(Request $request){
        $regla=
            [ 'imagen'=>'mimes:jpeg,bmp,PNG ',
                'nombre'=>'required | max:50',
                'email'=>'required |unique:users',
                'username'=>'required |unique:users',
                'password'  =>'required | max:50',
                'apellido_pa'=>'required | max:50',
                'apellido_ma'=>'required | max:50',
                'dni'=>'required | max:50',
                'direccion'=>'required | max:50',
                'telefono'=>'required | max:50',
                'Fecha_cumple'=>'required | max:50',
                'rol'=>'required | max:50',

            ];

        $validate=Validator::make(Input::all(),$regla);

        if($validate->fails()){
            return Redirect('Usuario')->withErrors($validate);
        } else {
            DB::beginTransaction();
            $per = new Persona();
            $per->Apellido_Pater = $request->get('apellido_pa');
            $per->Apellido_Mater = $request->get('apellido_ma');
            $per->dni = $request->get('dni');
            $per->Fecha_nacimiento = $request->get('Fecha_cumple');
            $per->direccion = $request->get('direccion');
            $per->telefono = $request->get('telefono');
            $per->rol_idrol = $request->get('rol');
            $per->nombre = $request->get('nombre');
            $per->save();
            /**
             * hasfile: es una clase que tiene Imput para captural la imagen qu mandamos d nustro formulario
             * el Imput: nos sirve para subir esa imagen
             * getClientOriginalName=nos mustra el nombre de la imagen que subimos por ejemplo dyvis.jpg;
             *
             *
             */

            $user = new User();
            $user->persona_idpersona = $per->idpersona;
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->username = $request->get('username');
            $user->idRol = $request->get('rol');
            if ($user->imagen == null) {
                if (Input::hasFile('imagen')) {
                    $file = Input::file('imagen');
                    $file->move(public_path() . '/Imagenes/Usuario/', $file->getClientOriginalName());
                    $user->imagen = $file->getClientOriginalName();


                } else{
                    $user->imagen='default-avatar.png';
                }
                $user->save();
                DB::commit();
            }
            return Redirect('Usuario');
        }

    }

    /**
    public function get(){
    return view('Usuario.lisUser');

    }

    public function listar(Request $request){


    $query=DB::table('users as us')
    ->join('persona as p','us.Persona_idPersona','=' ,'p.idpersona')
    ->join('roles as r','p.roles_idroles','=','r.idroles')
    ->select(['us.id','us.email','us.username','us.imagen','p.nombre','p.Apellido_Pater','p.Apellido_Mater','p.dni','p.Fecha_nacimiento',
    'p.Direccion','p.telefono','p.edad','p.idPersona','r.idroles','r.nombre_rol']);
    return Datatables::of($query)->make(true);



    }
     */


public function destroy($id){
    $user=User::find($id);
        $user->delete();

    return Redirect('Usuario');

}


    }



