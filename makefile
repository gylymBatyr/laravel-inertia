up:
	docker compose up --build -d

down:
	docker compose down

cli:
	docker compose exec php-cli bash

fpm-cli:
	docker compose exec php-fpm bash

node-cli:
	docker compose exec node bash

vite:
	docker compose exec node vite

npm-build:
	docker compose exec node npm run build

npm-dev:
	docker compose exec node npm run dev

npm-install:
	docker compose exec node npm install

npm-update:
	docker compose exec node npm update
