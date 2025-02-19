<?php

// app/Http/Controllers/SalaController.php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return response()->json($salas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_sala' => 'required|string|max:255',
            'tipo_sala' => 'required|in:2D,3D',
            'capacidad' => 'required|integer'
        ]);

        $sala = Sala::create($request->all());
        return response()->json($sala, 201);
    }

    public function show($id)
    {
        $sala = Sala::findOrFail($id);
        return response()->json($sala);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_sala' => 'required|string|max:255',
            'tipo_sala' => 'required|in:2D,3D',
            'capacidad' => 'required|integer'
        ]);

        $sala = Sala::findOrFail($id);
        $sala->update($request->all());
        return response()->json($sala);
    }

    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $sala->delete();
        return response()->json(null, 204);
    }
}

