FROM composer:2 AS composer

FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    icu-dev \
    icu-libs \
    libzip-dev \
    libzip \
    oniguruma-dev \
    && docker-php-ext-install -j"$(getconf _NPROCESSORS_ONLN)" \
    bcmath \
    intl \
    mbstring \
    opcache \
    pdo_mysql \
    zip \
    && apk del --no-network icu-dev libzip-dev oniguruma-dev

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock* ./
RUN composer install --no-interaction --prefer-dist --no-progress --no-scripts

COPY . .

RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views \
    && chown -R www-data:www-data storage bootstrap/cache

CMD ["sh", "-c", "composer install --no-interaction --prefer-dist --no-progress && php-fpm"]