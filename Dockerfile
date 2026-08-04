FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libsqlite3-dev sqlite3 curl \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache database
RUN chmod -R 775 storage bootstrap/cache database

RUN a2enmod rewrite

COPY .env .env

EXPOSE 80

CMD php artisan migrate --force && apache2-foreground