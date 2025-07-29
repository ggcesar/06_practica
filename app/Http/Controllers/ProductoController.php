<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProductoRequest;
use Barryvdh\DomPDF\Facade\Pdf;


class ProductoController extends Controller
{
    public function generarPDF()
    {
        try {
            $productos = Producto::all();
            $pdf = PDF::loadView('productos.pdf', compact('productos'));
            return $pdf->download('reporte_inventario.pdf');
        } catch (\Exception $ex) {
            Log::error("Error al generar PDF del producto: ");
            Log::error($ex);
            return redirect()->back()->with('error', 'Hubo un error al generar el PDF. Inténtalo de nuevo.');
        }
    }
    
    public function index(Request $request)
    {
        try {
            $categorias = Categoria::get();
            $productos = Producto::busqueda($request->buscar)->PorCategoria($request->categoria)->paginate(5);
            return view('productos.index', compact('productos', 'categorias'));
        } catch (\Exception $ex) {
            Log::error('Error al mostrar productos');
            Log::error($ex);
            return redirect()->back()->with('error', 'Hubo un error al cargar los productos.');
        }
    }

    public function create()
    {
        try {
            $categorias = Categoria::get();
            return view('productos.create', compact('categorias'));
        } catch (\Exception $ex) {
            Log::error('Error al mostrar formulario de creación');
            Log::error($ex);
            return redirect()->back()->with('error', 'Hubo un error al cargar el formulario.');
        }
    }

    public function store(ProductoRequest $request)
    {
        try {
            DB::beginTransaction();

            $datos = $request->validated();

            if ($request->hasFile('imagen')) {
                $datos['imagen'] = $request->file('imagen')->store('uploads', 'public');
            }

            Producto::create($datos);

            DB::commit();

            return redirect('productos')->with('success', 'Producto agregado con exito');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear Producto');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', 'Hubo un error al agregar el producto. Intentalo de nuevo');
        }
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        try {
            $productos = Producto::findOrFail($id);
            $categorias = Categoria::get();

            return view('productos.edit', compact('productos', 'categorias'));
        } catch (\Exception $ex) {
            Log::error('Error al mostrar formulario de edición');
            Log::error($ex);
            return redirect()->back()->with('error', 'Hubo un error al cargar el formulario de edición.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $campos = [
                'marca' => 'required|string|max:100',
                'modelo' => 'required|string|max:100',
                'descripcion' => 'required|string|max:255',
                'cantidad' => 'required|integer|min:1',
                'precio' => 'required|numeric|min:0',
                'categoria_id' => 'required|exists:categorias,id',
                'imagen' => 'nullable|image|max:2048',
            ];
            $Mensaje = [
                'required' => 'El campo :attribute es requerido',
            ];
            $this->validate($request, $campos, $Mensaje);

            $productos = Producto::findOrFail($id);
            $datos = request()->all();

            if ($request->hasFile('imagen')) {
                Storage::delete('public/'.$productos->imagen);
                $datos['imagen'] = $request->file('imagen')->store('uploads', 'public');
            }
            $productos->update($datos);

            return redirect('productos')->with('mensaje', 'Producto editado con exito');
        } catch (\Exception $ex) {
            Log::error('Error al actualizar Producto');
            Log::error($ex);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al editar el producto.');
        }
    }

    public function destroy($id)
    {
        try {
            $productos = Producto::findOrFail($id);
            Storage::delete('public/'.$productos->imagen);
            $productos->delete();

            return redirect('productos')->with('mensaje', 'producto eliminado con exito');
        } catch (\Exception $ex) {
            Log::error('Error al eliminar producto');
            Log::error($ex);
            return redirect()->back()->with('error', 'Hubo un error al eliminar el producto.');
        }
    }
}
