FROM php:8.0

RUN pacman -Syu
RUN  pacman -S git curl libmcrypt libjpeg-turbo libpng  bzip2
RUN docker-php-ext-install php-pgsql zip
# Install Composer
RUN curl --silent --show-error "https://getcomposer.org/installer" | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel Envoy
RUN composer global require "laravel/envoy=~1.0"