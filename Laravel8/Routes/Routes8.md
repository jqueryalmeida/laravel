# Rotas no Laravel 8

As rotas agora não acessam, por default, os controllers globalmente em app/Http/Controllers. Para que acessem precisamos usar:
```php
Route::get('/home', 'App\Http\Controllers\HomeController@index');
```
Ou então
```php
use App\Http\Controllers\UserController;
Route::get('/user', [UserController::class, 'index']);
```
```php
php artisan make:controller PhotoController --resource

use app/Http/Controllers/PhotoController.php

Route::resource('photos', PhotoController::class);

Route::resources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
```
Outros exemplos
```php
php artisan make:controller PhotoController --resource --model=Photo

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
```

## API
```php
Route::apiResource('photos', PhotoController::class);
Route::apiResource('photos', PhotoController::class);

php artisan make:controller API/PhotoController --api
Route::resource('photos.comments', PhotoCommentController::class);
Route::resource('photos.comments', PhotoCommentController::class)->scoped([
    'comment' => 'slug',
]);

Route::resource('photos.comments', CommentController::class)->shallow();
Route::resource('photos', PhotoController::class)->names([
    'create' => 'photos.build'
]);

Route::resource('users', AdminUserController::class)->parameters([
    'users' => 'admin_user'
]);

Route::get('photos/popular', [PhotoController::class, 'popular']);
Route::resource('photos', PhotoController::class);
```
