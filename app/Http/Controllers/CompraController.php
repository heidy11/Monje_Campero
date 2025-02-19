<?php

// app/Http/Controllers/CompraController.php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return response()->json($compras);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuario,id_usuario',
            'id_funcion' => 'required|exists:funcion,id_funcion',
            'monto_original' => 'required|numeric',
            'monto_total' => 'required|numeric',
            'estado_pago' => 'required|in:pendiente,pagado,cancelado',
            'id_promocion' => 'nullable|exists:promocion,id_promocion'
        ]);

        $compra = Compra::create($request->all());
        return response()->json($compra, 201);
    }

    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        return response()->json($compra);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuario,id_usuario',
            'id_funcion' => 'required|exists:funcion,id_funcion',
            'monto_original' => 'required|numeric',
            'monto_total' => 'required|numeric',
            'estado_pago' => 'required|in:pendiente,pagado,cancelado',
            'id_promocion' => 'nullable|exists:promocion,id_promocion'
        ]);

        $compra = Compra::findOrFail($id);
        $compra->update($request->all());
        return response()->json($compra);
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        return response()->json(null, 204);
    }
}
