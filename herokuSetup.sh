#!/usr/bin/env bash
app/console doctrine:schema:update --force
app/console doctrine:fixtures:load
bin/heroku-buildpack-apache2 web/