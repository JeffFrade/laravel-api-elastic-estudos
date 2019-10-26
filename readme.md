# Temperature API

API de estudos para armazenar no Elasticsearch dados vindo de um sensor de temperatura ligado ao Arduino Uno R3.

Deploy: `Heroku`

## Executar a API:

Após clonar o projeto, seguir os seguintes passos.

- Copiar o env:

``` bash
cp .env.example .env
```

- Configurar as variáveis do env conforme o seu ambiente (Necessário ter um banco de dados MySQL ou PGSQL e ter Elasticsearch).

- Baixar os pacotes:

``` bash
composer update
```

- Gerar chave da aplicação:

``` bash
php artisan key:generate
```

- Gerar palavra secreta do JWT:

``` bash
php artisan jwt:secret
```

- Criar a tabela e popular o banco:

``` bash
php artisan migrate:fresh --seed
```

- Rodar a aplicação:

```bash
php artisan serve
```

# Consumir a API já hospedada

Host: `https://laravel-api-elastic-estudos.herokuapp.com/api`

## Rotas

- POST - `/login`

Parâmetros: [email, password] 

Retorno: Token de autenticação.

`email: admin@mail.com`
`password: 123`

---

- GET - `/temperature`

Obs: Passar um Header `Authorization: Bearer [token obtido no login]`

Parâmetros: [?temperatura, ?size]

`? = Opcional`

Retorno: Temperaturas já cadastradas. 

----

- POST `/temperature/store`

Obs: Passar um Header `Authorization: Bearer [token obtido no login]`

Parâmetros: [temperatura]

Retorno: A temperatura cadastrada.

---
