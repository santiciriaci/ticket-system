FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev libonig-dev libxml2-dev zip unzip curl git \
    && docker-php-ext-install pdo_mysql mbstring xml

# Instalar Composer correctamente
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www
