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


## Algumas Extensões
Seja prudente com a instalação de extensões, pois são muitas. Caso instale e não vá usar desinstale.
Caso contrário perderá uma boa característica do VSCode que é sua performance.

### Shortcut Menu Bar
Mostrar vários ícones úteis no menu superior direito:
- Terminal 
- Beautfy code: HTML, PHP, JavaScrcipt
- Dividir editor em 2 na vertical

### Visual studio intellicode

### PHP Intelephense
Autocompleta e autoformata (F1 - Format)

### Prettier - Code formatter
F1 - Format Document

### Tema
Atom one dark Theme

## Outras extensões
https://marketplace.visualstudio.com/VSCode

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


