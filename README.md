# Getting start
### Конфигурирование сервера 
1) Если у вас OpenServer в связке NGINX, то переименовать файл [Nginx_1.23_vhost.conf](Nginx_1.23_vhost.conf)
в соответствии с вашей версией сервера, где 1.23 версия NGINX
(файл создавался под версию 1.19)
2) Иначе необходимо сконфигурировать сервер так, 
чтобы все запросы перенаправлялись к файлу public/index.php
Кроме запросов к файлам ресурсов (.js, .css, и т.д. (по примеру конфига nginx)) 

### Настройка БД
1) Сконфигурировать подключение: в папке database лежит файл dbConfig, 
где соответственно нужно заполнить данные для подключения к БД.
Ожидается, что версия MySql 8.0 и выше (в тз указано не было) (чтобы была поддержка CTE)
2) Загрузить dump: выполнить в консоли из корневой директории проекта 
```php cli.php loadDump``` (Создадутся таблицы из database/dumps/world.sql)


## Возможные комментарии и замечания
1) Первым делом я бы вынес чувствительные данные, как реквизиты подключения к бд в .env файл
2) Все клиентски библиотеки я подключил через CDN, по-хорошему их стоило бы устанавливать через
npm настраивать сборщик (webpack, vite). В идеале вовсе отделить клиентскую часть от серверной, но думаю в рамках тз это просто излишне
3) По хорошему создать отдельный файл с маршрутами по типу routes.php, и добавить поддержку HTTP-методов но опять же думаю в рамках тз это тоже излишне
4) Так же стоило бы подправить cli, чтобы тоже работал через роутер, но подумал что так же будет излишнем в рамках тз

### P.S.:
Если будут какие-то замечания в идеале хотел бы их увидеть, в виде комментариев в форке, прямо в коде
или например в issues
