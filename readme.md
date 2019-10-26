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

- Rodar a aplicação:

```bash
php artisan serve
```

# Consumir a API já hospedada

Host: `https://laravel-api-elastic-estudos.herokuapp.com/api`

## Rotas

- GET - `/temperature`

Parâmetros: [?temperatura, ?size]

`? = Opcional`

Retorno: Temperaturas já cadastradas. 

----

- POST `/temperature/store`

Parâmetros: [temperatura]

Retorno: A temperatura cadastrada.

---
