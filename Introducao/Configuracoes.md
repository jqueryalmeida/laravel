# O principal arquivo de configurações é o

.env

que existe no raiz do aplicativo.

Se estiver usando um linux ou similar, num gerenciador de arquivos gráficos, tecle Ctrl+H para exibir o .env, visto que é um arquivo oculto.

Na pasta config existem muitos arquivos de configuração.

Alguns parâmetros que devemos ajustar no .env:
```php
APP_NAME="Meu Aplicativo"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
```
Para checar o tipo de ambiente que você está usando, execute:
```php
php artisan env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_banco
DB_USERNAME=root
DB_PASSWORD=
```
Algumas configurações no config/app.php
```php
Locales
    'locale' => 'en',
```
Talbém podemos adicionar o nosso (requer outras configurações)
```php
    'locale' => 'pt_BR',
```
Timezone
```php
    'timezone' => 'America/Fortaleza',
```

