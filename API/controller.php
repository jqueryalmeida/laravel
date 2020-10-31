<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
      $Tarefas = DB::table('tarefas')->simplePaginate('15');      
      return view('/tarefas', ['tarefas' => $Tarefas]);
    }
}

//Chamar com
//http://localhost:8000/api/clientes
