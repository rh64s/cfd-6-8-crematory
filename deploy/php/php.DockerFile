FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache libpq-dev zip unzip bash \
    && docker-php-ext-install pdo pdo_pgsql pgsql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ../../backend /var/www/backend
WORKDIR /var/www/backend

COPY deploy/php/entrypoint.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint.sh && chmod -R 755 /var/www/backend
EXPOSE 9000
#RUN #composer install --no-dev --optimize-autoloader
#CMD ["php", "-S", "0.0.0.0:9000", "-t", "/var/www/html/public"]