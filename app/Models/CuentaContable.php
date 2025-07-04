<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CuentaContable extends Model
{
    protected $fillable = [
        'empresa_id', 'codigo', 'nombre', 'tipo', 'nivel', 'activo'
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function metodosPago(): HasMany
    {
        return $this->hasMany(MetodoPago::class);
    }
}



