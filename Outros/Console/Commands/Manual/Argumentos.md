# Argumentos de comandos

## Argumentos opcionais
```php
protected $signature = 'alloted:shares {user} {age} {--difficulty=} {--istest=}';

{user} {--difficulty=} {--istest=} são argumentos opcionais

php artisan ide-helper:models --dir="path/to/models" --dir="app/src/Model"
```
Para tornar um argumento opcional use uma interrogação

{field?}

Como lidar com arrays juntamente com argumentos simples?

// Optional argument...
email:send {user?}

// Optional argument with default value...
email:send {user=foo}

## Argumento com array

email:send {user*}

## Argumento com array e opcional

email:send {user?*}

## Options

Os options, como os argumentos, são outra forma de entrada do usuário. São prefixados por dois hífens (--) quando são especificados na linha de comando
```php
protected $signature = 'command:name
    {argument}
    {optionalArgument?}
    {argumentWithDefault=default}
    {--booleanOption}
    {--optionWithValue=}
    {--optionWithValueAndDefault=default}
';
```
Exemplo de uso
```php
do:thing {awesome}
```
O usuário roda
```php
php artisan do:thing fantastic
```
No código
```php
$this->argument('awesome'); // Deve retornar fantastic

jump:on {thing1} {thing2} 
```
Usuário roda
```php
php artisan jump:on rock boulder

$this->argument() deve retornar o array:
[
    'command': 'jump:on',
    'thing1': 'rock',
    'thing2': 'boulder'
]
```

## Recebendo um argumento
```php
$this->argument('nome_arg');
```

## Receber todos os argumentos
```php
$this->arguments();
```

## Recebdo um option
```php
$this->option('nome');
```
## Receber todos os options
```php
$this->options();
```
Dica: mantenha sempre os argumentos cercados de chaves {}.

## Trabalhando com arrays de argumentos:
```php
        $roles = [];
        foreach($slug_roles as $role){
            array_push($roles,Role::where('slug',$role)->get()); // Precisa ser uma das roles existentes em 'roles'
        }

      $c = count($this->argument('field'));
      $fld='';
      for($x=0; $x<$c;$x++)
      {
        if($x < $c-1){
        $fld .= "'".$this->argument('field')[$x]."',";
        }else{
        $fld .= "'".$this->argument('field')[$x]."'";
        }
      }
```

