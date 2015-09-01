#!/usr/bin/env bash
php app/console doctrine:schema:update --force
bin/heroku-php-apache2 web/
