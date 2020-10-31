Criar uma pasta para o projeto

mkdir /var/www/html/md
cd /var/www/html/md
Baixar o arquivo abaixo
https://gist.github.com/pokemaobr/32aeb11e6320a9c3c142588c780b39e7

Instalar
composer require league/commonmark

Criar o arquivo md2html.php com o conteúdo abaixo e indicar o markdownit.md ou outro

Executar
php -S localhost:8000

Chamar
http://localhost:8000

Referências
https://github.com/thephpleague/commonmark
https://github.com/thephpleague/html-to-markdown


Agora converter HTML para Markdown

Salvar o HTML gerado anteriormente como localhost.html

Criar o arquivo
html2md.php com o conteúdo abaixo

<?php
require_once 'vendor/autoload.php';
use League\CommonMark\CommonMarkConverter; //utilizando o conversor padrão do CommonMark
$converter = new CommonMarkConverter(); //instanciando um novo conversor
$markdown = file_get_contents('markdownit.md');
file_put_contents('localhost.html',$converter-&gt;convertToHtml($markdown)); //salvando o markdown convertido em html

Acessar executar

composer require league/html-to-markdown

Criar html2md.php

<?php
require_once 'vendor/autoload.php';
use League\HTMLToMarkdown\HtmlConverter; //utilizando o conversor padrão do  HTMLToMarkdown
$converter = new HtmlConverter(); //instanciando um novo conversor
$html = file_get_contents('localhost.html');
echo $converter->convert($html);

Chamar

http://localhost:8000/html2md.php

Remover o lixo do início
