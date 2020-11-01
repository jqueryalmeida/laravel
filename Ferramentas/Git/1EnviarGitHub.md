# Enviar projeto para o GitHub com Fit

Acessar o diretóriio do projeto. As duas primeiras linhas são obrigatórias apenas na primeira vez
```php
git config --global user.name "Ribamar FS"
git config --global user.email "ribafs@gmail.com"
git init
git add .
git commit -m "Primeiro Commit"
git remote add origin git@github.com:ribafs/backup-github.git
git push -f origin master
```
Para enviar novamente após alterações

remover a pasta .git

e repetir os passos acima

O projeto está agora hospedado no GitHub e pronto para ser abrigado pelo Packagist.


## Criar uma conta no GitHub para o SSH

Em seu desktop Linux execute:
```php
cd
ssh-keygen -t rsa -b 4096 -C "ribafs@gmail.com"
Enter
Enter
Enter

eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_rsa
```
Checando a senha

ls -al ~/.ssh

Capturando o hash da senha
```php
cat ~/.ssh/id_rsa.pub
```

Copie a chave mostrada desde ssh-rsa ... até seu e-mail, incluso.

Vá ate'o GitHub, faça login e clique acima em sua foto e Settings

SSH and GPG keys

New SSH key

Entre com um Title (Residência)

E cole na caixa Key abaixo

E clique em Add SSH key


