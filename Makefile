start-local:
	make env-local \
	&& docker-compose -f docker-compose.local.yml up -d \
	&& sleep 10 \
	&& docker exec -it app composer install \
	&& docker exec -it app php artisan migrate --force \
	&& docker exec -it app php artisan test \
	&& docker exec -it app php artisan db:seed \
	&& docker exec -it app php artisan key:generate \
	&& docker exec -it app php artisan route:cache \
	&& make chmod

env-local:
	cp .env.local .env

chmod:
	docker exec -it app chmod -R 777 vendor \
	&& docker exec -it app chmod -R 777 storage
