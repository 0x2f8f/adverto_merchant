Merchant API
========================

Requirements
------------
* PHP 8.1;
* MySQL 10.6.4

Installation
------------
1) ```cp docker-compose.yml.dist docker-compose.yml```
2) ```cp .env.dist .env.local```
3) ```docker-compose up -d --build```<br>
   Возможно команды из Dockerfile не будут выполняться, тогда нужно их выполнить внутри контейнера.
4) Зайти в PHP контейнер под пользователем: <br>
   ```docker exec -ti adverto_merchant_php /bin/bash```
5) ```php composer.phar install``` (for development)<br>
   ```php composer.phar install --no-dev``` (for production)
6) Выходим из контейнера<br>
   ```exit```<br>
7) Добавляем в `hosts` домен проекта<br>
   ```sudo vim /etc/hosts```<br>
   Добавляем строку
   ```127.0.0.1       merchant.adverto.local```
Открываем в браузере проект, проверяем, что всё работает http://merchant.adverto.local/

Run symfony command:
------------
```docker-compose exec --user=root php bin/console command:name```

Database:
------------
1) Сейчас базу данных локально сгенерировать не получится, нужно брать копию с дев. сервера
2) Можно подключаться к дев удаленно. Спец.символы в пароле надо преобразовать через urlencode

[1]: https://symfony.com/doc/current/best_practices.html
[3]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
