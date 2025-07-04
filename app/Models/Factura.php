<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = [
        'venta_id',
        'numero_factura',
        'fecha',
        'estado',
        'respuesta_dian',
        'origen' // directa, venta, permitido
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function metodosPago()
    {
        return $this->hasMany(FacturaMetodoPago::class);
    }
}

