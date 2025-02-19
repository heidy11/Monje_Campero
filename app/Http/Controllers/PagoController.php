<?php

// app/Http/Controllers/PagoController.php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return response()->json($pagos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_compra' => 'required|exists:compra,id_compra',
            'monto_pagado' => 'required|numeric',
            'qr_pago_url' => 'nullable|string',
            'metodo_pago' => 'nullable|string'
        ]);

        $pago = Pago::create($request->all());
        return response()->json($pago, 201);
    }

    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return response()->json($pago);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_compra' => 'required|exists:compra,id_compra',
            'monto_pagado' => 'required|numeric',
            'qr_pago_url' => 'nullable|string',
            'metodo_pago' => 'nullable|string'
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());
        return response()->json($pago);
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();
        return response()->json(null, 204);
    }
}

