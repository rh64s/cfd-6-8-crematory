#!/bin/sh
echo "We live in a cruel world"
cp .env.example .env
composer install
wait -n
php artisan key:generate
php artisan migrate
wait -n
php artisan db:seed
wait -n
exit $?