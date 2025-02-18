<?php

// app/Models/Pelicula.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'pelicula';
    protected $primaryKey = 'id_pelicula';
    public $timestamps = true;

    protected $fillable = [
        'titulo',
        'imagen_url',
        'sinopsis',
        'genero',
        'duracion',
        'clasificacion',
        'fecha_estreno'
    ];

   
}
