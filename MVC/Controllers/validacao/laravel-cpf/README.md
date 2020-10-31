# Validação CPF com Laravel

<a href="https://travis-ci.org/vsilva472/laravel-cpf"><img src="https://travis-ci.org/vsilva472/laravel-cpf.svg?branch=master" /></a>

## Descrição

LaravelCPF é uma extensão do validator do Laravel para validar CPFs (independente se o valor possui máscara aplicada 999.999.999-99 ou não) de forma simples.


## Requisitos
* [PHP](https://php.net) 5.6+
* [Laravel](https://laravel.com/) 5.1+


## Instalação 

+ Executando o comando para adicionar a dependência automaticamente
```php
composer require vsilva472/laravel-cpf
```

* Baseado em uma instalação limpa abra o arquivo `config/app.php` navegue até a seção `providers` e insira no final
```php
        Vsilva472\LaravelCPF\LaravelCPFServiceProvider::class,
 ``` 
 
* Publicar os arquivos de idiomas com as mensagens de erro:
```php
 php artisan vendor:publish --tag=lcpf_lang
```

> Você poderá customizar as mensagens de erro. Para isso, abra o arquivo `/resources/lang/{lang}/cpf.php`, onde **{lang}** é o código do idioma (ex: pt-br) que você deseja alterar.


## Como utilizar
A forma de utilização é a mesma de qualquer outra regra pré-existente. O nome do validador para cpf é "cpf". Veja um exemplo básico:

No controller, no método store (ao adicionar novo) ou no update (ao alterar)

    public function store(Request $request)
    {
        $requestData = $request->all();
        Cliente::create($requestData);

        $validatedData = $request->validate([
            'nome' => 'required|max:55',
            'email' => 'required',
            'cpf' => 'required|cpf',
        ]);

        return redirect('clientes')->with('flash_message', 'Cliente added!');
    }

No config/app.php

    'locale' => 'en',
    'locale' => 'pt-br',

### Changelog
Para consultar o log de alterações acesse o arquivo [CHANGELOG.md](https://github.com/vsilva472/laravel-cpf/blob/master/CHANGELOG.md)

### Donation
Help me to improve this project sending me some **HTMLCOIN**  
Wallet: **[HqgaiK6T1o2JP4p3p34CZp2g3XnSsSdCXp](htmlcoin:HqgaiK6T1o2JP4p3p34CZp2g3XnSsSdCXp?label=Doa%C3%A7%C3%B5es%20Github)**  
  
![Doar HTMLCoin](https://www.viniciusdesouza.com.br/img/htmlcoin.png)

#### Licença
MIT
