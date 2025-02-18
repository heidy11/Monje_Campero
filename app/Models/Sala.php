<?php

// app/Models/Sala.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'sala';
    protected $primaryKey = 'id_sala';
    public $timestamps = true;

    protected $fillable = [
        'nombre_sala',
        'tipo_sala',
        'capacidad'
    ];

    
}

