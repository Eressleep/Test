# Запуск проекта через make

## Установка зависимостей и поднятие контейнеров
```
make setup
```
## Заупск скрипта
```
make script PATH=<путь до файла>
```
### Пример
```
make script-test
```
# Запуск проекта вручную
## Поднятие контейнеров
```
docker-compose up -d
```
## Установка зависимостей
```
docker exec -i php composer update
```
## Проверка скрипта
```
docker exec -i php php script.php PATH=<путь до файла>
```
### Пример
```
docker exec -i php php script.php PATH=input/offices.txt
```
