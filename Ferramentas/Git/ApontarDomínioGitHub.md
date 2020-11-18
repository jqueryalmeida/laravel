# Apontar domínio para o GitHub

No repositório criar um arquivo CNAME no raiz contendo o domínio, contendo apenas o domínio

ribafs.me

Adicionar na administração do domínio o registro

```php
    type = CNAME
    name = www
    value = ribafs.github.io.
```
https://help.github.com/en/articles/managing-a-custom-domain-for-your-github-pages-site

Na administração do domíonio criar dois registros tipo A
```php
A - 192.30.252.153
A - 192.30.252.154

CNAME	www	ribafs.github.io
```
E um tipo CNAME apontando para www e para ribafs.github.io
```php
• Produto: Domínio Internacional (ribafs.me)
• Solicitação: Alteração de DNS
• Informe as entradas de DNS ou entradas de zona de DNS avançada desejadas: Favor apontar

A - 192.30.252.153
A - 192.30.252.154

CNAME www ribafs.github.io

• ID do produto: 24722
```

