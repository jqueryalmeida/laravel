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

}
