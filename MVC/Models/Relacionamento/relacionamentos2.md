# Relacionamento entre models no laravel7

Dois cruds clientes e vendedores (cada vendedor se relaciona com ou mais clientes)

## Criar o aplicativo

laravel new relacionamentos2

cd relacionamentos2

## Instalação do gerador de CRUDs
composer require appzcoder/crud-generator --dev

## Executar
php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"

## Configurar
Editar config/app.php file e adicionar os dois abaixo
```php
'providers' => [
        Collective\Html\HtmlServiceProvider::class,

'aliases' => [
        'Form' => Collective\Html\FormFacade::class,
        'HTML' => Collective\Html\HtmlFacade::class,
```
## Criar um CRUD para Empresas e um para clientes na pasta raiz

php artisan crud:generate Vendedores --fields='nome#string; email#string' --view-path='' --controller-namespace='' --route-group='' --form-helper=html

php artisan crud:generate Clientes --fields='nome#string; email#string; vendedor_id#integer' --view-path='' --controller-namespace='' --route-group='' --form-helper=html


## Configurar o banco no .env
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud
DB_USERNAME=root
DB_PASSWORD=root
```
## Editar os migrations e deixar assim:

## Vendedores
```php
    public function up()
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendedores');
    }
```


## Clientes
```php
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->unsignedInteger('vendedor_id')->nullable();// Atentar para o unsigned
            $table->timestamps();

            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');
        });
  }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clientes');
        Schema::enableForeignKeyConstraints();
    }
```

Em tabelas relacionadas como estas duas a que precisa aparecer primeiro é a que não tem o foreign key. Então se for necessário devemos renomear para que apareça primeiro na relação de arquivos.

## php artisan migrate


## Implementar o relacionamento
```php
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    protected $fillable = ['name','email'];

    public function clientes(){
        return $this->hasMany(Cliente::class);
    }
}

<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['name','email'];

    public function vendedor(){
        return $this->belongsTo(Vendedor::class);
    }
}
```
## Testar
php artisan serve

http://localhost:8000/vendedores
http://localhost:8000/clientes

Editar layouts/app.blade.php e adicionar os links para clientes e vendedores ao lado de login

## Corrigindo a view
clientes/index.blade.php e de vendedores

Mudar linha 39
                                        <td>{{ $loop->iteration }}</td>

Para
                                        <td>{{ $item->id }}</td>

