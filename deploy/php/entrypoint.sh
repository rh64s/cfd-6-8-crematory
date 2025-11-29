#!/bin/sh
echo "We live in a cruel world"
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
wait -n
exit $?