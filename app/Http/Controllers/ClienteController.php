<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Cliente::busqueda($request->buscar)->paginate(5);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClienteRequest $request)
    {
        try {
            DB::beginTransaction();

            $datos = $request->validated();

            Cliente::create($datos);

            DB::commit();

            return redirect('clientes')->with('mensaje', 'Cliente agregada con éxito');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear cliente');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', 'Hubo un error al agregar el recurso. Intentalo de nuevo');
        }
    }

    public function show(Cliente $cliente)
    {

    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $datos = $request->validated();

        $cliente->update($datos);
        return redirect('clientes')->with('mensaje', 'Cliente editado con éxito');
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect('clientes')->with('mensaje', 'Clientes eliminada con éxito');
    }
}
