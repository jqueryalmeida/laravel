Executar pelo terminal/prompt

Acessar o diretório do aplicativo e após executar algumas tarefas
Executar
.code

Que a pasta do aplicativo será aberta no VSCode

No linux também podemos abrir uma pasta no VSCode estando no gerenciador de arquivos
Selecionar a pasta e Abrir no Terminal

Busca em todos os arquivos de uma pasta/projeto
- Edit - Find in files
- Ctrl+Shift+F
- Ícone da Lupa 

Procurar e Sobrescrever em todos os arquivos de uma pasta/projeto:
- Edit - Replace in files
- Ctrl+Shift+H
- Ícone da Lupa 

23 Extensões do VS Code para 2020
https://www.youtube.com/watch?v=tmgpF7Bn3_E


Formatando documentos: HTML, CSS e JS

PHP

Selecionar todo o documento ou apenas o trecho que deseja formatar e executar:
F1
Format Document

Ele realiza as indentações devidamente


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

Executar pelo terminal/prompt

Acessar o diretório do aplicativo e após executar algumas tarefas
Executar
.code

Que a pasta do aplicativo será aberta no VSCode

No linux também podemos abrir uma pasta no VSCode estando no gerenciador de arquivos
Selecionar a pasta e Abrir no Terminal

Busca em todos os arquivos de uma pasta/projeto
- Edit - Find in files
- Ctrl+Shift+F
- Ícone da Lupa 

Procurar e Sobrescrever em todos os arquivos de uma pasta/projeto:
- Edit - Replace in files
- Ctrl+Shift+H
- Ícone da Lupa 

23 Extensões do VS Code para 2020
https://www.youtube.com/watch?v=tmgpF7Bn3_E
