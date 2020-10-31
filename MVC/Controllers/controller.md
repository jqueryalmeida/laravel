# Controllers - é o C do MVC.

https://www.youtube.com/watch?v=fPs-PlQIWaw&index=6&list=PLVSNL1PHDWvR3PeLXz6nvBkDhv1IQk4wP

Têm a responsabilidade de controlar o fluxo das informações, entre as views e models.
O model manipula os dados, o controllers são mediadores entre model e view e as views mostram os resultados das requisições para o usuário.

## Métodos padrões de um controller, quando criado com a opção --resource

- index - lista todos os registros disponíveis
- create - chama a view create, que é um form (create.blade.php) para adicionar um registro
- store - armazena no banco o registro do form em create, antes validando seus campos
- show - mosra um único registro através da view show.blade.php
- edit - chama o form na view edit.blade.php para editar um registro
- update - Sua função é armazenar no banco o registro alterado na view acima
- destroy - permite excluir um registro

## Importância do uso do artisan
Importante criar usando o artisan, pois ele já cria com o namespace correto, o use e a definição da classe com o extends.

## Criar um controller numa pasta específica
php artisan make:controller Clientes/ClienteController

## Criar controller com esqueleto de métodos default
php artisan make:controller SiteController --resource

## Criar controller e também um método
php artisan make:controller PhotoController --resource --model=Photo

## Controller com Model
```php
<?php

namespace App\Http\Controllers;
use DB;
use App\Carro;

class ProdutosController extends Controller
{
	public function index()
	{
		// Retornar todos os registros da tabela carros
		$carros = Carro->get();	
		return view('index', ['carros' => $carros]);
	}

}

//Adicionando novo registro
public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|max:255',
    ]);

    // Create The Task...
}

public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|max:255',
    ]);

    $request->user()->tasks()->create([
        'name' => $request->name,
    ]);

    return redirect('/tasks');
}
```

## Criar formulário de cadastro

Criar nova rota (mudar para que esta seja a primeira rota)

Route::get('produtos/testes', 'Produtos\ProdutoController@testes');

Editar o controller e adicionar o método testes()

Adicionar use do Model no controller:

use App\Models\Produto;

Adicionar construtor
```php
private $produto;

public function __construct(Produto $produto)
{
	$this->produto = $produto;
}
```
O index muda para:
```php
public function index()
{
	$produtos = $this->produto->all();
	return view('produtos.index');
}
```
## Criar método teste
```php
public function testes()
{
	$prod = $this->produto;
	$prod->nome = 'Nome do produto';
	$prod->number = 123432;
	$prod->active = true;
	$prod->category = 'eletronicos';
	$prod->description = 'Descrição do produto';
	$insert = $prod->save();

	if ($insert)
		return 'Inserido com sucesso';
	else
		return 'Falha ao inserir';
}
```
Outra forma (interativa com os dados que vem do form):
```php
	$this->produto->insert([
		'nome' => $request->nome,
		'number' => $request->number,
		...
	])
```
O create é importante pois obriga a existência de uma relação de colunas a adicionar ao banco, chama o form para insert()

A relação de campos a serem preenchidos fica no model, assim:
```php
protected $fillable = [
	'nome', 'number', 'active', 'categoty', 'description'
];
```

## Update do registro 5
```php
	$prod = $this->produto->find(5);
	$prod->nome = 'Nome Update';
	$prod->number = 123432;
	$prod->active = true;
	$prod->category = 'eletronicos';
	$prod->description = 'Descrição do produto';
	$update = $prod->save();

	if ($update)
		return 'Atualizado com sucesso';
	else
		return 'Falha ao atualizar';
```
## Usamos o método save() também para atualizar

Outra forma é usando o método update() (requer lista de campos)
```php
	$prod = $this->produto->find(6);
	$prod->update([
		'nome' => $request->nome,
		'number' => $request->number,
		...
	]);
```
## Outro método útil para retornar por outro campo:
```php
	$prod = $this->produto
			->where('nome', 'João Brito')
			->orWhere('number', 123543);
```
## Delete
```php
	$prod = $this->produto->find(3)->delete();
ou
	$prod = $this->produto->find(6);
	$delete = $prod->delete();

ou

	$prod = $this->produto->find(6);
	$delete = $prod->destroy();

ou
	$prod = $this->produto->destroy(3);
ou
	$prod = $this->produto->destroy([3,5,8]);

ou
	$delete = $this->produto->where('number', 123654)->delete();

No método index do controller podemos adicionar um título para a página:
	$title = 'Listagem de produtos';
	return view('produtos.index', compact('produtos', 'title'));
```
## Vamos adicionar o bootstrap ao nosso template
```php
<table>
	<head>
		<title>{{$title or 'Curso de Laravel'}}</title>
		<link rel="stylesheet" href="{{ asset('css/app.css')}}">
	</head>
	<body>
		@yield('content')

	</body>
</html>
```
Apenas isso já altera algo no site: fontes, css, etc

## Podemos criar novas pastas em public para css, img e js.
Supondo que eu tenha criado as pastas:

public/assets/css

E dentro desta estilo.css

Para adicionar este arquivo em nosso template:
```php
		<title>{{$title or 'Curso de Laravel 5.3'}}</title>

		<link rel="stylesheet" href="{{url('assets/css/estilo.css')}}">
```
https://www.youtube.com/watch?v=6K3Mhup3xFA&list=PLVSNL1PHDWvR3PeLXz6nvBkDhv1IQk4wP&index=19

## Formulário

### Botão cadastrar

<a href="{{url('produtos/create')}}">Cadastrar</a>
ou

<a href="{{route('produtos.create')}}">Cadastrar</a>

## Criar outra view create

Vamos usar o template criado aqui

views/produtos/create.blade.php

## Adicionar
```php
@extends('produtos.templates.template')

@section('content')
	Aqui um formulário

@endsection
```
No controller, método create criar uma variável categoria, com um array com as categorias

## No método create criar também a variável $title
```php
<form class="form" mathod="post" action="{{route('produtos.store')}}">
	<input type="hidden" name="_token" value="{{csrf_token}}">	
	<input type="text" name="nome" placeholder="Nome:" class="form-control">
	<label>
		<input type="checkbox" name="active"><br>
		Ativo?
	</label>
	<input type="text" name="number" placeholder="Número:" class="form-control">
	<select name="categoria" class="form-control">
		<option value="">Escolha a categoria</option>
		@foreach($categorias as $categoria)
			<option>{{$categoria}}</opton>
		@endforeach
	</select>
	<textarea name="descricao" placeholder="Descricao" class="form-control"></textarea>
</form>
```
## Todo form precisa de um campo com o token
```php
ou substituir o campo por
{!! csrf_field() !!}

O método store

public function store(Request $request)
{
	// Recupera todos os campos do form - $request->all();
}
```

## Cadastrar os dados do form na tabela
```php
public function store(Request $request)
{
	// Pega todos os campos do form
	$dataForm = $request->except('_token');
	
	// Faz o cadastro
	$insert = $this->product->insert($dataForm);

	if($insert)
		return redirect()->route('produtos.index');
	else
		return redirect()->back(); // Volta para onde veio
//ou
	//	return redirect()->route('produtos.create'); // Volta para onde veio
}
```
## Para o avtive, que é requerido
```php
if($dataForm['active'] == '')
	$dataForm['active'] = 0;
else
	$dataForm['active'] =1;
ou
	$active['dataForm'] = (!isset($dataForm['active'])) ? 0 : 1;
```

## Método show($id)
```php
$produto = Produto::where('id', $id)->first();
ou
$produto = Produto::find($id);

return view('show', 'produto', $produto);
```
## Listagem com apenas dois campos de uma tabela:

$user_list = \App\User\User::pluck('name', 'id')->all();

## Paginator Instance Methods

Each paginator instance provides additional pagination information via the following methods:
Method 	Description
```php
$paginator->count() 	Get the number of items for the current page.
$paginator->currentPage() 	Get the current page number.
$paginator->firstItem() 	Get the result number of the first item in the results.
$paginator->getOptions() 	Get the paginator options.
$paginator->getUrlRange($start, $end) 	Create a range of pagination URLs.
$paginator->hasPages() 	Determine if there are enough items to split into multiple pages.
$paginator->hasMorePages() 	Determine if there is more items in the data store.
$paginator->items() 	Get the items for the current page.
$paginator->lastItem() 	Get the result number of the last item in the results.
$paginator->lastPage() 	Get the page number of the last available page. (Not available when using simplePaginate).
$paginator->nextPageUrl() 	Get the URL for the next page.
$paginator->onFirstPage() 	Determine if the paginator is on the first page.
$paginator->perPage() 	The number of items to be shown per page.
$paginator->previousPageUrl() 	Get the URL for the previous page.
$paginator->total() 	Determine the total number of matching items in the data store. (Not available when using simplePaginate).
$paginator->url($page) 	Get the URL for a given page number.
$paginator->getPageName() 	Get the query string variable used to store the page.
$paginator->setPageName($name) 	Set the query string variable used to store the page.

```

