# Api-laravel-angular
Api/Sistema em Laravel + JWT + Angular + AdminLTE (banco de dados Mysql) & Babylonjs


## Instalação: 
o projeto conta com o Makefile
com a linha de comando na raiz do projeto execute o comando: <b>make conf</b>
esse comando instalará todos as ferramentas basicas para o projeto como mysql, php, extençoes, etc
após isso separadamente em cada projeto faça as etapas abaixo. 

dentro do projeto api(laravel) no Linux. Execute:
  composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
  php artisan migrate:refresh --seed <!-- (Adicionará um usuario Administrador <b>Email: admin@gmail.com senha:secret</b>)-->


dentro do projeto admin(angular) no Linux. Execute:
  curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -
	sudo apt-get install nodejs
	npm install -g @angular/cli

Se quiser você pode seguir sem o auxilio desse tuturial ou do makeconf, se for windows seu sistema operacional, você terá que configurar tudo manualmente.
OBS: Importante Lembrar que é necessário configurar corretamente o banco de dados no .env do projeto laravel.

## Sobre
Api em laravel, com autenticação e autorização com JWT, dados do JWT são persistidos no localestorage para serem usadas
no cabeçalho das requisições da aplicação em angular.
O projeto todo não esta completamente perfeito, falta alguns validadores e ajustes.


Basicamente, o administrador faz login para poder adicionar clientes e produtos.

<br>Login admin

<img src="https://cdn.glitch.com/6004c593-ca99-4a49-9681-447f3fa67a49%2F9-10-21%2001-38-30.png?v=1571632730962"> 
Adicionar cliente
<img src="https://cdn.glitch.com/6004c593-ca99-4a49-9681-447f3fa67a49%2Fpng3.png?v=1571631920000">
Após adiciona-los os mesmo clientes entram na aplicação web laravel que também é Api, para fazer pedidos.
<br>Login do cliente
<img src="https://cdn.glitch.com/6004c593-ca99-4a49-9681-447f3fa67a49%2Floguenow.png?v=1571632056520">

No momento de mostrar os produtos é apresentado, uma cadeira 3d como exemplo de produto.

<img src="https://cdn.glitch.com/6004c593-ca99-4a49-9681-447f3fa67a49%2Fcadeira.png?v=1571632120220">
