# Artisan

O artisan é uma ferramenta do Laravel que funciona com o php para executar diversas tarefas através do terminal

E seu uso é bem importante pois ele entrega em cada comando uma parte importante, que já ajuda bastante. Exemplo: na criação do controller já vem com o namespace, uma inclusão com use e a definição da classe.

## php artisan comando

## Listar todos os comandos do artisan
php artisan list

## Limpando cache
```php
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
```
## Gerar chave
php artisan key:generate

## Help/Ajuda
php artisan help migrate

php artisan make:migration -h (help)

## Mudar namespace da aplicação em geral
php artisan app:name Cadastro

O comando acima seta Cadastro como o novo namespace e configura todos os existentes
Exemplo: namespace Cadastro\Http\Controllers;

## Criar controller e model de uma só vez
php artisan make:controller ProdutoController --resource --model=Produto

Alternativas reduzidas
-m OR --migration
-c OR --controller
-r OR --resource

## Servidor embutido do PHP
php artisan serve
php artisan serve --port=8888

## Criar controller numa pasta específica
php artisan make:controller Painel/PainelController

## Gerar um controller com os esqueletos de todos os actions básicos
php artisan make:controller PhotoController --resource

## Migration com create já cria uma estrutura básica na classe, com id e timestamps
php artisan make:migration create_tabela_post --create-posts

## Listar routes
php artisan route:list

## Criar o model e a migration, já com parte do método up
php artisan make:model Produtos -m

## Versão do laravel
php artisan --version

## Verificar o ambiente padrão
php artisan env

## Otimizar o framework para melhor performance
php artisan optimize

## Derrubar a aplicação, tipo Ctrl+C quando em php artisan serve
php artisan down

## Levantar a aplicação, após um down
php artisan up

## Criar link simbólico para upload
php artisan storage:link

## Referências
https://welcm.uk/blog/laravel-commands-cheatsheet


