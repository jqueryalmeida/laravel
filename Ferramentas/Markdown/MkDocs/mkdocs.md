# MkDocs

MkDocs is a fast, simple and downright gorgeous static site generator that's geared towards building project documentation. Documentation source files are written in Markdown, and configured with a single YAML configuration file.

https://www.mkdocs.org/

O MkDocs é um gerador de site estático minimalista e muito simples de usar.

É um pacote Python

## Instalação no Linux Mint (20):

sudo apt-get install python3-pip

sudo pip install --upgrade pip

sudo pip3 install mkdocs

mkdocs --version
1.1.2

## Criar projeto

mkdocs new docs

mkdocs new ead-api

O comando acima criou a estrutura:
```php
mkdocs.yml
/docs/
    index.md

cd ead-api
mkdocs serve

http://127.0.0.1:8000/
```
Edite o 

mkdocs.yml

E altere a vontade.

Veja aqui configurações:

https://www.mkdocs.org/user-guide/configuration/#pages

## Adicionar uma segunda página:

Vamos usar uma pronta:

curl 'https://jaspervdj.be/lorem-markdownum/markdown.txt' > docs/about.md

Mas podemos usar qualquer outra ou criar uma nossa usando markdown

## Edite o mkdocs.yml e adicione a página about.md:
```php
site_name: MkLorum
nav:
    - Home: index.md
    - About: about.md
```
Adicionando tema personalizado

https://www.mkdocs.org/user-guide/configuration/#theme

## Editar mkdocs.yml e adicionar:
```php
theme: readthedocs

Para que fique assim:

site_name: Meu Site
nav:
    - Home: index.md
    - About: about.md
theme: readthedocs
```
## Configurações

https://www.mkdocs.org/user-guide/configuration/#docs_dir

Depois de tudo pronto vamos publicar nosso site no formato HTML na pasta site:

## Gerar o HTML

mkdocs build

### A pasta site conterá:

/about
/css
/fonts
/img
/js
/search
404.html
index.html
search.html
sitemap.xml
sitemap.xml.gz

## Limpando um build anterior

mkdocs build --clean

## Outros comandos

mkdocs --help

mkdocs build --help

## Temas nativos:

theme:
    name: readthedocs
    highlightjs: true
    hljs_languages:
        - yaml
        - rust

## Instalar mkdocs tema

sudo pip3 install mkdocs-material

All values much be numeric key codes. It is best to use keys which are available on all keyboards. You may use http://keycode.info/ to determine the key code for a given key.

        help: Display a help modal which lists the keyboard shortcuts. Default: 191 (?)
        next: Navigate to the "next" page. Default: 78 (n)
        previous: Navigate to the "previous" page. Default: 80 (p)
        search: Display the search modal. Default: 83 (s)

## Temas de terceiros

https://github.com/mkdocs/mkdocs/wiki/MkDocs-Themes

## Extensões

https://facelessuser.github.io/pymdown-extensions/

https://facelessuser.github.io/pymdown-extensions/extensions/highlight/

## HighLight de código
```php
markdown_extensions:
    - codehilite:
            guess_lang: False
            use_pygments: True
            noclasses: True
            linenums: True
            pygments_style: monokai
```

Com o server ativo, após alguma alteração no mkdocs.yml ele já atualiza sem precisar de refresh

## Imagens

A pasta fica dentro da docs
```php
docs/
    img/
        riba.png

site_name: Meu Site
nav:
    - Home: index.md
    - Código PHP: php.md
    - About: about.md
theme:
  name: 'rtd-dropdown'
markdown_extensions:
    - codehilite:
            guess_lang: False
            use_pygments: True
            noclasses: True
            linenums: True
            pygments_style: monokai
```
## Link para a imagem num arquivo .md:
```php
![RibaFS](img/riba.png)
![RibaFS](../img/riba.png)
```php

## Markdown Cheatsheet

https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet

Mais detalhes

http://daringfireball.net/projects/markdown/
http://github.github.com/github-flavored-markdown/

Editor online

https://stackedit.io/app

Editor offline

http://pad.haroopress.com/user.html

