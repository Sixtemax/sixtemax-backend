<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sucursal extends Model
{
    protected $fillable = [
        'empresa_id', 'nombre', 'direccion', 'telefono', 'ciudad', 'activo'
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function almacenes(): HasMany
    {
        return $this->hasMany(Almacen::class);
    }
}
