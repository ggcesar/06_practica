<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'marca',
        'modelo',
        'descripcion',
        'cantidad',
        'precio',
        'categoria_id',
        'imagen',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
    public function scopeBusqueda(Builder $consulta, ?string $busqueda): void
    {
        if ($busqueda) {
            $consulta->where('marca', 'like', "%{$busqueda}%")
                      ->orWhere('modelo', 'like', "%{$busqueda}%")
                      ->orWhere('descripcion', 'like', "%{$busqueda}%");
        }
    }
    public function scopePorCategoria(Builder $consulta, ?int $busqueda): void
    {
        if ($busqueda !== null) {
            $consulta->where('categoria_id', $busqueda);
        }
    }
}
