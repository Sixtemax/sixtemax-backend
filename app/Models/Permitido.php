<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permitido extends Model
{
    protected $fillable = ['empresa_id', 'tercero_id', 'fecha', 'estado'];

    public function productos()
    {
        return $this->hasMany(PermitidoProducto::class);
    }

    public function tercero()
    {
        return $this->belongsTo(Tercero::class);
    }
}


