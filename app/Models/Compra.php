<?php

// app/Models/Compra.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compra';
    protected $primaryKey = 'id_compra';
    public $timestamps = true;

    protected $fillable = [
        
       
        'monto_original',
        'monto_total',
        'estado_pago',
       
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function funcion()
    {
        return $this->belongsTo(Funcion::class, 'id_funcion');
    }

    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'id_promocion');
    }

   
}
