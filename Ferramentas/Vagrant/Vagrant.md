# Dicas sobre o Vagrant

Vagrant é uma ferramenta que cria ambientes de desenvolvimento de forma simples. Ele cria boxes, que são máquinas virtuais com sistemas operacionais pré-instalados, como linux, windows, freebsd, etc. Ele trabalha com o VirtualBox e com o VMWare.

Muito bom para ter uma box com a mesma distribuição, versão pacotes e versões doso pacores do servidor. Assim evitando problemas por conta da diferença de ambientes.

## Download

https://www.vagrantup.com/downloads

Antes instale o VirtualBox juntamente com suas extensões.

## Download de boxes

https://app.vagrantup.com/boxes/search

## Exportar a box atual como ubuntu20.04-lamp.box:

vagrant package -o ubuntu20.04-lamp.box


## Criação de box para Vagrant com Ubuntu 18.04

Box criada de https://app.vagrantup.com/ubuntu/boxes/bionic64

Na minha máquina criei uma pasta para as boxes do Vagrant em:

/home/ribafs/vagrant

Então criei uma pasta para esta nova box em:
```php
/home/ribafs/vagrant/ub1804min

vagrant init ubuntu/bionic64
vagrant up
vagrant ssh
```
Inicialmente a box exportada ficou com

518 MB após exportada

Executar:

reboot

## Criação de uma box com Vagrant

https://github.com/ribafs/cake-vagrant

Acessar a box com:
```php
cd /home/ribafs/vagrant/ub1804min
Mudar o nome do hostname

vagrant up
vagrant ssh
sudo hostname ub18
exit
vagrant ssh
```
E executando:
```php
vagrant up
vagrant ssh
cd /vagrant
```
Após qualquer alteração do Vagrantfile devemos executar:

vagrant up --provision


Dicas sobre o Vagrant

Quando você começa a trabalhar com programação, é a principio normal que sua máquina fique um pouco bagunçada. Bibliotecas pra cá, interpretadores pra lá, compiladores ali, e assim vai. Depois de algum tempo, você até se encontra de forma que consegue usar tudo o que você mesmo colocou e dessa forma consegue fazer o que quer, ou seja, programar. O problema é quando você precisa efetivamente replicar este mesmo ambiente em outras máquinas, como a máquina dos seus colegas de trabalho, por exemplo, ou quando você por algum motivo perde todos os dados da máquina (como quando o HD resolve pifar, o que costuma acontecer com certa frequência, pelo que vejo).

O Vagrant é, em poucas palavras, uma ferramenta para criar e distribuir ambientes de desenvolvimento. Com esse propósito, sua real utilidade se mostra mais clara: Facilitar o trabalho do desenvolvedor no teste de suas aplicações, permitindo simular um ambiente mais fiel ao que será usado efetivamente em produção, além de permitir o compartilhamento deste ambiente com outros desenvolvedores. Tudo isso é feito com o uso de uma máquina virtual, que isola todo um hardware virtual a partir da sua máquina física real, além de permitir uso de sistema operacional e softwares próprios, por exemplo.

Um programador PHP, por exemplo, pode configurar a máquina para instalar o PHP, Apache e MySQL da mesma forma que este o faria em um servidor real. E, ainda: usando o mesmo sistema operacional do servidor real. Mas...qual a diferença entre usar o Virtualbox diretamente e o Vagrant, nesse caso? Bom, usando o Vagrant, o desenvolvedor consegue facilmente fazer configurações como redirecionamento de portas (importante para um programador que trabalha com web), sincronizar pastas entre a sua máquina física real e a máquina virtual de desenvolvimento e provisionar a máquina virtual automaticamente de acordo com a sua vontade. Tudo isso usando apenas alguns poucos arquivos de configuração e sem precisar repetir procedimentos frequentemente. No fim, o Vagrant se destaca pela facilidade de distribuição e manutenção das máquinas virtuais, garantindo assim um ambiente de desenvolvimento eficiente e fácil de replicar.

Crédito - https://fjorgemota.com/vagrant-maquinas-virtuais-automatizadas-para-desenvolvimento/

Dicas sobre o vagrant

Instalar o VirtualBox e o Extension Pack

https://www.virtualbox.org/wiki/Downloads

Instalar o git

    Linux - sudo apt install git
    Windows - https://git-scm.com/download/win

Instalar o Vagrant

http://vagrantup.com

Procurando por boxes na cloud:

https://app.vagrantup.com/boxes/search

Crie uma pasta para as boxes

mkdir /home/ribafs/vagrant

Criar uma pasta para a box cake-vagrant

mkdir /home/ribafs/vagrant/cake-vagrant

Instalar a box cake-vagrant:
```php
cd /home/ribafs/vagrant
mkdir cake-vagrant
cd cake-vagrant
vagrant init ribafs/cake-vagrant --box-version 1.3
vagrant up

vagrant ssh-config
```
Adicionar para o Vagrantfile, caso não conecte do host para a box via ssh:
```php
config.vm.provision :shell, :inline => "sudo sed -i 's/PasswordAuthentication no/PasswordAuthentication yes/g' /etc/ssh/sshd_config; sudo systemctl restart sshd;", run: "always"
```
Dicas encontrada em https://github.com/hashicorp/vagrant/issues/10280#issuecomment-437276971

Após editr o Vagrantfile execute:
```php
vagrant reload
ssh vagrant@192.168.30.10
ou
ssh -p 2222@127.0.0.1
passwod: vagrant
```
Também podemos acessar pelo ambiente gráfico usando o nemo/nautilus no Linux ou o WinSCP no Windows
```php
Servidor - 127.0.0.1
Porta - 2222
Pasta - /vagrant ou /var/www/html
Usuário - vagrant
Senha - vagrant
```
Para corrigir problemas Instalar vghuest
```php
vagrant plugin install vagrant-vbguest

cd /vagrant/boxname
vagrant box update
```
Adicionando nova rede

Editar o Vagrantfile e descomentar e ajustar a linha:
```php
config.vm.network "private_network", ip: "192.168.33.10"
```
Com isso podemos acessar a box do host com:

http://192.168.33.10
```php
ssh vagrant@192.168.33.10

scp arquivo.zip vagrant@192.168.33.10:/tmp
```
Mais detalhes em:

https://ribafs.github.io/cake-vagrant/

