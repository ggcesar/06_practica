<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;


class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',  
    ];
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
    public function scopeBusqueda(Builder $consulta, ?string $busqueda): void
    {
        if ($busqueda) {
            $consulta->where('nombre', 'LIKE', "%$busqueda%")
                     ->orWhere('apellido', 'LIKE', "%$busqueda%")
                     ->orWhere('email', 'LIKE', "%$busqueda%");
        }
    }
}
