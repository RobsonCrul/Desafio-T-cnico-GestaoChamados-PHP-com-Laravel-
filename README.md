Markdown

# Sistema de Gestão de Chamados

Este é um projeto desenvolvido em Laravel para gerenciar e acompanhar chamados, com funcionalidades como criação de tickets, dashboard de métricas e atendimento de ocorrências.

## Tecnologias Utilizadas
Este projeto foi construído utilizando as seguintes tecnologias:

## Backend
PHP: Linguagem de programação do lado do servidor.

Laravel: Framework MVC para a criação da API e manipulação do banco de dados.

## Frontend
Bootstrap utilizado no PHP e Laravel
Bootstrap: Framework CSS para o design responsivo, utilizado para a criação de componentes de interface como botões, cards e tabelas, garantindo uma aparência moderna e adaptável a diferentes tamanhos de tela.

## Requisitos do Sistema

Certifique-se de que os seguintes softwares estão instalados em sua máquina:

* **PHP:** Versão 8.1 ou superior
* **Composer:** Gerenciador de dependências do PHP
* **MySQL:** Servidor de banco de dados
* **Git:** Para clonar o repositório

## Instalação e Configuração

Siga os passos abaixo para instalar e executar o projeto em seu ambiente local.

### 1. Clonar o Repositório

Abra o terminal e clone o projeto do repositório Git:

    bash

    git clone <URL_DO_SEU_REPOSITORIO>
    cd <NOME_DA_PASTA_DO_PROJETO>


## 2. Instalar as Dependências
Dentro da pasta do projeto, instale as dependências do Laravel com o Composer:


    Bash
    composer install

    
## 3. Configurar o Ambiente
Copie o arquivo de exemplo de ambiente e gere uma chave de segurança para a aplicação:


    Bash

    cp .env.example .env
    php artisan key:generate

    
## 4. Configurar o Banco de Dados
Abra o arquivo .env e configure as credenciais do seu banco de dados MySQL:


    Ini, TOML

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=seu_banco_de_dados
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha

    
## 5. Executar as Migrações e Seeds
Execute as migrações para criar as tabelas no banco de dados e os seeds para popular as tabelas iniciais (categorias e situacoes):

    Bash

    php artisan migrate:fresh --seed
    Execução da Aplicação

    
## 1. Iniciar o Servidor de Desenvolvimento
Inicie o servidor local do Laravel com o seguinte comando:

    Bash

    php artisan serve

    
## 2. Acessar a Aplicação
Abra seu navegador e acesse a URL:

    [http://127.0.0.1:8000]
## 3. Fluxo de Utilização
Você será redirecionado para o Dashboard, onde poderá ver as métricas.

Clique em "Novo Chamado" para abrir um formulário de criação.

Preencha os campos e selecione uma categoria. O status será automaticamente definido como "Novo".

Clique em "Listar Chamados" para ver o chamado que você acabou de criar.

Clique em "Editar" ao lado de um chamado para alterá-lo.

Na página de edição, você pode mudar o status para "Pendente" ou "Resolvido".

Ao selecionar "Resolvido" e salvar, o campo "Data de Solução" será preenchido automaticamente no banco de dados.
