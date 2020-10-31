# Um pouco do Eloquent

## Métodos find() e all():
```php
App\Produto::all(); //SELECT * FROM produtos;
App\Produto::find(1); // SELECT * FROM produtos WHERE id = 1;

App\Cliente;

public function index(){
// O código abaixo também funciona numa rota com App\Cliente;
//  $clientes = Cliente->all(); // ou get()
  $clientes = Cliente->where('nome', 'Joao')->get();
  return $clientes;
}
```
Importante: no Eloquente existe uma relação fiel entre o nome da tabela e da classe:

Tabela - clientes

Model - Cliente


