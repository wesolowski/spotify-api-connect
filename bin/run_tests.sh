#!/usr/bin/env bash

docker-compose up -d
docker-compose run --rm devtools bash -c "vendor/bin/phpunit"
