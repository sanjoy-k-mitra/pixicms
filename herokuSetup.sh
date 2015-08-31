#!/usr/bin/env bash
php app/console assetic:dump --env=prod --no-debug
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
