# Coleções

Quando recebendo seus resultados de uma query, usando por exemplo, get() ou all() está usando uma coleção.

Basicamente pode pensar em uma coleção como sendo um array de resultados mas com alguns métodos utilitários. Quando você usa uma coleção, você está usando uma instância da classe Illuminate\Database\Eloquent\Collection

## Do livro Learning Laravel Eloquent
```php
$books = \App\Book::all();
$randomBook = $books->random();

$books = \App\Book::all();
$keysArray = $books->keys();
$valuesArray = $books->values();

$books = \App\Book::all();
$book = $books->where('title', 'Michael Strogoff');

$books = \App\Book::all();
$book = $categories->where('year',1876)->where('page_count', 254);

$categories = \App\Category::all();
return $categories;

$books = \App\Book::all();
$toArray = $books->toArray();
$toJson = $books->toJson();

$books = \App\Book::all();
$books->each(function($book)
{
echo $book->title;
});

$books = \App\Book:all();
$books->filter(function($book)
{
  if($book->year > 1840)
    return true;
  else
    return false;
});

$users = User::all();

$user = $users->find($key);// find retorna todos os registros com $key
```
## Algumas coleções
```php
all
avg
combine
concat
contains
count
countBy
crossJoin
dd
duplicates
each
filter
first
get
groupBy
has
implode
isEmpty
isNotEmpty
join
keys
last
make
max
median
min
only
pad
pull
push
put
random
replace
reverse
search
slice
some
sort
sortBy
sortByDesc
sortDesc
splice
split
sum
take
times
toArray
toJson
union
unique
values
when
whenEmpty
whenNotEmpty
where
zip
```
## all()
O método all() retorna a matriz subjacente representada pela coleção:
```php
collect([1, 2, 3])->all();

// [1, 2, 3]

sum()
collect([1, 2, 3, 4, 5])->sum();

find($key)
```
The find method finds a model that has a given primary key. If $key is a model instance, find will attempt to return a model matching the primary key. If $key is an array of keys, find will return all models which match the $keys using whereIn():
O método find() localiza um model que possui uma chave primária especificada. Se a $key for uma instância do modelo, o find tentará retornar um modelo correspondente à chave primária. Se $key é uma matriz de chaves, find() retornará todos os modelos que correspondem às $keys usando whereIn():
```php
$users = User::all();

$user = $users->find(1);

Usando like

public function pesquisar($pesquisa){// case insensitive
  $clientes = Cliente::where('nome', 'like', '%'.$pesquisa.'%')->get();
  return $clientes;
}
```
http://localhost:8000/pesquisar/jo

$total = Cliente::all()->count();

Pesquisar clientes pelo nome ou pelo e-mail
```php
public function pesquisar($pesquisa){// case insensitive
  $clientes = Cliente::where('nome', 'like', '%'.$pesquisa.'%')
    ->orWhere('email', 'like', '%'.$pesquisa.'%')
    ->get();
  return $clientes;
}
```
http://localhost:8000/pesquisar/jo

Somar quantidade de todos os produtos de uma tabela

$total = Compra::all()->sum('quantidade');

Média de compras dos clientes

$media = Compra::all()->avg();

Maior valor de produtos vendidos

$max = Compra::all()->max('quantidade');

$max = Compra::orderBy('quantidade', 'desc')->get();

https://laravel.com/docs/7.x/collections#introduction
https://laravel.com/docs/7.x/eloquent-collections#introduction
https://laravel.com/docs/7.x/eloquent-collections
