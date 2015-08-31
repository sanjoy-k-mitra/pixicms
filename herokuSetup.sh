#!/usr/bin/env bash
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
bin/heroku-buildpack-apache2 web/