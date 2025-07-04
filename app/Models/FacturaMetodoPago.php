<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturaMetodoPago extends Model
{
    protected $fillable = ['factura_id', 'metodo_pago_id', 'valor'];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class);
    }
}

