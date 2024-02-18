<h1 align="center">Tr Store</h1>
<p align="center">Sistema de gerenciamento de vendas</p>

<div>
    <h2>Proposta</h2>
    <p>O Tr Store é um projeto de um desafio técnico com o objetivo fazer sistema para cadastro de vendedores e suas vendas, utlizando tecnologias como PHP e MySQL, exigindo um CRUD (Create, Read, Update e Delete) das informações , e também um relatório diário enviado por email sobre as vendas dos vendedores</p>
</div>
<div>
    <h2>Requisitos</h2>
    <ul>
        <li>Cadastro de vendedores;</li>
        <li>Listagem de vendedores;</li>
        <li>Atualização de informações dos vendedores;</li>
        <li>Exclusão de vendedores;</li>
        <li>Cadastro de venda;</li>
        <li>Listagem de vendas;</li>
        <li>Cálculo de comissão de 8.5% sobre cada venda;</li>
        <li>Rotina de envio de relatórios diários.</li>
    </ul>
</div>

<div>
    <h2>Tecnologias</h2>
    <p>Utilizei as seguintes tecnologias para construção do projeto:</p>
    <ul>
        <li><a href="https://www.php.net/">[PHP 8.2.12]</a></li>
        <li><a href="https://laravel.com/">[Laravel]</a></li>
        <li><a href="https://getcomposer.org">[Composer]</a></li>
        <li><a href="https://www.mysql.com/">[Mysql]</a></li>
    </ul>
</div>
<div id="executando_projeto">
    <h2>Executando o projeto</h2>
    <h3>Pré-requisitos</h3>
    <a href="https://www.php.net/">[PHP 8.2.12]</a>, 
    <a href="https://getcomposer.org">[Composer]</a>, 
    <a href="https://www.mysql.com/">[Mysql]</a>.</p>
    <h3>Ambiente</h3>
    <p>Crie um arquivo .env com os seguintes nomes:<br>
    (Altere banco e envio de e-mail)</p>
    
```bash
APP_NAME=trStore
APP_ENV=local
APP_KEY=base64:FYvJ2tNV0q0GxsqOE7t547Yb1xihITBAKAEIdUSbwe8=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=Crud
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

<h3>Rodar a aplicação</h3>

```bash
# Clone este repositório
$ git clone <https://github.com/Pedrinvits/TrStore.git>

# Acesse a pasta do projeto
$ cd trStore

# Instale as dependências
$ composer install

# Em seu banco de dados crie a seguinte tabela
create database Crud;

# Caso não tenha executado as querys do arquivo querys.sql, execute as migrations
$ php artisan migrate:fresh

# Execute a aplicação
$ php artisan serve

# O servidor iniciará na porta:8000 - acesse <http://localhost:8000>
```
</div>
