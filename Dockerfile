FROM php:8.4.8-cli
RUN docker-php-ext-install pdo_mysql
WORKDIR /var/www/html