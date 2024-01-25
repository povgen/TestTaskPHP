# Getting start
### Конфигурирование сервера 
1) Если сервер NGINX то переименовать файл [Nginx_1.23_vhost.conf](Nginx_1.23_vhost.conf)
в соответствии с вашей версией сервера, где 1.23 версия NGINX
(файл писался под версию 1.19)
2) Если используется другой сервер, то необходимо его сконфигурировать так, 
чтобы все запросы перенапралялись к файлу public/index.php
Кроме запросов к фалам ресурсов (.js, .css, и т.д.) 

### Настройка БД
1) Сконфигурировать подключение:  папке database лежит файл dbConfig, 
где соответсвенно нужно заполнить данные для подключения к БД.
Ожидается, что версия MySql 5.7 и выше (в тз указано не было)
2) Загрузить dump: выполнить в консоли из корневой директории проекта 
```php cli.php loadDump``` (Содадутся таблицы из database/dumps/world.sql)


## Коментарии по доработкам
1) 