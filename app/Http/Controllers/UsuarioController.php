<?php

// app/Http/Controllers/UsuarioController.php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:usuario',
            'contrasena' => 'required|string|min:8',
            'id_rol' => 'required|exists:rol,id_rol'
        ]);

        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:usuario,correo_electronico,' . $id,
            'id_rol' => 'required|exists:rol,id_rol'
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}

