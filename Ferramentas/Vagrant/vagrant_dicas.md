# Dicas sobre o Vagrant

## Ao criar/importar box, se houver problema com SSL/certificado, adicione ao Vagrantfile
```php
config.vm.box_download_insecure = true
```

## Exportando uma box

Antes atualize a Box
```php
cd /vagrant/boxnaome
vagrant box update
```
### Instalar Guest na Box
```php
vagrant plugin install vagrant-vbguest
```
Somente nos bsds, ao final do Vagrantfile adicione em torno da linha 50 a linha abaixo:
```php
  config.vm.synced_folder ".", "/vagrant", disabled: true
```
Execute novamente
```php
vagrant up --provision
```
Caso não funcione adicione ao final do arquivo, antes de end:
```php
  config.vm.network "private_network", type: "dhcp"
  config.vm.guest = :freebsd
  config.ssh.shell = "sh"

  config.vm.synced_folder ".", "/vagrant", type: "nfs"
```
Instalar
```php
sudo apt-get install nfs-common nfs-kernel-server
```
Exportando
```php
cd vagrant/nomebox
vagrant halt
vagrant package --output nome.box
```
Script
```php
sudo nano /usr/local/bin/vagexp

vagrant halt
vagrant package --output $1.box

sudo chmod +x /usr/local/bin/vagexp
```
Chamando
```php
vagexp nomebox
```
Uma box com erro repetidamente
```php
default: Warning: Authentication failure. Retrying...
```
Mas ao final aceitava
```php
vagrant ssh
```
Acessar e entrar com a senha: vagrant

cd .ssh

Caso não exista o diretório criar:
```php
mkdir -p /home/vagrant/.ssh
```
Executar
```php
wget --no-check-certificate https://raw.github.com/mitchellh/vagrant/master/keys/vagrant.pub -O /home/vagrant/.ssh/authorized_keys  
chmod 0700 /home/vagrant/.ssh
chmod 0600 /home/vagrant/.ssh/authorized_keys
chown -R vagrant /home/vagrant/.ssh
exit

vagrant reload

vagrant ssh
```

