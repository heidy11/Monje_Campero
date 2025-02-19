<?php

// app/Http/Controllers/PeliculaController.php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        return response()->json($peliculas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'nullable|string',
            'duracion' => 'required|integer',
            'clasificacion' => 'nullable|string',
            'fecha_estreno' => 'required|date'
        ]);

        $pelicula = Pelicula::create($request->all());
        return response()->json($pelicula, 201);
    }

    public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        return response()->json($pelicula);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'nullable|string',
            'duracion' => 'required|integer',
            'clasificacion' => 'nullable|string',
            'fecha_estreno' => 'required|date'
        ]);

        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->all());
        return response()->json($pelicula);
    }

    public function destroy($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();
        return response()->json(null, 204);
    }
}
