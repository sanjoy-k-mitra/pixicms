#!/usr/bin/env bash
php app/console assetic:dump --env=prod --no-debug
php app/console doctrine:schema:create
bin/heroku-php-apache2 web/
php app/console doctrine:fixtures:load
