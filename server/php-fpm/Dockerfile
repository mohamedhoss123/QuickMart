# php-fpm/Dockerfile
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var/www/html

RUN groupadd webgroup && usermod -aG webgroup www-data && chown -R root:webgroup /var/www/ && chmod -R 770 /var/www/
