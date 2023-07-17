<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h2>Índice</h2>

1. [ Descrição ](#sobre)
2. [ Tecnologias](#techs)
3. [ Instalação ](#install)
4. [ Endpoints ](#end)
5. [ Deploy ](#deploy)

<a name="descricao"></a>
## Descrição

API voltada para o registro de eletrodomésticos. 

<a name="techs"></a>
## Tecnologias utilizadas
- PHP
- Laravel

<a name="install"></a>
## Instalação: 
<h2>Para rodar o projeto localmente siga os seguintes passos: </h2>

 <h4>1º Passo</h4>
  <h5>Certifique-se de ter o docker e o docker compose instalados em sua máquina.</h3>
  <p>
      Docker version >= 23.0.5
      Docker Compose version >= v2.17.3
  </p>

  <h4>2º passo</h4>
    <p>Variáveis de ambiente:</p>
    <p>Crie um arquivo .env e complete as variáveis do database com suas informações conforme esta no .env.example.</p>

    ```bash
        Caso venha a ter algum problema no .env teste a seguinte configuração trocando o root por sail:
            DB_USERNAME=sail
    ```
    
  <h4>3º Passo - Configurando o Backend</h4>
  - Rode os seguintes comandos: 


```bash
Para ativar a aplicação e conseguir rodar o localhost:
$ docker-compose up
```
  
```bash
Para rodar migrações:
$ docker exec -it test_eletro_php-laravel.test-1 /bin/sh

#migrate
$ php artisan migrate
```

 <h4>4º Passo - Testando a aplicação</h4>
 - Utilize o workspace do insomnia que está localizado no arquivo raiz com o nome: eletros-workspace.json
 - Link para teste http://localhost/api/{endpoint} 
 - Siga a tabela abaixo para fazer os testes: 

<a name="end"></a>
# Endpoints do serviço

| Método | Endpoint | Responsabilidade |
|--------|----------|------------------|
| POST | /eletros | Criar um novo eletrodoméstico |
| GET | /eletros | Listar todos os eletrodomésticos |
| GET | /eletros/&lt;id&gt; | Listar um eletrodoméstico |
| PATCH | /eletros/&lt;id&gt; | Atualiza os dados de um eletrodoméstico de forma dinâmica |
| DELETE | /eletros/&lt;id&gt; | Deleta um eletrodoméstico |

### **POST: /eletros**

* Deve ser possível criar um eletrodoméstico contendo os seguintes dados:
  * **name**: string.
  * **image**: string.
  * **description**: string.
  * **tension**: string.
  * **price**: número maior que 0.01.
  * **brand**: string.

***Regras de negócio***

* Caso de sucesso:
  * **Envio**: Um objeto contendo os dados do eletrodoméstico a ser criado.
  * **Retorno**: Um objeto contendo os dados do eletrodoméstico criado.
  * **Status**: 201 CREATED.

**Exemplo de envio**:

```json
 {
  "name": "Geladeira",
  "image": "https://consul.vtexassets.com/arquivos/ids/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
  "tension": "220v",
  "brand": "LG",
	"price": 2000,
  "description": "Geladeira nova com diversas cores para escolher."
}
```

**Exemplo de retorno**:

```json
  {
	"name": "Geladeira",
	"image": "https:\/\/consul.vtexassets.com\/arquivos\/ids\/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
	"tension": "220v",
	"brand": "LG",
	"price": 2000,
	"description": "Geladeira nova com diversas cores para escolher.",
	"id": "99aa406b-dd74-40ba-9932-c2b687f1f16b",
	"updated_at": "2023-07-17T03:37:23.000000Z",
	"created_at": "2023-07-17T03:37:23.000000Z"
   }
```

* Não deve ser possível criar um eletrodoméstico que na seja das seguintes marcas: LG, Samsung, Fischer, Brastemp, Electrolux.
  * **Envio**: Um objeto contendo uma marca que não esteja dentre as citadas.
  * **Retorno**: Um objeto contendo uma mensagem de erro.
  * **Status**: 400 Bad Request.

**Exemplo de envio**:

```json
{
  "name": "Geladeira",
  "image": "https://consul.vtexassets.com/arquivos/ids/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
  "tension": "220v",
  "brand": "APPLE",
  "price": 2000,
  "description": "Geladeira nova com diversas cores para escolher."
}
```

**Exemplo de retorno**:

```json
{
	"errors": "The selected brand is not allowed. Only: LG, Samsung, Fischer, Brastemp, Electrolux."
}
```

### **GET: /eletros**

* Deve ser possível listar todos os eletrodomésticos armazenados no banco de dados.

  * Caso de sucesso:
  * **Retorno**: Array de objetos.
  * **Status**: 200 OK.

  
```json
[
	{
		"id": "99aa360b-a77b-4f08-a462-bc4f61476552",
		"name": "Geladeira",
		"image": "https:\/\/consul.vtexassets.com\/arquivos\/ids\/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
		"description": "Geladeira nova com diversas cores para escolher.",
		"tension": "220v",
		"created_at": "2023-07-17T03:08:22.000000Z",
		"updated_at": "2023-07-17T03:08:22.000000Z",
		"brand": "LG",
		"price": 2000
	},
	{
		"id": "99aa406b-dd74-40ba-9932-c2b687f1f16b",
		"name": "Geladeira",
		"image": "https:\/\/consul.vtexassets.com\/arquivos\/ids\/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
		"description": "Geladeira nova com diversas cores para escolher.",
		"tension": "220v",
		"created_at": "2023-07-17T03:37:23.000000Z",
		"updated_at": "2023-07-17T03:37:23.000000Z",
		"brand": "LG",
		"price": 2000
	}
]
```

### **GET: /eletros/&lt;id&gt;**

* Deve ser possível listar um respectivo eletrodoméstico armazenado no banco de dados.

  * Caso de sucesso:
  * **Retorno**: Um objeto.
  * **Status**: 200 OK.

```json
	{
		"id": "99aa406b-dd74-40ba-9932-c2b687f1f16b",
		"name": "Geladeira",
		"image": "https:\/\/consul.vtexassets.com\/arquivos\/ids\/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
		"description": "Geladeira nova com diversas cores para escolher.",
		"tension": "220v",
		"created_at": "2023-07-17T03:37:23.000000Z",
		"updated_at": "2023-07-17T03:37:23.000000Z",
		"brand": "LG",
		"price": 2000
	}
```

### **PATCH: /eletros/&lt;id&gt;**

* Deve ser possível atualizar um eletrodoméstico pelo id recebido nos parâmetros da rota.

***Regras de negócio***

* Deve ser possível atualizar um eletrodoméstico contendo os seguintes dados:
  * **name**: string.
  * **image**: string.
  * **description**: string.
  * **tension**: string.
  * **price**: número maior que 0.01.
  * **brand**: string.

* Todos os dados são opcionais.
  * O eletrodoméstico deve ser atualizado dinamicamente seguindo os dados enviados.

* Caso de sucesso:
  * **Envio**: Um objeto contendo os dados do eletrodoméstico a ser atualizado.
  * **Retorno**: Um objeto contendo os dados do eletrodoméstico atualizado.
  * **Status**: 200 OK.

```json
	{
		"tension": "110v",
		"price": 25454.78
	}
```


**Exemplo de retorno**:

```json
{
	"id": "99aa1ff7-cea7-4f50-a780-1837d1de07da",
	"name": "Geladeira",
	"image": "https:\/\/consul.vtexassets.com\/arquivos\/ids\/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
	"description": "Geladeira daora.",
	"tension": "220v",
	"created_at": "2023-07-17T02:06:38.000000Z",
	"updated_at": "2023-07-17T02:07:17.000000Z",
	"brand": "LG",
	"price": 25454.78
}
```

* Não deve ser possível atualizar um eletrodoméstico caso ele não exista:
  * **Envio**: Um objeto contendo os dados do eletrodoméstico.
  * **Retorno**: Um objeto contendo uma mensagem de erro.
  * **Status**: 404 NOT FOUND.

**Exemplo de envio**:

```json
{
  "description": "nova descrição",
}
```

**Exemplo de retorno**:

```json
{
  "errors": "Product not found."
}
```

* Não deve ser possível criar um eletrodoméstico que na seja das seguintes marcas: LG, Samsung, Fischer, Brastemp, Electrolux.
  * **Envio**: Um objeto contendo uma marca que não esteja dentre as citadas.
  * **Retorno**: Um objeto contendo uma mensagem de erro.
  * **Status**: 400 Bad Request.

**Exemplo de envio**:

```json
{
  "name": "Geladeira",
  "image": "https://consul.vtexassets.com/arquivos/ids/231389-800-auto?v=638004093349600000&width=800&height=auto&aspect=true",
  "tension": "220v",
  "brand": "APPLE",
  "price": 2000,
  "description": "Geladeira nova com diversas cores para escolher."
}
```

**Exemplo de retorno**:

```json
{
	"errors": "The selected brand is not allowed. Only: LG, Samsung, Fischer, Brastemp, Electrolux."
}
```

### **DELETE: /eletros/&lt;id&gt;**

***Regras de negócio***

* Deve ser possível deletar um eletrodoméstico pelo id recebido nos parâmetros da rota.

* Caso de sucesso:
  * **Envio**: Sem envio.
  * **Retorno**: Sem retorno.
  * **Status**: 204 NO CONTENT.

* Não deve ser possível atualizar um eletrodoméstico caso ele não exista:
  * **Envio**: Um objeto contendo os dados do eletrodoméstico.
  * **Retorno**: Um objeto contendo uma mensagem de erro.
  * **Status**: 404 NOT FOUND.
 
  **Exemplo de retorno**:

```json
{
  "errors": "Product not found."
}
```

<a name="deploy"></a>

## Deploy 

<h4>Foi efetuado um deploy de aplicação front-end para testar a API localmente.</h4>
<p>Link do deploy:</p>
<p>Link do repositório do front-end: </p>
