FROM php:8.4.3-fpm-alpine3.20

RUN apk add --no-cache \
    postgresql-dev \
    && docker-php-ext-install pdo_pgsql pgsql
