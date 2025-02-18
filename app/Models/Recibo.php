<?php

// app/Models/Recibo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $table = 'recibo';
    protected $primaryKey = 'id_recibo';
    public $timestamps = true;

    protected $fillable = [
        
        'fecha_recibo',
        'descripcion',
        'link_descarga'
    ];

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }
}
