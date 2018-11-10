<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;
use SisVentas\User;
use SisVentas\Rol;
use SisVentas\Persona;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Auth;

use DB;
use  Illuminate\Support\Facades\Input;

class PerfilController extends Controller
{public function index(Request $request)
    {
        $id_tra = Auth::user()->persona_idpersona;
        $rol = Rol::all();
        $use = DB::table('users as us')
                ->join('persona as p', 'us.persona_idpersona', '=', 'p.idpersona')
                ->join('roles as r', 'p.rol_idrol', '=', 'r.idroles')
                ->select(['us.id', 'us.email', 'us.username', 'us.imagen', 'p.nombre', 'p.Apellido_Pater', 'p.Apellido_Mater', 'p.dni', 'p.Fecha_nacimiento',
                    'p.Direccion', 'p.telefono',  'p.idpersona', 'r.idroles', 'r.nombre_rol'])
        ->where('p.idPersona', '=', $id_tra)
        ->first();

        return view('Perfil.perfil',['rol'=>$rol,'user'=>$use]);
    }

    public function updatePersona(Request $request, $id)
    {
        $valida=  [ 'imagen'=>'mimes:jpeg,bmp,PNG ',
            'nombre'=>'required | max:50',
            'apellido_pa'=>'required | max:50',
            'apellido_ma'=>'required | max:50',
            'dni'=>'required | max:50',
            'direccion'=>'required | max:50',
            'telefono'=>'required | max:50',
            'Fecha_cumple'=>'required | max:50',
            'rol'=>'required | max:50',

        ];
        $validator = Validator::make(Input::all(),$valida);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }else{
            $persona=Persona::findOrfail($id);
            $persona->nombre=$request->get('nombre');
            $persona->Apellido_Pater=$request->get('apellido_pa');
            $persona->Apellido_Mater=$request->get('apellido_ma');
            $persona->telefono=$request->get('telefono');
            $persona->dni=$request->get('dni');
            $persona->Direccion=$request->get('direccion');
            $persona->Fecha_nacimiento=$request->get('Fecha_cumple');
            $persona->rol_idrol=$request->get('rol');



            $persona->update();

        }
        return Redirect::to('Perfil');

    }
    public function updateUser(Request $request, $id)
    {

        $regla=[
            'username'=>'required |max:50'

        ];
        $validate=Validator::make(Input::all(),$regla);
        if($validate->fails()){
            return response()->json(array('errors' => $validate->getMessageBag()->toArray()));
        } else{
            $usuarios=User::findOrFail($id);
            $usuarios->email= $request->get('email');
            $usuarios->username=$request->get('username');
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/Imagenes/Usuario/', $file->getClientOriginalName());
                $usuarios->imagen = $file->getClientOriginalName();
            }
            $usuarios->update();
            return Redirect::to('Perfil');
        }

    }
    /**
     * valido si la contraseña es correcta y requerida mas el minimo y el maximo de caracteres
     *
     *
     */
    public function canbiarpass(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        /**
         * si existe algun error en la validacion retorno a la vista perfil con el error y
        valido si las contraseñas son iguales la actual mas la existente. luego creo un new objeto  y le digo que me agarre solo el usuario que esta autoentificado  luego hago el update del password finalmente mando un error de validacion al perfil si es error o exito.
         *
         *
         */
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('Perfil')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                    ->update(['password' => bcrypt($request->password)]);
                return redirect('Perfil')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('Perfil')->with('message', 'Credenciales incorrectas');
            }
        }

    }
}
