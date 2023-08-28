# Catalogo Filmes

Projeto CRUD em um catalogo de filmes.
Feito em PHP 7.1.32 com CakePHP 2 originalmente em um servidor XAMPP apache

Passos:

1. Baixar os arquivos e mover para o dirétorio htdocs no XAMPP

2. Para popular o banco de dados, acessar a pasta /app no terminal e utilizar o comando Console/cake schema create

3. IMPORTANTE: A versão do framework não permite o migrate criar foreign keys, após a execução do schema create, rodar o script que está localizado em app/Config/Schema/schemaFK-sql no banco de dados.

NOTAS:

O projeto foi desenvolvido em um servidor XAMPP, utilizando o banco de dados phpmyadmin, padrão do servidor.

as informações de conexão estão no arquivo config/database.php

atualmente, apenas o usuário root está fornecido, sem senha (padrão do XAMPP).