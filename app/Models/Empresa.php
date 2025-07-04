<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    protected $fillable = [
        'nombre', 'nit', 'direccion', 'telefono', 'email', 'activo'
    ];

    public function sucursales(): HasMany
    {
        return $this->hasMany(Sucursal::class);
    }

    public function terceros(): HasMany
    {
        return $this->hasMany(Tercero::class);
    }

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }

    public function categorias(): HasMany
    {
        return $this->hasMany(CategoriaProducto::class);
    }

    public function cuentasContables(): HasMany
    {
        return $this->hasMany(CuentaContable::class);
    }

    public function metodosPago(): HasMany
    {
        return $this->hasMany(MetodoPago::class);
    }
}


