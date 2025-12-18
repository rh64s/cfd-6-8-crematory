# Веб-приложение "Крематорий"


Сайт, предоставляющий услуги кремации, вход и управление своими данными, а также запрашивать документы и отслеживать статус заказов через личный кабинет

----

## Стек технологий для разработки
### Frontend
* HTML5
* CSS
* SCSS
* TypeScript
* Vue 3 Composition API
* Vue Router
* Vite
* Eslint + Prettier
* Axios
* Pinia
----
### Backend
* PHP (8.2 и больше)
* Laravel 12.x + JWT Authorization
* PostgreSQL
* Docker + Docker compose
* Nginx

----
# Инструкция по запуску

### Подготовка

У вас должен быть установлен Docker

Ссылки:
- Windows:
    - [Установка Docker Desktop](https://docs.docker.com/desktop/setup/install/windows-install/)
- Linux:
    - [Debian, RHEL (CentOS, Fedora), Binaries](https://docs.docker.com/engine/install/)
    - [Arch](https://docs.docker.com/desktop/setup/install/linux/archlinux/)

### Запуск

Перейдите в папку `deploy` в терминале

#### Запуск контейнеров
```terminaloutput
docker compose up -d
```
и дождитесь выполнения комманды


#### Быстрые комманды для установки backend-а, миграций и установки ключа:
```terminaloutput
docker exec crem_back entrypoint.sh
```
и дождитесь выполнения комманды

### Порты, обращения

Frontend: <http://localhost:80/>

Обращение к API: <http://localhost:80/api/>

### Остановка и последующаяа очистка

Для остановки контейнеров:
```terminaloutput
docker compose down
```

Остановка контейнера и последующее удаление томов (volumes)
```terminaloutput
docker compose down -v
```
это приведет к очистке и позволит начать базу данных с чистого листа

### PGAdmin

После запуска контейнера, понадобится некоторое время для его запуска (обычно, хватает меньше минуты)
Доступен по адресу: <http://localhost:5050/browser/>
- пароль: postgrespasswordlaravel

#### Добавление базы данных в PGAdmin (Для Frontend обычно не требуется)

1. Registration
2. Задаем любое название, переходим в Connection
3. Host: db
4. Port: 5432
5. Maintance database: postgres
6. Username: postgres
7. Password: postgrespasswordlaravel

Теперь, при переходе в схемы, в таблицы, вы сможете увидеть все интересующие таблицы и данные внутри
