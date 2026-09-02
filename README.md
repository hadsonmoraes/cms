# Geração de módulos do sistema e do site

Para criar os módulos do sistema e do site com o Artisan, utilize os comandos abaixo.

## 1) Módulo do sistema

```bash
php artisan make:module-sistema
```

Esse comando gera a estrutura base do módulo do sistema, como:

- controllers
- models
- views
- routes
- providers/configurações específicas

Exemplo de uso:

```bash
php artisan make:module-sistema --name=Usuarios
```

Se o projeto aceitar parâmetros opcionais, o nome do módulo pode ser informado para criar uma estrutura específica.

## 2) Módulo do site

```bash
php artisan make:module-site
```

Esse comando gera a estrutura base do módulo do site, normalmente usada para páginas públicas, landing pages, blog, produtos, contato e áreas acessíveis ao visitante.

Exemplo:

```bash
php artisan make:module-site --name=Home
```