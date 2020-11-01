# Paginação em duas etapas

## No index() do controller

public function index(Request $request)
    {
            $clientes = Cliente::latest()->paginate(2);
        return view('clientes.index', ["clientes" => $clientes]);
    }

## Na view index

Ao final
...
                            </table>
                            <div class="pagination-wrapper">{!! $clientes->appends(Request::all())->links() !!} </div>

Ou apenas
...
<div class="pagination-wrapper">{{ $clientes->links() }}</div>
...

## Com bootstrap

{{ $clientes->links('vendor.pagination.bootstrap-4') }}

## Com busca
        <div class="pagination-wrapper"> {!! $clientes->appends(['search' => Request::get('search')])->links('vendor.pagination.bootstrap-4')->render() !!} </div>
