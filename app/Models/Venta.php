<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['empresa_id', 'tercero_id', 'fecha', 'estado', 'total'];

    public function productos()
    {
        return $this->hasMany(VentaProducto::class);
    }

    public function tercero()
    {
        return $this->belongsTo(Tercero::class);
    }

    public function factura()
    {
        return $this->hasOne(Factura::class);
    }
}

