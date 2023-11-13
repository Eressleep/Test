up:
	docker-compose up -d
down:
	docker-compose down
script:
	docker exec -i php php script.php PATH=input/offices.txt
php:
	docker exec -it php bash
setup-composer:
	docker exec -i php composer update
setup: up setup-composer
