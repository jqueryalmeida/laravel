<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 2;
        if (!empty($keyword)) {
            $clientes = Cliente::where('nome', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $clientes = Cliente::latest()->paginate($perPage);
        }
        return view('clientes.index', ["clientes" => $clientes]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Cliente::create($requestData);

        return redirect('clientes')->with('flash_message', 'Cliente added!');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $cliente = Cliente::findOrFail($id);
        $cliente->update($requestData);

        return redirect('clientes')->with('flash_message', 'Cliente updated!');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);

        return redirect('clientes')->with('flash_message', 'Cliente deleted!');
    }
}
