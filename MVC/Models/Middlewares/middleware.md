# Middlewares são filtros intermediários entre model e controller
https://www.youtube.com/watch?v=YwHRSe9_zpI&list=PLVSNL1PHDWvQBtcH_4VR82Dg-aFiVOZBY&index=55

O Middleware é apenas um mecanismo de filtragem de requisição HTTP. Ou seja, ele permite ou barra determinados fluxos de requisição que entram na sua aplicação, baseado em regras definidas.

O Middleware de autenticação do Laravel é considerado de rota, mas, ainda existem outros 2 tipos: os Middlewares globais e os grupos de Middlewares, que falarei a seguir.

Middleware: o Laravel apresenta fácil integração com o middleware. Middleware é útil quando você deseja interagir com o processo de request e response de seu aplicativo de uma maneira que não polua a lógica específica do aplicativo.

O middleware é um código não específico do domínio que, no entanto, pode interagir com seus aplicativos, ciclo de request/response. Exemplos desse código incluem autenticação e autorização, armazenamento em cache, monitoramento de desempenho e compactação de conteúdo; enquanto todos esses recursos são cruciais, nenhum é específico do domínio e, portanto, não deve exigir que você polua o código do seu projeto para tirar proveito dele. O Laravel 5 adiciona suporte para middleware e até inclui vários recursos úteis, soluções de middleware que você pode começar a usar em seus aplicativos agora.

Um processo adequado de autenticação e autorização deve passar pela filtragem primeiro, ele filtra os usuários junto com outras credenciais. Se o exame de filtragem
passa, somente então usuários autenticados podem entrar no seu aplicativo. Laravel apresenta o conceito de middleware entre os processos de filtragem, para que a filtragem adequada ocorra antes de tudo começar. Você pode pensar no middleware como uma série de camadas que as solicitações HTTP devem passar antes que realmente atinjam seu aplicativo. O mais se um aplicativo for avançado, mais camadas poderão examinar as solicitações nos estágios diferentes e, se um teste de filtragem falhar, a solicitação será totalmente rejeitada.

Mais simplesmente, o mecanismo de middleware verifica se o usuário está autenticado. Se o usuário não estiver autenticado, o middleware enviará o usuário de volta à página de login. E se o middleware está satisfeito com a autenticação do usuário, permite que a solicitação continue mais adiante na aplicação.

Também há outras tarefas às quais o middleware foi atribuído. Por exemplo, registrar o middleware pode registrar todas as solicitações recebidas no seu aplicativo.  Desde que eu vou discutir os processos de autenticação e autorização em detalhes, você examinará a middleware responsável por essas tarefas em particular posteriormente neste capítulo.

Nesta seção, você está interessado no middleware que lida com autenticação e proteção CSRF. Todos esses componentes de middleware estão localizados em

app/Http/middleware.

## Usar o middleware auth somente em certas rotas
```php
protected $request;

public function __construct(Request $request){
  $this->request = $request;
  // $this->middleware('auth'); // Filtra todas as rotas
  //$this->middleware('auth')->only('create'); // Filtra somente a create
  $this->middleware('auth')->only(['create','store']); // Filtra somente a create
  // $this->middleware('auth')->except(['index','show']); // Filtra todas as rotas, exceto index e show
}
```
## Configurar em app/Http/Kernel.php

## Criar novo middleware
Cuja finalidade é permitir que somente certo usuário pode acessar algumas rotas

php artisan make:middleware VerificarLoginMiddleware

Cria em

app/Http/Middleware/VerificarLoginMiddleware.php
```php
Registrar no Kernel
app/Http/Kernel.php

No array $routeMiddleware[
  ...
  'verivy.login' => \App\Http\Middleware\VerificarLoginMiddleware::class,
];
```
## Adicionar para a rota desejada:

Route::produtos('/produtos', 'ProdutoController')->middleware('auth', 'verify.login');

## Ajustar o middleware criado:

app/Http/Middleware/VerificarLoginMiddleware.php

No método handle()
```php
public function handle($request, Closute $next){
  $user = auth()->user();
  if($user->email != 'ribafs@gmail.com'){
    return rediredt('/');// ou para login
  }
  return $next($request);
}

/* ou
  if(!in_array($user->email, ['']){// vários e-mails negados
    return rediredt('/');// ou para login
  }
*/
```

## Restringir ações de usuários. 

Exemplos: autenticação

artisan é similar ao bake no Cake

php artisan - lista os comandos

## Criar uma nova middleware

php artisan make:middleware MyMiddlewarePerson

Ver o arquivo em:

app/Http/Middleware

MyMiddlewarePerson.php

dd() - retorna muitas informações importantes


## Controllers
Camada principal de código
https://www.youtube.com/watch?v=5PU_eX_QWxs&list=PLVSNL1PHDWvTQnUQjhBEzY2ZSzJTR9zcZ&index=9

php artisan make:controller ProdutosController

Criou o arquivo ProdutosController.php em:

app/Http/Controllers

## Criar rota chamando um controller e seu método index

Route::get('produtos', 'ProdutosController@index');

Criar um folder produtos em views:

resources/views/painel/produtos

Criar index.blade.php em produtos contendo:

<h1>Lista de Produtos</h1>

No Controller fica assim:
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
	public function index()
	{
//		return 'Listagem dos produts';
		return view('painel.produtos.index');
	}
}
```
Passar array do Controller para a view

		return view('painel.produtos.index', ['nome' => 'Carlos Ferreira']);

Na view chamar:

<h1>Lista de Produtos</h1>
Nome do Usuário: {{$nome}}

Criar método create com form

resources/view/painel/produtos/create.blade.php

Update

Destroy


## Criar uma migration

php artisan make:migration create_table_carros

Criar a tabela editando o arquivo gerado
```php
    public function up()
    {
        Schema::create('carros', function (Blueprint $table){
			$table->increments('id');
			$table->string('nome');
			$table->string('palca');			
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
```
php artisan migrate

Criará as tabelas no SGBD

Criar uma seeder

php artisan make:seeder CarrosSeeder

Cria em databases/seeders

Editar DatabaseSeeder.php e adicione a linha ao final da função run():

$this->call('CarrosSeeder')

Depois de criar o seeder execute:

php artisan db:seed

Cria o arquivo e popula a tabela.
```php
class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');

    $this->middleware('admin-auth')
    ->only('admin');

    $this->middleware('team-member')
    ->except('admin');
  }
}

public function __construct()
  {
      $this->middleware('auth')->except('index', 'show');
  }

public function create()
    {
        //
        if(Auth::user()->is_admin == 1){
            return view('tasks.create');
        }
        else {
          return redirect('home');
        }
    }

public function update(Request $request, $id)
    {
        if(Auth::user()->is_admin == 1){
            $post = Task::findOrFail($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();
            if($post){
             return redirect('tasks');
            }
        }
    }

    public function edit($id)
    {
      if(Auth::user()->is_admin == 1){
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
      }
      else {
        return redirect('home');
      }
    }

public function update(Request $request, $id)
    {
        //
        if(Auth::user()->is_admin == 1){
          if($file = $request->file('image')){
              $name = $file->getClientOriginalName();
              $post = Article::findOrFail($id);
              $post->title = $request->input('title');
              $post->body = $request->input('body');
              $post->published_at = $request->input('published_at');
              $post->image = $name;
              $post->save();
              $file->move('images/upload', $name);
          }
 else {
              // code...
              $post = Article::findOrFail($id);
              $post->title = $request->input('title');
              $post->body = $request->input('body');
              $post->published_at = $request->input('published_at');
              $post->save();
          }
          if($post){             
            return redirect('articles')->with('status', 'Article Updated!');
          }
        }
    }

 public function store(Request $request)
    {
        if($file = $request->file('image')){
         $name = $file->getClientOriginalName();
         $post = new Article;
         $post->title = $request->input('title');
         $post->body = $request->input('body');
         $post->published_at = $request->input('date');
         $post->image = $name;
         $post->save();
         $file->move('images/upload', $name);
   }
         if($post){      
          return redirect('articles')->with('status', 'Article Created!');
         }
    }

public function create()
    {
      if( Auth::check() ){
        if(Auth::user()->role_id == 1){
                return view('companies.create');
        }
      }
        return view('auth.login');
    }
```


