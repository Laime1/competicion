<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{

    protected $messages = [
        'nombre.required' => 'Este campo es obligatorio',
        'nombre.regex' => 'Solo se admiten letras',
        'nombre.max' => 'Maximo 50 caracteres',
    
        'apellidos.required' => 'Este campo es obligatorio',
        'apellidos.regex' => 'Solo se admiten letras',
        'apellidos.max' => 'Maximo 50 caracteres',
    
        'ci.required' => 'Este campo es obligatorio',
        'ci.unique' => 'Este CI ya existe',
        'ci.regex' => 'Obligatorio 6 números seguidos, opcional 2 alfanuméricos',
        'ci.max' => 'Maximo 9 digitos',
    
        'telefono.required' => 'Este campo es obligatorio',
        'telefono.regex' => 'Solo se admiten números',
        'telefono.min' => 'Minimo 8 digitos',
    
        'email.required' => 'Este campo es obligatorio',
        'email.unique' => 'Este correo ya existe',
        'email.email' => 'Correo electrónico inválido',
        'email.regex' => 'Solo se admite @, letras, números, puntos',
    
        'contrasenia.required' => 'Este campo es obligatorio',
        'contrasenia.max' => 'Maximo 20 caracteres',
    ];

    public function index()
    {
        $datos = Usuario::orderBy('nombre', 'asc')->get();
        return view('Usuarios.listaUsuarios', compact('datos'));

    }
    public function create()
    {
        return view('Usuarios.formularioUsuarios'); // Retorna la vista de registro de usuarios
    }
   
    public function store(Request $request)
     {
    // Valida los datos ingresados por el usuario
    $validatedData = [

        'nombre' => 'required|regex:/^[A-Za-z\s]+$/|max:50',
        'apellidos' => 'required|regex:/^[A-Za-z\s]+$/|max:50',
        'ci' => 'required|unique:usuarios|regex:/^[0-9]{6,9}(?:[A-Za-z0-9]{2})?$/|max:9',
        'telefono' => 'required|regex:/^[0-9]+$/|min:8',
        'email' => 'required|unique:usuarios|email|regex:/^[A-Za-z0-9.@]+$/',
        'contrasenia' => 'required|max:20',
        'rol'=>'required',
       //reglas de validación según las necesidades
    ];

    // Validar los datos
    $validator = Validator::make($request->all(), $validatedData, $this->messages);

    // Comprobar si la validación ha fallado
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Crea un nuevo usuario en la base de datos
    $use = new Usuario();
    $use->nombre=$request->input('nombre');
    $use->apellidos=$request->input('apellidos');
    $use->ci=$request->input('ci');
    $use->email=$request->input('email');
    $use->telefono=$request->input('telefono');
    $use->contrasenia=$request->input('contrasenia');
    $use->rol=$request->input('rol');
    $use->save();

    $usuario=Usuario::find($request->input('ci'));
    // Redirige a una página de confirmación o a la lista de eventos
    if($usuario){
         return redirect('/users/lits')->with('success', 'Usuario registrado con éxito');
    }else{
        return redirect('/users/register')->with('success', 'Usuario no registrado ');   
    }
    //return view('create')->with('message', 'Evento creado con éxito');
  }
public function edit($ci)
{
    $usuario = Usuario::firstOrCreate(['CI' => $ci]);
    return view('Usuarios.editarUsuarios', compact('usuario'));
}

public function update(Request $request,$ci)
{
    //validando datos
    $validatedData = $request->validate([
        'nombre' => 'required|max:50',
        'apellidos' => 'required|max:50',
        'ci' => 'required|max:10',
        'email' => 'required',
        'telefono' => 'required|max:8'
    ]);

    
    $usuario=Usuario::find($ci);
    $usuario->nombre=$request->input('nombre');
    $usuario->apellidos=$request->input('apellidos');
    $usuario->ci=$request->input('ci');
    $usuario->email=$request->input('email');
    $usuario->telefono=$request->input('telefono');

    $usuario->save();

    if($usuario){
    return redirect('/users/list')->with('success', 'Usuario actualizado con éxito');
    }else{
        return redirect('/users/list')->with('success', 'Edicion cancelada');
    }
}
public function destroy($id)
{
    //$usuario =Usuario::find($id);
    $deleted=DB::delete('DELETE FROM usuarios WHERE CI = ?', [$id]);
    if ($deleted) {
        //$usuario->delete();
        return redirect()->route('listaDeUsuarios')->with('success', "Usuario , eliminado correctamente.");
    } else {
        return redirect()->route('listaDeUsuarios')->with('error', 'No se pudo encontrar el usuario.');
    }
}
}
