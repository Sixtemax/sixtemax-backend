# Usa PHP 8.2 con Apache
FROM php:8.2-apache

# Habilitar mod_rewrite para Laravel
RUN a2enmod rewrite

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el proyecto al contenedor
COPY . /var/www/html

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Cambiar el DocumentRoot de Apache a /public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Dar permisos a carpetas necesarias
RUN chown -R www-data:www-data storage bootstrap/cache

# Instalar dependencias PHP con Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Limpiar y cachear config, rutas, vistas
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache

# Exponer el puerto HTTP
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
