## Autenticação no Laravel 7

No laravel 6 e anteriores a autenticação era bem simples, apenas:

php artisan make:auth

Mas no 7 precisa executar umas poucas linhas de comando

composer require laravel/ui --dev
php artisan ui bootstrap --auth

Onde tem bootstrap pode ser:
- vue
- react

npm install && npm run dev

npm audit fix

## Autenticação para laravel 8


sudo composer require laravel/jetstream;
sudo php artisan jetstream:install livewire;


