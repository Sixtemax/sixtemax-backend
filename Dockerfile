# Usa PHP 8.2 con Apache
FROM php:8.2-apache

# Instala dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

# Habilita mod_rewrite de Apache (necesario para rutas Laravel)
RUN a2enmod rewrite

# Instala Composer (desde imagen oficial de Composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el código del proyecto
COPY . /var/www/html

# Define el directorio de trabajo
WORKDIR /var/www/html

# Cambia el DocumentRoot de Apache para que apunte a /public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Establece permisos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instala dependencias de PHP vía Composer
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Expone el puerto 80
EXPOSE 80
