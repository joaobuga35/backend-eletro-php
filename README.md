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


<a name="deploy"></a>

## Deploy 

<h4>Foi efetuado um deploy para se utilizar no front-end</h4>
<p>Link do deploy: https://backend-eletro-php.onrender.com</p>
<p>Link do repositório do front-end: </p>
<p>Link do deploy do front-end para teste: </p>
