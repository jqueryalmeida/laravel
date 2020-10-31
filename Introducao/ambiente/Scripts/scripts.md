# Relação de scripts para agilizar as tarefas

Para todos os scripts que não requerem parâmetro eu uso apenas um alias

Para os que precisam de parâmetro uso script com $1, $2, ...

ubin - criar um script no nano. Exemplo: sudo nano /usr/local/bin/pa
```bash
sudo nano /usr/local/bin/ubin
sudo nano /usr/local/bin/$1
sudo chmod +x /usr/local/bin/ubin
```
umod - Tornar executável um script do /usr/local/bin
```bash
sudo nano /usr/local/bin/umod
sudo chmod +x /usr/local/bin/$1
sudo chmod +x /usr/local/bin/umod
```
# Usando o ubin para criar o umod
ubin umod

#Usando o umod para setar o chmod +x no ubin
umod ubin

Se não fossem estes scripts precisariamos fazer tudo isso acima

l7 - Instalação do laravel 7 numa pasta especificada
```bash
ubin l7
composer create-project laravel/laravel="7.*" $1
umod l7
# Exemplo: l7 clientes (instalará o laravel 7 na pasta clientes, já com autenticação)
```

l8 - Instalação do laravel 8 numa pasta especificada. Caso queira pode mudar para inertia
```bash
ubin l8
laravel new $1 --jet --stack=livewire
umod l8
# Exemplo: l8 clientes (instalará o laravel 8 na pasta clientes, já com autenticação)
```
paclear - Limpar uma áea do laravel. Exemplos: php artisan route:clear, php artisan view:clear
```bash
ubin paclear
php artisan $1:clear
umod paclear
# Exemplos: paclear view, paclear route
```
pa - Executar o artisan com umas das opções com make:
```bash
ubin pa
php artisan make:$1 $3
umod pa
# Exemplos: pa model, pa ClientController, pa migration create_clients_table
```
# Como uso muito com meus pacotes
cr - Instalar um pacote com o composer. Como estou usando com muita frequência pacotes criados por mim, fiz este
```bash
ubin cr
composer require ribafs/$1
umod cr
```
crr - Remover um pacote com o composer, criado pelo ribafs/
```bash
ubin crr
composer remove ribafs/$1
umod crr
```
gs - git sincronização do desktop com o remoto
```bash
ubin gs
git add .
git commit -m "$1"
git pull
git push
umod gs
```
buscastr - Efetuar buscas por srings em arquivos texto
```bash
# Procurar por uma string em todos os arquivos de um diretório e Retornar os nomes de todos os arquivos que contém
# $1 - pasta
# $2 - string
find $1 -type f -exec grep -l "$2" {} +
umod buscastr
# Exemplo: buscastr "String a buscar" /home/ribafs/arquivo.php
```

