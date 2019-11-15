**Инструкия по развертыванию**
* Клонировать репозиторий
* Выполнить `composer install`
* Копировать .env.example в .env
* Выполнить `php artisan key:generate`
* Указать параметры подключения к базе данных в .env
* Выполнить `php artisan storage:link`
* Выполнить `php artisan migrate`

Можно открывать сайт.