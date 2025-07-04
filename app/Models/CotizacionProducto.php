<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionProducto extends Model
{
    protected $fillable = ['cotizacion_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal'];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}


