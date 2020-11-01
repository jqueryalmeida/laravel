# Usando o wget para baixar um site inteiro e converter em HTML, CSS e JS

wget \
     --recursive \
     --no-clobber \
     --page-requisites \
     --html-extension \
     --convert-links \
     --restrict-file-names=windows \
     --no-parent \
         $1

# Exemplo:
# sh wget.sh https://laravel.com/docs/8.x

