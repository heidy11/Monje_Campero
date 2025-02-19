<?php

// app/Http/Controllers/FuncionController.php

namespace App\Http\Controllers;

use App\Models\Funcion;
use Illuminate\Http\Request;

class FuncionController extends Controller
{
    public function index()
    {
        $funciones = Funcion::all();
        return response()->json($funciones);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelicula' => 'required|exists:pelicula,id_pelicula',
            'id_sala' => 'required|exists:sala,id_sala',
            'fecha_hora' => 'required|date',
            'id_promocion' => 'nullable|exists:promocion,id_promocion'
        ]);

        $funcion = Funcion::create($request->all());
        return response()->json($funcion, 201);
    }

    public function show($id)
    {
        $funcion = Funcion::findOrFail($id);
        return response()->json($funcion);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelicula' => 'required|exists:pelicula,id_pelicula',
            'id_sala' => 'required|exists:sala,id_sala',
            'fecha_hora' => 'required|date',
            'id_promocion' => 'nullable|exists:promocion,id_promocion'
        ]);

        $funcion = Funcion::findOrFail($id);
        $funcion->update($request->all());
        return response()->json($funcion);
    }

    public function destroy($id)
    {
        $funcion = Funcion::findOrFail($id);
        $funcion->delete();
        return response()->json(null, 204);
    }
}
