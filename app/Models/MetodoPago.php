<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MetodoPago extends Model
{
    protected $fillable = [
        'empresa_id', 'nombre', 'cuenta_contable_id', 'activo'
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cuentaContable(): BelongsTo
    {
        return $this->belongsTo(CuentaContable::class);
    }

    public function facturas(): HasMany
    {
        return $this->hasMany(FacturaMetodoPago::class);
    }
}

