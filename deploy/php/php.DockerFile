FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache libpq-dev zip unzip bash \
    && docker-php-ext-install pdo pdo_pgsql pgsql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /

COPY entrypoint.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint.sh

WORKDIR /var/www/laravel
ENTRYPOINT ["php"]