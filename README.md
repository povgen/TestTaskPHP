# Getting start
### Конфигурирование сервера 
1) Если сервер NGINX то переименовать файл [Nginx_1.23_vhost.conf](Nginx_1.23_vhost.conf)
в соответствии с вашей версией сервера, где 1.23 версия NGINX
(файл писался под версию 1.19)
2) Если используется другой сервер, то необходимо его сконфигурировать так, 
чтобы все запросы перенапралялись к файлу public/index.php
Кроме запросов к фалам ресурсов (.js, .css, и т.д. (по примеру конфига nginx)) 

### Настройка БД
1) Сконфигурировать подключение:  папке database лежит файл dbConfig, 
где соответсвенно нужно заполнить данные для подключения к БД.
Ожидается, что версия MySql 5.7 и выше (в тз указано не было)
2) Загрузить dump: выполнить в консоли из корневой директории проекта 
```php cli.php loadDump``` (Содадутся таблицы из database/dumps/world.sql)


## Возможные комментарии и замечания
1) Первым делом я бы вынес чуствительные данные, как реквизиты подключения к бд в .env файл
2) Все клиентски библиотеки я подключил через CDN, по хорошему их стоило бы устанавливать через
npm настраивать сборщик (webpack, vite). В идеале вовсе отделить клиентскую часть от серверной, но думаю в рамках тз это просто излишне
3) По хорошему создать отдельный файл с маршрутами по типу routes.php, но опять же думаю в рамках тз это тоже излишне
4) Так же стоило бы подправить cli, чтобы тоже работал через роутер, но подумал что так же будет излишнем в рамках тз
5) Запрос для получения данных получился достаточно долгим, было бы больше свободного времени я бы подумал 
как его ещё можно оптимизировать 

### P.S.:
Если будут какие-то замечания в идеале хотел бы их увидеть, в виде коментариев в форке, прямо в коде
или например в issues