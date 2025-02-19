<?php

// app/Http/Controllers/AsientoController.php

namespace App\Http\Controllers;

use App\Models\Asiento;
use Illuminate\Http\Request;

class AsientoController extends Controller
{
    public function index()
    {
        $asientos = Asiento::all();
        return response()->json($asientos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_funcion' => 'required|exists:funcion,id_funcion',
            'ubicacion' => 'required|string|max:10',
            'lado' => 'required|in:izquierda,derecha',
            'estado' => 'required|in:disponible,reservado,ocupado'
        ]);

        $asiento = Asiento::create($request->all());
        return response()->json($asiento, 201);
    }

    public function show($id)
    {
        $asiento = Asiento::findOrFail($id);
        return response()->json($asiento);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_funcion' => 'required|exists:funcion,id_funcion',
            'ubicacion' => 'required|string|max:10',
            'lado' => 'required|in:izquierda,derecha',
            'estado' => 'required|in:disponible,reservado,ocupado'
        ]);

        $asiento = Asiento::findOrFail($id);
        $asiento->update($request->all());
        return response()->json($asiento);
    }

    public function destroy($id)
    {
        $asiento = Asiento::findOrFail($id);
        $asiento->delete();
        return response()->json(null, 204);
    }
}

