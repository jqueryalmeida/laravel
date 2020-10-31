# Algumas configurações do Laravel 7

## Consultar o Ambiente de desenvolvimento/produção
php artisan env

## Editar
.env

APP_ENV=local

Paraa jogar em produção
APP_ENV=production


## Configurações do banco no .env
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api
DB_USERNAME=root
DB_PASSWORD=root
```
## Configurar o Timezone

config/app.php

'timezone' => 'America/Fortaleza',


