<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::busqueda($request->buscar)->paginate(5);
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        try {
            DB::beginTransaction();

            $datos = $request->validated();

            Categoria::create($datos);

            DB::commit();

            return redirect('categorias')->with('mensaje', 'Categoría agregada con éxito');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear categoría');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', 'Hubo un error al agregar el recurso. Intentalo de nuevo');
        }
    }

    public function show(Categoria $categoria)
    {

    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $datos = $request->validated();

        $categoria->update($datos);
        return redirect('categorias')->with('mensaje', 'Categoría editada con éxito');
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect('categorias')->with('mensaje', 'Categoría eliminada con éxito');
    }
}
