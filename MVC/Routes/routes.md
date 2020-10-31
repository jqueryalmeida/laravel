# Usando Rotas no Laravel 7

Uma rota é uma ponte entre o mundo externo e a nossa aplicação. Uma forma de usuários que extão distantes ou mesmo na mesma máquina acessarem recursos da nossa aplicação. É composta por uma URL e pelo código para atender a essa URL.

Rotas são a parte do aplicativo que o programador prepara para responder a certas URLs que o usuário poderá solicitar ou então a links.
O caso mais usual de rotas e recomendado, simplificando, o aplicativo recebe uma solicitação de url, as rotas previamente preparadas recebem o pedido/requisição/request e o passam para um controller. O controller interage com o model, o model vai ao banco de dados, então o model devolve as devidas informações ao controller.O controller pode efetuar algumas operações, como verificação de autenticação, validação, etc. Então o controller passa o resultado final para a respectiva view. A view devolve ao usuário que as solicitou.

As rotas fazem o mapeamento entre as urls e os recursos do aplicativo.

Mas existe uma grande variedade de usos das rotas.

Nós veremos a seguir diversos exemplos de uso de rotas.

Na versão 7 do laravel as rotas ficam em:

routes/web.php

Existem outros tipos de rotas mas aqui lidaremos apenas com as web.

## Editar a rota default e deixar assim:
```php

Route::get(url: '/artigos', action: 'ArtigoController@index');

Route::get(url: '/artigos', [\App\Http\Controllers\ArtigoController::class, 'index']);

ou
use App\Http\Controllers\ArtigoController;
Route::get(url: '/artigos', [ArtigoController, 'index']);

Route::get('/', function () {
    return '<h1>Seja bem vindo ao Laravel 7</h1>';
});
```

## Então chamar

php artisan serve

localhost:8000

## Mostrará

Seja bem vindo ao Laravel 7

## Rota que trabalha com variáveis
```php
Route::get('/', function () {
  $nome = 'Ribamar FS';
  return '<h1>Seja bem vindo ao Laravel 7 '.$nome.'</h1>';
});
```

## Então chamar

php artisan serve

localhost:8000

## Mostrará na tela:

Seja bem vindo ao Laravel 7 Ribamar FS

## Renomeando uma rota com as

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index']);

## Principais verbos de rotas

## Tipos de routes
```php
HTTP	  Ação
get		  leitura/acesso a uma página
post	  gravação no bd
put		  atualização no bd
delete	  delete no bd

GET - /products | index
GET - /products/10 | show
GET - /products/10/edit | edit
GET - /products/create | create
POST - /products | store
PUT ou PATCH - /products/10 | update
DELETE - /products/10 | destroy
```
## Retornar um array para a url que solicitou
```php
Route::get('/medicos', function () {
    $medicos = [
      'Antônio',
      'João',
      'Pedro'
    ];
    return $medicos;
});
```
## Então chamar

php artisan serve

localhost:8000

## Mostrará

Os 3 nomes

## Passagem de parâmetro
```php
Route::get('dados/{id_usuario}', function($id_usuario){
  return view('dados')->with('id_usuario', $id_usuario);
});
```
## Passar vários parâmetros
```php
Route::get('dados/{id_usuario}/{id_consulta}', function($id_usuario, $id_consulta){
  return view('dados')->with('id_usuario', $id_usuario)->with('id_consulta', $id_consulta);
});
```
Chegará na views dados: $id_usuario e $id_consulta, caso sejam passado pela url os dois parâmetros exemplo:

http://localhost:8000/id1/id2

## Valor default de parâmetro
```php
Route::get('dados/{id?}', function($id=null){ // null ou 0 ou outro valor
  return view('dados')->with('id', $id);
});
```

## Rota para receber qualquer tipo
```php
Route::any('any', function () {
    return 'Rota qualquer';
});
```
## Usando namespace
```php
Route::get('page', [\App\Http\Controllers\PageController::class, 'action']);
```
## Acessar somente alguns actions
```php
Route::resource('photo', 'PhotoController', ['only' => [
    'index', 'show'
]]);

Route::resource('photo', 'PhotoController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);
```
## Forçar o uso do HTTPS na rota
```php
Route::filter('https', function(){
  if(Request::secure())
  return Redirect::secure(URI::current());
});
```

