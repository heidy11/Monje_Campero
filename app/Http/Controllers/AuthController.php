<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view ("modules/auth/login");
    }

    public function registro()
    {
        return view ("modules/auth/registro");
    }
    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'celular' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255',
            'contrasena' => 'required|string|min:6',
        ]);

        $item = new Usuario();
        $item->nombre = $request->nombre;
        $item->apellido = $request->apellido;
        $item->edad = $request->edad;
        $item->celular = $request->celular;
        $item->correo_electronico = $request->correo_electronico;
        $item->contrasena = bcrypt($request->contrasena);
        $item->id_rol = 1;
        $item->save();
        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }
}
