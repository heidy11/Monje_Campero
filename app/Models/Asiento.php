<?php

// app/Models/Asiento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    use HasFactory;

    protected $table = 'asiento';
    protected $primaryKey = 'id_asiento';
    public $timestamps = true;

    protected $fillable = [
        
        'ubicacion',
        'lado',
        'estado'
    ];

    public function funcion()
    {
        return $this->belongsTo(Funcion::class, 'id_funcion');
    }
}

