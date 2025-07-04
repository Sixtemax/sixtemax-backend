<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoInventario extends Model
{
    protected $fillable = [
        'empresa_id', 'almacen_origen_id', 'almacen_destino_id',
        'tipo', 'observaciones', 'fecha'
    ];

    public function almacenOrigen()
    {
        return $this->belongsTo(Almacen::class, 'almacen_origen_id');
    }

    public function almacenDestino()
    {
        return $this->belongsTo(Almacen::class, 'almacen_destino_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleMovimientoInventario::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}


