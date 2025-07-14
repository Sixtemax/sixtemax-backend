# Imagen base de PHP con FPM
FROM php:8.2-fpm

# Instalar extensiones necesarias y herramientas básicas
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Instalar Composer desde contenedor oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /var/www

# Copiar todos los archivos del proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Dar permisos adecuados a carpetas necesarias
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Limpiar configuración previa y ejecutar migraciones (sin borrar tablas)
RUN php artisan config:clear && php artisan migrate --force || true

# Servir Laravel desde el puerto 8080 (Render lo detecta)
CMD php -S 0.0.0.0:8080 -t public
