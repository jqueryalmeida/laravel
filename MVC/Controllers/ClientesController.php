<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use Illuminate\Http\Request;
use Session;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 2;

        if (!empty($keyword)) {
            $clientes = Cliente::where('nome', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $clientes = Cliente::paginate($perPage);
        }

        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        
        $requestData = $request->all();        
        Cliente::create($requestData);
        Session::flash('flash_message', 'Cliente added!');
        return redirect('admin/clientes');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('admin.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $cliente = Cliente::findOrFail($id);
        $cliente->update($requestData);

        Session::flash('flash_message', 'Cliente updated!');

        return redirect('admin/clientes');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);

        Session::flash('flash_message', 'Cliente deleted!');

        return redirect('admin/clientes');
    }
}
