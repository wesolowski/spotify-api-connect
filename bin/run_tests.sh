#!/usr/bin/env bash

docker-compose up -d
docker-compose run --rm devtools bash -c "rm vendor/bin/*; composer install; vendor/bin/phpunit --coverage-html codecoverage"
