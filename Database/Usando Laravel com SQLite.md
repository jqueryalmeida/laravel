# Usando Laravel com SQLite

## Instalar a extensão

sudo apt install php7.4-sqlite3

## Criar o banco

cd database

touch database.sqlite

## Editar o .env
```php
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```
Deixe os demais sem alterar, pois o sqlite não usa host,  user nem senha
```php
sudo service apache2 restart

php artisan migrate
```

