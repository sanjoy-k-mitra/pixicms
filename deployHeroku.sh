#!/usr/bin/env bash
php app/console assetic:dump --env=prod --no-debug
bin/heroku-php-apache2 web/
