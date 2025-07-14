FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crear y configurar el directorio de la app
WORKDIR /var/www

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Asignar permisos
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Ejecutar migraciones automáticas al iniciar
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
