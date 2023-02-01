# Slot Machine

## Get Docker images

	docker pull composer
	docker pull php:8.1-alpine

## Install dependencies

	docker run --rm --interactive --tty --user "$(id -u):$(id -g)" --volume $PWD:/app composer install

## Run generator
	
	docker run -it --rm --name slot -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:8.1-alpine php src/index.php
