<?php

namespace vehicleTracking\Http\Controllers;

use Illuminate\Http\Request;
use vehicleTracking\Http\Requests;

//Añadir Espacio de nombres
use vehicleTracking\User; //Añadir el modelo (Providers)
use Illuminate\Support\Facades\Redirect; //Para hacer redirecciones
use vehicleTracking\Http\Requests\UsuarioFormRequest; //Trabajar con el archivo de reglas "UsuarioFormRequest"
use DB; // Para la Base de Datos

class UsuarioController extends Controller
{
    //Este contructor sirve para prohibir el acceso a usuarios no logeados. 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) //Muestra el Inicio de la app y se encarga de la busqueda de los Usuarios.
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')//buscar por nombre
            ->orderBy('id','desc')
            ->paginate(7);
            return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

     public function create() //Crea una nueva vista(Nuevo Usuario)
    {
        return view("seguridad.usuario.create");
    }

     public function store (UsuarioFormRequest $request) //Almacena valores en la tabla Users de la BD
    {
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        return Redirect::to('seguridad/usuario');
    }

    public function edit($id) //Para editar la Categoria del id especifico 
    {
        return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(UsuarioFormRequest $request,$id) //Modifica tabla Users con el id que recibe del FormRequest
    {
        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('seguridad/usuario');
    }

    public function destroy($id)//Elimina el usuario con el ID especificado
    {
       $usuario=DB::table('users')->where('id','=',$id)->delete();
        return Redirect::to('seguridad/usuario');
    }
}
