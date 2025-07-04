<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleMovimientoInventario extends Model
{
    protected $fillable = [
        'movimiento_inventario_id', 'producto_id', 'cantidad', 'costo_unitario'
    ];

    public function movimiento()
    {
        return $this->belongsTo(MovimientoInventario::class, 'movimiento_inventario_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}


