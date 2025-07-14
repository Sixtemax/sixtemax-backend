FROM php:8.2-apache

# Activar mod_rewrite
RUN a2enmod rewrite

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todo el proyecto
COPY . /var/www/html

WORKDIR /var/www/html

# Configurar Apache para que apunte a /public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Instalar dependencias
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Limpiar caches
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear

# Exponer puerto 80
EXPOSE 80

# 🟢 Ejecutar migraciones en el arranque y luego levantar Apache
CMD php artisan migrate:fresh --force && apache2-foreground
