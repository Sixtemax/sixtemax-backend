<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermitidoProducto extends Model
{
    protected $fillable = ['permitido_id', 'producto_id', 'cantidad', 'devueltos'];

    public function permitido()
    {
        return $this->belongsTo(Permitido::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}


