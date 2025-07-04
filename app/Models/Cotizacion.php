<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $fillable = ['empresa_id', 'tercero_id', 'fecha', 'estado', 'observaciones'];

    public function productos()
    {
        return $this->hasMany(CotizacionProducto::class);
    }

    public function tercero()
    {
        return $this->belongsTo(Tercero::class);
    }
}


