# Editor de Código VSCode

O VSCode ou Visual Studio Code é um editor de código free que tem suporte para uma grande quantidade de linguagens de programação. Muitos bons recursos e expansível com suas extensões.
https://code.visualstudio.com/

## Configurações nativas

Logo após instalar e ao abrir pela primeira vez clique à direita nos links

Tools and languages

JavaScript, PHP

Para ativar os recursos nativos para estas linguagens.

## Emmet - extensão nativa para HTML e CSS

- Crie um novo arquivo com Ctrl+N
- Troque seu tipo de Plain Text para HTML (na barra de status abaixo e à direita)
- Agora simples digite ! e tecle enter


Veja que ele expande em:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
```

Mais algumas demonstrações

Digite
ul>li*4

Ele expandirá em:
```html
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
```
Descubra outras abreviações que ele expande.

Mais detalhes em:
https://code.visualstudio.com/docs/editor/emmet
https://docs.emmet.io/abbreviations/

## Snippets

Snippets são pequenos trechos de código de uma linguagem que são expandidos após digitar seu nome no editor estando num arquivo com a mesma linguagem.

Como exemplo valor criar um pequeno snipper que já traz um html inicial:
```html
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <h1>Título da Página</h1>h1>

    <script src="script.js"></script>
</body>
</html>
```
Acontece que o VSCode usa json para guardar os snippetsl então para facilitar a criação iremos usar o site
https://snippet-generator.app/

Acessemos o site, copiemos para a memória o trecho de código acima e colemos na textarea da esquerda. Veja que o site trabalha com VSCode, Sublime e Atom e está selecionada a aba do VSCode

Na caixa Description entre "html-inicial"
Na caixa com Tab trigger .. entre "html5", que é o tipo/linguagem
Rola a tela e clique no lado direito ao final em Copy snippet e Ctrl+C

Vou colar aqui apenas para orientação:
```json
"html": {
  "prefix": "html-inicial",
  "body": [
    "<!DOCTYPE html>",
    "<html lang=\"pt_BR\">",
    "<head>",
    "    <meta charset=\"UTF-8\">",
    "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">",
    "    <title>Título</title>    ",
    "    <link rel=\"stylesheet\" href=\"style.css\">",
    "    <link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\">",
    "</head>",
    "<body>",
    "    <h1>Título da Página</h1>h1>",
    "",
    "    <script src=\"script.js\"></script>",
    "</body>",
    "</html>"
  ],
  "description": "html-inicial"
}
```
Abra o VSCode
File - Preferences
User Snippets
Digite html e Enter

O código existente manenha-o e apenas abra espaço de uma linha ao final acima do } e cole nosso código acima deste fecha chave

Tecle Ctrl+S para salvar e feche com Ctrl+W

Crie um novo arquivo e mude para HTML

Digite

html-inicial

E tecle Enter

Claro que você pode e deve customizar o código para que atenda as suas necessidades e torne seu trabalho ainda mais produtivo.

## Listar os snippets existentes com a mesma linguagem do arquivo atual

Ctrl+barra


## Teclas de Atalho
```html
Ctrl+N - Abrir novo arquivo
Ctrl+S - Salvar
Ctrl+O - Abrir arquivo existente
Fechar janela/editor - Ctrl+W
Ctrl+F - Procurar string no arquivo atual
Ctrl+H - Sobrescrever string no arquivo atual
Ctrl+Shift+F - Procurar string em todos os arquivos do projeto atual
Ctrl+Shift+H - Sobrescrever string em todos os arquivos do projeto atual
F1 - Abrir paleta de comandos
```
Existem diferenças de acordo com o sistema operacionnal, veja

https://code.visualstudio.com/docs/getstarted/keybindings

Windows - https://go.microsoft.com/fwlink/?linkid=832145
macOS - https://go.microsoft.com/fwlink/?linkid=832143
Linux - https://go.microsoft.com/fwlink/?linkid=832144

# Editor de código VSCode

## Completando namespace:

Digitar

namespace

Quando começar a digitar o namespace ele completará, como exemplo:

namespace A

Ele completa com

namespace App\Controller;

## Dicas

## Selecionar várias colunas
- Colocar o cursos no início
- Alt+Shift+Up ou Down
- E mover o cursor para cima ou para baixo e para a direita ou esquerda para ter a largura desejada

## Selecionar todas as ocorrências de uma palavra e somente elas
- Selecione a primeira
- Tecle: Ctrl+Shift+L ou Ctrl+F2

## Selecionar uma a uma as ocorrências de uma palavra
- Selecione a palavra
- Tecle Ctrl+D

#Desfazer seleção - Ctrl+U

Em Settings - Editor: Multi Cursor Modifier - podemos mudar para ctrlCmd

- Comentar um bloco de linhas com //
- Selecionar o bloco
- Teclar Ctrl+K+C ou Ctrl+K e Ctrl+C ou Ctrl+/
- Ctrl+K+U - descomenta

## Comentar com /* ... */ - Ctrl+Shift+A

## Preview de um método

Alt+F12

## Pequeno e útil snippet que permite digitar
pf

E ele cria

public function $1(){}

File - Preferences - User Snippets - New snippet file for clientes - php (e Enter)

Apague tudo e deixe apenas:
```php
{
	 "Abreviação pf": {
	 	"scope": "php",
	 	"prefix": "pf",
	 	"body": [
	 		"public function $1(){}",	 	
	 	],
	 	"description": "Abreviação para public function"
	 }
}
```
Lembre de manter as chaves, pois o código é json.

Agora em arquivos tipo PHP ao digitar

pf

E teclar enter ele expandirá em:

public function (){}


## Adicionar namespace para uma classe

Quando não sabemos qual o namespace do arquivo atual:
- Teclar F1
- Digitar: namespace
- E teclar enter

Ele inserirá o namespace

Teclas de atalho

Ctrl+N - abrir novo arquivo
Ctrl+W - fechar janela atual
Ctrl+S - salvar arquivo atual
F1 - abrir janela de comandos
Ctrl+F - localizar arquivos
Ctrl+Shift+F - localizar em todos os arquivos do projeto atual
Ctrl+H - localizar e sobrescrever arquivo
Ctrl+Shift+H - localizar e sobrescrever em todos os arquivos do projeto atual

Backup dos snippets e configurações

.config/Code/User
  snippets
  settings.json

Listar extensões instaladas no terminal

code --list-extensions

