## Stock Control - App de controle de estoque

- Requisitos: Composer, MySQL 8, PHP 7, Laravel 8, jQuery 3.2+

### Passos para rodar a aplicação:

- Crie um diretório local para receber o projeto

- Dentro do novo diretório, faça o clone do projeto:<br>
  SSH: $ git clone git@github.com:Johnnbass/stock_control.git<br>
  HTTPS: $ git clone https://github.com/Johnnbass/stock_control.git

- Instalar as extensões:<br>
  $ sudo apt install php7.4-mbstring php7.4-dom -y

### A partir daqui, todos os comando devem ser rodados a partir da raiz do projeto

- Instale as dependências do projeto:<br>
  $ composer install<br>
  $ npm install

- A partir da sua conexão de banco de dados local, crie a database "stock_control" e configure em conjunto com as credenciais de conexão com o banco conforme .env.example

- Gere a chave da aplicação:<br>
  $ php artisan key:generate

- Rode as migrations do projeto:<br>
  $ php artisan migrate:refresh

- Gere a chave secreta do JWT: (deverá aparecer dentro do .env)<br>
  $ php artisan jwt secret

- Rode o servidor embutido:<br>
  $ php artisan serve
