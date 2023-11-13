up:
	docker-compose up -d
down:
	docker-compose down
script:
	docker exec -i php php script.php PATH=${PATH}
php:
	docker-compose -it php bash
