#!/usr/bin/env bash
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
