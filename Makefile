deploy:
	docker-compose run php php composer.phar install --optimize-autoloader --no-dev
	serverless deploy

undeploy:
	serverless remove

bash:
	docker-compose exec app sh

migrate:
	docker-compose run php bash -c "php artisan migrate:refresh; php artisan db:seed --class=ProductSeeder; php artisan populate:uf"

migrate-remote:
	vendor/bin/bref cli product-crud-dev-artisan -- migrate --force

build:
	docker-compose up --force-recreate --remove-orphans

install:
	docker-compose run php bash -c "cp -n '.env.example' '.env'; php composer.phar install"
