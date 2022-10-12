# Projeto Teste Ecorban

Para testar o projeto, seguir os seguintes passos:

## Download do Projeto

```bash
git clone git@github.com:Quessada/ecorban.git
```

Entre no diretório do projeto

```bash
cd ecorban/
```

```bash
cp .env.example .env
```

```bash
composer install
```

```bash
npm install && npm run dev
```

```bash
php artisan key:generate
```

Abra o arquivo .env e altere o DB_DATABASE para DB_DATABASE=ecorban

Crie um banco de dados no `MySQL/phpmyadmin` com o nome de `ecorban` e a `collation uft8mb4_unicode_ci`

Execute o comando para popular o banco de dados com o usuário administrador padrão:

```bash
php artisan migrate
```

Criar link simbólico para armazenamento das imagens

```bash
php artisan storage:link
```

