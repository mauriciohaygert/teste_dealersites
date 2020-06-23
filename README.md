# Teste Automtec - Dealer Sites - Desenvolvedor Full Stack

## Pré-requisitos:

git, compose, docker, docker-compose

## Instruções:

### Faça o download do projeto
- ``git clone https://github.com/mauriciohaygert/teste_dealersites.git``
### Entre na pasta do projeto
- ``cd teste_dealersites``
### Instalar as dependências
- ``composer install``
### Subir o servidor de aplicação
- ``docker-compose up -d``
### Gerar o BD dentro do servidor
- ``docker exec app php artisan key:generate``
- ``docker exec app php artisan migrate``
- ``docker exec app php artisan db:seed``

### Para acessar o site digite [localhost](http://localhost) no seu navegador
