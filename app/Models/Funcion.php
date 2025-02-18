<?php

// app/Models/Funcion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    use HasFactory;

    protected $table = 'funcion';
    protected $primaryKey = 'id_funcion';
    public $timestamps = true;

    protected $fillable = [
       
        'fecha_hora',
       
    ];

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'id_sala');
    }

    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'id_promocion');
    }

    
}

