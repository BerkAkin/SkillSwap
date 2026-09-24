FROM php:8.4-alpine

RUN apk add --no-cache git curl libpng-dev libxml2-dev zip unzip libpq-dev libzip-dev oniguruma-dev

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY composer.json composer.lock ./
COPY . .

RUN composer install
