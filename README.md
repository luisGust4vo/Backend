<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Projeto backend

Este é o repositório do projeto backend da onfly, que é uma aplicação web baseada em Laravel.

## Visão Geral

Este projeto foi desenvolvido para um teste de conhecimento da framework.

## Configuração do Ambiente

Certifique-se de que seu ambiente de desenvolvimento esteja configurado corretamente. Você deve ter o PHP, Composer e o Laravel instalados.

### Instalação

1. Clone este repositório para sua máquina local:

```bash
git clone https://github.com/luisGust4vo/backend-onfly.git
```
2.Acesse o diretório do projeto: cd backend-onfly.

3.Instale as dependências do Composer:composer install.
O aplicativo estará disponível em http://localhost:8080.
Crie um arquivo .env a partir do arquivo .env.example e configure suas variáveis de ambiente.
Execute as migrações do banco de dados: php artisan migrate.
Inicie o servidor de desenvolvimento: php artisan serve.
Autenticação com Laravel Sanctum:
## Este projeto utiliza o Laravel Sanctum para autenticação de API. Certifique-se de configurar o Sanctum de acordo com as instruções no README do projeto.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
