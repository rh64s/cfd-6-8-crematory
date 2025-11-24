FROM php:8.2-fpm-alpine

RUN apk add --no-cache libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

WORKDIR /var/www/laravel
