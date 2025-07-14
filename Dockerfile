# Imagen base con PHP + Apache
FROM php:8.2-apache

# Habilitar mod_rewrite para URLs amigables
RUN a2enmod rewrite

# Instalar extensiones requeridas por Laravel
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

# Copiar todo el proyecto Laravel
COPY . /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Apuntar Apache a la carpeta public/
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Dar permisos a carpetas necesarias
RUN chown -R www-data:www-data storage bootstrap/cache

# Instalar dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Limpiar y cachear configuración
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache

# Ejecutar migraciones automáticamente
RUN php artisan migrate:fresh --force

# Exponer el puerto 8080 (usado por php artisan serve si lo necesitaras)
EXPOSE 80

# Comando por defecto (Apache)
CMD ["apache2-foreground"]
