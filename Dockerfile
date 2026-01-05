FROM php:8.2-fpm

# Instalar extensões PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .
RUN composer install --optimize-autoloader --no-dev
RUN chown -R www-data:www-data /var/www

# Copiar .env e gerar chave
RUN cp .env.example .env
# RUN php artisan key:generate --no-interaction
# RUN php artisan cache:clear
# RUN php artisan config:clear

# Expor porta
EXPOSE 9000

# Iniciar PHP-FPM
CMD ["php-fpm"]
