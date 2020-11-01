# Apontar domínio para o GitHub

No repositório criar um arquivo CNAME no raiz contendo o domínio
```php
CNAME
ribafs.org

ribafs.org.              3592    IN      CNAME   ribafs.github.io.
ribafs.github.io.      43192   IN      CNAME    GITHUB-PAGES-SERVER		(inválido)
GITHUB-PAGES-SERVER .         22      IN      A       192.0.2.1

ribafs.org     3600    IN A     185.199.108.153
ribafs.org     3600    IN A     185.199.110.153
ribafs.org     3600    IN A     185.199.110.153
ribafs.org     3600    IN A     185.199.111.153
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
• Produto: Domínio Internacional (ribafs.org)
• Solicitação: Alteração de DNS
• Informe as entradas de DNS ou entradas de zona de DNS avançada desejadas: Favor apontar

A - 192.30.252.153
A - 192.30.252.154

CNAME www ribafs.github.io

• ID do produto: 24722
```

