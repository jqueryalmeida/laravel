# Completar namespaces

## Instalar Extensão PHP Namespace Resolver

## Como usar

    Clique com botão direito sobre o nome da classe e selecione Import Class para automaticamente importar seu namespace para o topo do arquivo
    Pressione CTRL+ALT+i em Windows ou Linux ou CTRL+Option+i no MacOS

## Exemplo

```php
<?php
declare(strict_types = 1);

namespace App\Controllers;

class VendedoresController
{
    public function index()
    {
        $Obj = new Controller('vendedores');      
        $Obj->index();
    }
}    
```

## Clicar com botão direito em Controller na linha: 

 $Obj = new Controller('vendedores');
 
 E depois em Import Class
 
 Ou teclando CTRL+ALT+i
 
 Então terermos:
 
 ```php
<?php
declare(strict_types = 1);

namespace App\Controllers;

use Core\Controller; // Adiciona esta linha

class VendedoresController
{
    public function index()
    {
        $Obj = new Controller('vendedores');      
        $Obj->index();
    }
}    
```

## Alternativa
Instalar a extensão phpIntellisense

Então efetuar um duplo clique sobre o nome da classe e depois CTRL+BarraEspaço, que fará algo parecido, inserindo o use no topo do arquivo.

