# Criar registro via routes
```php
Route::get('clientes.create', function() {
  $cliente = new \App\Cliente;
  $cliente->nome = 'João Brito';
  $cliente->email = 'joao@joao.org';
  $cliente->save();
  echo 'Cliente: ' . $cliente->id;
});
```
php artisan serve

http://localhost:8000/clientes/create

## Ler todos os regsitros via routes
```php
Route::get('cliente_all', function(){
  return \App\Cliente::all();
});
```
php artisan serve

http://localhost:8000/cliente_all

## Retornar alguns registros via routes de acordo com condição
```php
Route::get('cliente_where', function(){
  $result = \App\Cliente::where('id', '<', 5)->get();
  return $result;
});
```
http://localhost:8000/cliente_where

## Receber primeiro registro de uma consulta
```php
Route::get('cliente_first', function(){
  $result = \App\Cliente::where('id', '<', 5)->first();
  return $result;
});
```
http://localhost:8000/cliente_first

## Receber registro através de consulta
```php
Route::get('cliente_get', function(){
  $result = \App\Cliente::where('id', '<', 5)->where('nome', '=', 'João Brito')->get();
  return $result;
});
```
http://localhost:8000/cliente_get

## Usando foreach em consulta no routes
```php
Route::get('cliente_foreach', function(){
  $results = \App\Cliente::where('id', '<',5)->get();
  if(count($results) > 0)
  {
    foreach($results as $cliente){
      echo 'Cliente: ' . $cliente->nome . ' - ID:' . $cliente->id . ' <br/>';
    }
  }
  else
  echo 'No Results!';
  return '';
});
```
http://localhost:8000/cliente_foreach

## Atualizando registro via routes e eloquent
```php
Route::get('cliente_update', function() {
  $cliente = \App\Cliente::find(2);
  $cliente->nome = 'Pedro Sousa';
  $cliente->id = 2;
  $cliente->save();
  return 'Registro Atualizado';
});
```
http://localhost:8000/cliente_update

## Excluindo registro
```php
Route::get('cliente_delete', function() {
  \App\Cliente::find(3)->delete();
  return 'Registro excluído';
});
```
## Outras operações

where('pages_count', '<', 100)->where('title', 'LIKE', 'M%')
```php
Route::get('book_get_where_complex', function(){
  $results = \App\Book::where('title', 'LIKE', '%Second%')
    ->orWhere('pages_count', '>', 140)
    ->get();
  return $results;
});

Route::get('book_get_where_more_complex', function(){
  $results = \App\Book::where(function($query){
    $query
      ->where('pages_count', '>', 120)
      ->where('title', 'LIKE', '%Book%');
  })->orWhere(function($query){
    $query
      ->where('pages_count', '<', 200)
      ->orWhere('description', '=', '');
  })->get();
  return $results;
});

Route::get('...', function(){
  $results = \App\Book::where(function($query){
    $query
      ->where(function($query){
      // other conditions here...
      $query->where(function($query){
        // deeper and deeper in the seas of conditions...
      });
    })
    ->orWhere('field', 'operator', 'condition');
  })->orWhere(function($query){
    $query
      ->where('field', 'operator', 'condition')
      ->orWhere(function($query){
    // other conditions here...
      });
  })->get();
  return $results;
});
```
## Pesquisar por Livros que não existem
```php
$booksThatDontExist = \App\Book::whereNull('title')->get();

Route::get('book_get_where', function(){
  $result = \App\Book::wherePagesCount(1000)->first();
  return $result;
});

Route::get('book_get_books_count', function(){
  $booksCount = \App\Book::count();
  return $booksCount;
});

Route::get('book_get_books_avg_price', function(){
  $avgPrice = \App\Book::where('title', 'LIKE', '%Book%')->avg('price');
  return $avgPrice;
});

Route::get('book_get_books_avg_price', function(){
  $countTotal = \App\Book::where('pages_count', '>',100)->avg('price');
  return $countTotal;
});

// orderBy
\App\Book::orderBy('title', 'asc')->get();
// groupBy
\App\Book::groupBy('price')->get();
// having
\App\Book::having('count', '<', 20)->get();

$book = new \App\Book($request->all());
// or...
$book = \App\Book:create($request->all());

Especificando formato de data no model

<?php
namespace App;

class Book extends Model {
  protected $table = 'books'';
  protected function getDateFormat()
  {
    // returining a different timestamp format!
    return 'd/m/Y';
  }
}
```
## Escopo em consultas
```php
<?php // Book.php
namespace App;

class Book extends Model {
  public function scopeCheapButBig($query)
  {
    return $query->where('price', '<', 10)->where('pages_count', '>', 300);
  }
}

<?php // Book.php
namespace App;

class Book extends Model {
  public function scopeCheap($query)
  {
    return $query->where('price', '<', 10);
  }

  public function scopeExpensive($query)
  {
    return $query->where('price', '>', 100);
  }

  public function scopeLong($query)
  {
    return $query->where('pages_count', '>', 700);
  }

  public function scopeShort($query)
  {
    return $query->where('pages_count', '<', 100);
  }
}
```
## Use isto para reduzir código repetido.
```php
<?php
// getting cheaper and longer books;
$cheapAndLongBooks = \App\Book::cheap()->long()->get();

// getting most expensive and longer books;
$expensiveAndLongBooks = \App\Book::expensive()->long()->get();

// getting cheaper and shorter books;
$cheapAndShortBooks = \App\Book::cheap()->short()->get();

// getting expensive and shorter books;
$expensiveAndShortBooks = \App\Book::expensive()->short()->get();
```

