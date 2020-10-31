## Dicas sobre o Composer

É um gerenciador de dependências para PHP, com bons recursos para instalar, atualizar e gerenciar módulos em PHP. Ele checa quais as dependências de um pacote e as instala, usando as versões indicadas.

## Site oficial 
https://getcomposer.org

## Documentação
https://getcomposer.org/doc/

## Pré-requisitos para sua instalação:
- PHP 5.3.2 ou superior
- curl
- php-cli
- php-mbstring
- git
- unzip

## Para Windows
https://getcomposer.org/doc/00-intro.md#using-the-installer

## Para Linux
sudo apt install composer

## Atualizar para a versão 2

sudo composer self-update --2

##Testando

composer list
```php
Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Alguns commands:
  archive              Creates an archive of this composer package.
  clear-cache          [clearcache] Clears composer's internal package cache.
  config               Sets config options.
  create-project       Creates new project from a package into given directory.
  depends              [why] Shows which packages cause the given package to be installed.
  dump-autoload        [dumpautoload] Dumps the autoloader.
  help                 Displays help for a command
  init                 Creates a basic composer.json file in current directory.
  install              Installs the project dependencies from the composer.lock file if present, or falls back on the composer.json.
  remove               Removes a package from the require or require-dev.
  require              Adds required packages to your composer.json and installs them.
  run-script           Runs the scripts defined in composer.json.
  search               Searches for packages.
  show                 [info] Shows information about packages.
  update               [upgrade] Upgrades your dependencies to the latest version according to composer.json, and updates the composer.lock file.
  validate             Validates a composer.json and composer.lock.
```
## Instalar dependências mas não as em desenvolvimento
composer install --no-dev

## Retornar informações sobre pacote instalado
composer show ribafs/crud-generator-ac

## Versão
composer show 'ribafs/crud-generator-acl' | grep 'versions'

## O Packagist.org é o principal repositório de pacotes para o Composer - https://packagist.org/

# Pesquisar por pacotes cadastrados no repositório
composer search nome_pacote

## Bloqueando o uso do update:
composer update --lock

## Após cada alteração no composer.json executar
composer dumpautoload

## Instalando um pacote em um projeto

cd projeto
composer require ribafs/mini-mvc

## Atualização de pacote instalado para uma nova versão lançada
O mesmo comando de instalação
composer require ribafs/mini-mvc

Ele cria a pasta vendor no diretório atual com as dependências dentro e toma outras providências.

## Ajuda
composer help require

## Arquivos importantes:
```php
composer.json
composer.lock
autoload.php
```
composer.json

https://getcomposer.org/doc/04-schema.md

## Criando um pacote com o composer

composer init
```php
Opções:
    --name: Name of the package.
    --description: Description of the package.
    --author: Autor no formato: Nome <autor@email.com>
    --type: Type of package.
    --homepage: Homepage of the package.
    --require: Pacote para o require com uma versão. No formato vendor/pacote:1.0.0.
    --require-dev: Requisitos de desenvolvimento. Vide --require.
    --stability (-s): Valor para o campo minimum-stability.
    --license (-l): Licença do package.
    --repository: Provide one (or more) custom repositories. They will be stored in the generated composer.json, and used for auto-completion when prompting for the list of requires. Every repository can be either an HTTP URL pointing to a composer repository or a JSON string which similar to what the repositories key accepts.
```

## Outros comandos:

composer run-script [--dev] [--no-dev] script

## Publicando projeto para ser instalado com composer:

- Hospedar no GitHub ou similar
- Publicar no Packagist e configurar a atualização automática
- Instalar com o composer

## Dicas:

- Adicione composer.lock no .gitignore em libraries
- Ordene os pacotes no require ou require-dev pelo nome
- Validar o composer.json:
    composer validate --no-check-all --strict
- Especificando duas versões do PHP:
"require": {
    "php": "7.1.* || 7.2.*"
},
- Configurar autoload-dev para testes:
"autoload": {
    "psr-4": {
        "Acme\\": "src/"
    }
},
"autoload-dev": {
    "psr-4": {
        "Acme\\": "tests/"
    }
},

## Dicas do composer.json
```php
{
    "name": "Nome do projeto",
    "description": "Breve descrição do que a aplicação se propoe a fazer",
    "authors": [
        {
            "name": "Seu nome",
            "email": "seu-email@seu-dominio.com",
            "homepage": "https://github.com/cakephp/acl/graphs/contributors"
        }
    ],
    "require": {
        "php": ">=5.2.8"
    }

    "homepage": "http://cakephp.org",

    "support": {
        "issues": "https://github.com/cakephp/acl/issues",
        "forum": "http://stackoverflow.com/tags/cakephp",
        "irc": "irc://irc.freenode.org/cakephp",
        "source": "https://github.com/cakephp/acl"

    },

    "suggest": {
        "twbs/bootstrap": "Twitter Bootstrap front-end framework, for styles and layout.",
        "friendsofcake/search": "Filtering for index templates to find things easier.",
        "friendsofcake/crud": "Production ready scaffolding for controllers. Don't even bother writing code!"
    },
}
```
suggest - sugestão de plugins semelhantes e/ou úteis

Usando os softwares instalados pelo composer. Criar um arquivo e digitar nas primeiras linhas:
```php
<?php
require "vendor/autoload.php";

// aqui pode executar o software
```

## Desinstalar plugin

composer remove ribafs/mini-mvc --update-with-dependencies

## Corrigir erros do composer

composer config --global repositories.packagist.allow_ssl_downgrade false

ou

Adicionar ao composer.json
```php
    "repositories": [
        {
            "type": "composer",
            "url": "https://packagist.org"
        },
        { "packagist": false }
    ],
```
composer update

composer clear-cache


## Dicas extras

## Instalar o último release estável
composer require ribafs/admin-br

## Instalar um determinado release
composer require ribafs/admin-br:1.30

## Instalar a versão atual em desenvolvimento
composer require ribafs/admin-br:dev-master

```php
{
    "name": "picahielos/bookstore",
    "description": "Manages an online bookstore.",
    "minimum-stability": "stable",
    "license": "Apache-2.0",
    "type": "project",
    "authors": [
        {
            "name": "Antonio Lopez",
            "email": "antonio.lopez.zapata@gmail.com"
        }
    ],
    // ...
}
```

## Comandos básicos:
- init
- require
- remove
- update
- install
- dump-autoload

## Instalar sem dependências
composer install --no-dev

## Minimum Stability Settings

Composer accepts these flags as minimum-stability settings. The default setting for minimum-stability if not provided is assumed to be stable, but you could define any of the flags down the hierarchy.

– stable (most stable)
– RC
– beta
– alpha
– dev (least stable)

## Exemplo de composer.json
```php
composer.json file

{
    "name": "vendor-name/project-name",
    "description": "This is a very cool package!",
    "version": "0.3.0",
    "type": "library",
    "keywords": ["logging", "cool", "awesome"],
    "homepage": "https://jolicode.com",
    "time": "2012-12-21",
    "license": "MIT",
    "authors": [
        {
            "name": "Xavier Lacot",
            "email": "xlacot@jolicode.com",
            "homepage": "http://www.lacot.org",
            "role": "Developer"
        },
        {
            "name": "Benjamin Clay",
            "email": "bclay@jolicode.com",
            "homepage": "https://github.com/ternel",
            "role": "Developer"
        }
    ],
    "support": {
        "email": "support@exemple.org",
        "issues": "https://github.com/janephp/janephp/issues",
        "forum": "http://www.my-forum.com/",
        "wiki": "http://www.my-wiki.com/",
        "irc": "irc://irc.freenode.org/composer",
        "source": "https://github.com/jolicode/jane",
        "docs": "https://github.com/jolicode/jane/wiki",
        "chat": "https://symfony-devs.slack.com/"
    },
    "require": {
        "monolog/monolog": "1.0.*",
        "joli/ternel": "@dev",
        "joli/ternel-bundle": "@stable",
        "joli/semver": "^2.0",
        "joli/package": ">=1.0 <1.1",
        "acme/foo": "dev-master#2eb0c097"
    },
    "require-dev": {
        "debug/dev-only": "1.0.*"
    },
    "conflict": {
        "another-vendor/conflict": "1.0.*"
    },
    "replace": {
        "debug/dev-only": "1.0.*"
    },
    "provide": {
        "debug/dev-only": "1.0.*"
    },
    "suggest": {
        "jolicode/gif-exception-bundle": "For fun!"
    },
    "autoload": {
        "psr-4": {
            "Monolog\\": "src/",
            "Vendor\\Namespace\\": ""
        },
        "psr-0": {
            "Monolog": "src/",
            "Vendor\\Namespace": ["src/", "lib/"],
            "Pear_Style": "src/",
            "": "src/"
        },
        "classmap": ["src/", "lib/", "Something.php"],
        "files": ["src/MyLibrary/functions.php"]
    },
    "autoload-dev": {
        "psr-0": {
            "MyPackage\\Tests": "test/"
        }
    },
    "target-dir": "Symfony/Component/Yaml",
    "minimum-stability": "stable",
    "repositories": [
        {
            "type": "composer",
            "url": "http://packages.example.com"
        },
        {
            "type": "vcs",
            "url": "https://github.com/Seldaek/monolog"
        },
        {
            "type": "pear",
            "url": "http://pear2.php.net"
        },
        {
            "type": "package",
            "package": {
              "name": "smarty/smarty",
              "version": "3.1.7",
              "dist": {
                "url": "http://www.smarty.net/Smarty-3.1.7.zip",
                "type": "zip"
              },
              "source": {
                "url": "http://smarty-php.googlecode.com/svn/",
                "type": "svn",
                "reference": "tags/Smarty_3_1_7/distribution/"
              }
            }
        },
        {
            "type": "artifact",
            "url": "path/to/directory/with/zips/"
        },
        {
            "type": "path",
            "url": "../../packages/my-package"
        },
        {
            "packagist.org": false
        }
    ],
    "config": {
        "process-timeout": 300,
        "use-include-path": false,
        "preferred-install": "auto",
        "store-auths": "prompt",
        "github-protocols": ["git", "https", "http"],
        "github-oauth": {"github.com": "oauthtoken"},
        "gitlab-oauth": {"gitlab.com": "oauthtoken"},
        "github-domains": ["enterprise-github.me.com"],
        "gitlab-domains": ["enterprise-gitlab.me.com"],
        "github-expose-hostname": true,
        "disable-tls": false,
        "cafile": "/var/certif.ca",
        "capath": "/var/",
        "http-basic": {"me.io":{"username":"foo","password":"bar"},
        "platform": {"php": "5.4", "ext-something": "4.0"},
        "vendor-dir": "vendor",
        "bin-dir": "bin",
        "data-dir": "/home/ternel/here",
        "cache-dir": "$home/cache",
        "cache-files-dir": "$cache-dir/files",
        "cache-repo-dir": "$cache-dir/repo",
        "cache-vcs-dir": "$cache-dir/vcs",
        "cache-files-ttl": 15552000,
        "cache-files-maxsize": "300MiB",
        "bin-compat": "auto",
        "prepend-autoloader": true,
        "autoloader-suffix": "pony",
        "optimize-autoloader": false,
        "sort-packages": false,
        "classmap-authoritative": false,
        "notify-on-install": true,
        "discard-changes": false,
        "archive-format": "tar",
        "archive-dir": "."
    },
    "archive": {
        "exclude": ["/foo/bar", "baz", "/*.test", "!/foo/bar/baz"]
    },
    "prefer-stable": true,
    "scripts": {
        "pre-install-cmd": "MyVendor\\MyClass::doSomething",
        "post-install-cmd": [
            "MyVendor\\MyClass::warmCache",
            "phpunit -c app/"
        ],
        "pre-update-cmd": "MyVendor\\MyClass::doSomething",
        "post-update-cmd": "MyVendor\\MyClass::doSomething",
        "pre-status-cmd": "MyVendor\\MyClass::doSomething",
        "post-status-cmd": "MyVendor\\MyClass::doSomething",
        "pre-package-install": "MyVendor\\MyClass::doSomething",
        "post-package-install": [
            "MyVendor\\MyClass::postPackageInstall"
        ],
        "pre-package-update": "MyVendor\\MyClass::doSomething",
        "post-package-update": "MyVendor\\MyClass::doSomething",
        "pre-package-uninstall": "MyVendor\\MyClass::doSomething",
        "post-package-uninstall": "MyVendor\\MyClass::doSomething",
        "pre-autoload-dump": "MyVendor\\MyClass::doSomething",
        "post-autoload-dump": "MyVendor\\MyClass::doSomething",
        "post-root-package-install": "MyVendor\\MyClass::doStuff",
        "post-create-project-cmd": "MyVendor\\MyClass::doThis",
        "pre-archive-cmd": "MyVendor\\MyClass::doSomething",
        "post-archive-cmd": "MyVendor\\MyClass::doSomething",
    },
    "extra": { "key": "value" },
    "bin": ["./bin/toto"]
}
```


