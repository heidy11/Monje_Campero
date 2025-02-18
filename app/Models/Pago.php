<?php

// app/Models/Pago.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pago';
    protected $primaryKey = 'id_pago';
    public $timestamps = true;

    protected $fillable = [
       
        'monto_pagado',
        
        'qr_pago_url',
        'metodo_pago'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }

    
}

