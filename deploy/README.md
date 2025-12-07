# Запуск Docker

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
