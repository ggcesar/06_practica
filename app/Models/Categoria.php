<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
    public function scopeBusqueda(Builder $consulta, ?string $busqueda): void
    {
        if ($busqueda) {
            $consulta->where('nombre', 'LIKE', "%$busqueda%")
                     ->orWhere('descripcion', 'LIKE', "%$busqueda%");
        }
    }
}
