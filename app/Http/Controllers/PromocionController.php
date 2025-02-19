<?php

// app/Http/Controllers/PromocionController.php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index()
    {
        $promociones = Promocion::all();
        return response()->json($promociones);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:2x1,descuento',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'
        ]);

        $promocion = Promocion::create($request->all());
        return response()->json($promocion, 201);
    }

    public function show($id)
    {
        $promocion = Promocion::findOrFail($id);
        return response()->json($promocion);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:2x1,descuento',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'
        ]);

        $promocion = Promocion::findOrFail($id);
        $promocion->update($request->all());
        return response()->json($promocion);
    }

    public function destroy($id)
    {
        $promocion = Promocion::findOrFail($id);
        $promocion->delete();
        return response()->json(null, 204);
    }
}

