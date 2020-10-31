<?php
require_once 'vendor/autoload.php';

use League\CommonMark\CommonMarkConverter; //utilizando o conversor padrão do CommonMark

$converter = new CommonMarkConverter(); //instanciando um novo conversor

$markdown = file_get_contents('html2md.md');

echo $converter->convertToHtml($markdown); //convertendo o markdown


