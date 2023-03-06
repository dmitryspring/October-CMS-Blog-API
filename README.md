# API для RainLab.Blog

## Установка
```bash
git clone https://github.com/dmitryspring/October-CMS-Blog-API/ blog
composer install
php artisan october:migrate
```

Миграция (сидинг фабрик и изображений для постов) может занять около 1 минуты.

Проект состоит из двух плагинов:

* Blog.Extender
* Blog.Api

## Blog.Extender
Плагин Blog.Extender расширяет Rainlab.Blog, добавляя в него следующее:

* Фабрики (Factories) для изначального наполнения блога контентом
* Связь с моделью `Tag`

Файлы фабрик находятся в директории `plugins/blog/extender/database/factories`.

## Blog.Api

Плагин Blog.Api реализует простой вариант RESTlike-API для блога.

В файле routes.php определяются маршруты API Resource по методологии Laravel.

Контроллеры возвращают результат в виде JSON API Resources (в директории `plugins/blog/api/http/resources`).

### Middleware

#### ExceptionsMiddleware

Для обработки ошибок приложением при XMLHttpRequest-запросах.

#### SubstituteBindings

Для подстановки моделей в маршрут.
