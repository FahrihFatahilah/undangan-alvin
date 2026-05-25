FROM php:8.3-fpm-alpine
WORKDIR /var/www/html

RUN apk add --no-cache nginx sqlite sqlite-dev libpng-dev libjpeg-turbo-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo pdo_sqlite opcache gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

COPY . .

RUN cp .env.example .env \
    && php artisan key:generate \
    && php artisan storage:link \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && chown -R www-data:www-data storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/entrypoint.sh"]
