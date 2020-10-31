<?php
require_once 'vendor/autoload.php';
use League\HTMLToMarkdown\HtmlConverter; //utilizando o conversor padrão do  HTMLToMarkdown
$converter = new HtmlConverter(); //instanciando um novo conversor
$html = file_get_contents('localhost.html');
echo $converter->convert($html);

