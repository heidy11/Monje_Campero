<?php

// app/Http/Controllers/ReciboController.php

namespace App\Http\Controllers;

use App\Models\Recibo;
use Illuminate\Http\Request;

class ReciboController extends Controller
{
    public function index()
    {
        $recibos = Recibo::all();
        return response()->json($recibos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pago' => 'required|exists:pago,id_pago',
            'descripcion' => 'nullable|string',
            'link_descarga' => 'nullable|string'
        ]);

        $recibo = Recibo::create($request->all());
        return response()->json($recibo, 201);
    }

    public function show($id)
    {
        $recibo = Recibo::findOrFail($id);
        return response()->json($recibo);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pago' => 'required|exists:pago,id_pago',
            'descripcion' => 'nullable|string',
            'link_descarga' => 'nullable|string'
        ]);

        $recibo = Recibo::findOrFail($id);
        $recibo->update($request->all());
        return response()->json($recibo);
    }

    public function destroy($id)
    {
        $recibo = Recibo::findOrFail($id);
        $recibo->delete();
        return response()->json(null, 204);
    }
}

