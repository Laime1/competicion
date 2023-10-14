<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function mostrarDatos()
    {
        $datos = Usuario::all();
        return view('listaUsuarios', compact('datos'));
    }

    public function editarUsuario($ci)
    {
        $usuario = Usuario::firstOrCreate(['CI' => $ci]);
        return view('editarUsuarios', compact('usuario'));
    }
}
