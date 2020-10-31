# Editor de código VSCode

## Extensões Básicas
```php
PHP Intelephense (completa namespace. Seleciona classe com 2clicks e Ctrl+Barra, adiciona para topo do arquivo)
PHP Extenson pack - já traz o PHP Intellisense e o PHP Debug
PHP Namespace Resolver - Outra forma de complatar o namespace. Clicar em cima do nome da classe e Import Class ou teclar Ctrl+Alt+i
PHP DocBlocker - autocompleta após /**
Getter Setter and Constructor Generator for PHP - F1 - PHP Insert setter and getter
Markdown All in One - preview: Ctrl+Shift+V ou no explorer com botão direito e Open Preview
vscode-icons
Laravel Blade Spacer (Ao digitar { ele vai completando)
Laravel Blade Snippets (Exemplo: Após digitar 'if' ele mostra opções para blade: b:if e b:if-else
Laravel Blade - completa o que as duas anteriores não completam, como @for
Laravel Snippets
Laravel Extra Intellisense
Laravel Intellisense
Snippet Creator
Auto Close Tag
Color Pick
Tabnine
auto rename tag
GitLens — Git supercharged - facilita o uso do git no VSCode
Rest Client - API (mostrar url em outra janela, F1 - REST Client - Send request
Settings Sync - sincronizar com seus Gist. Pode guardar um backup das configurações
Live Share
HTML Preview - rodar somente HTML e numa janela do VSCode. Arquivo salvo e Ctrl+Shift+V
Live Share Audio - compartilhar código com áudio
```
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

