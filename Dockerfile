# Utiliser l'image officielle PHP-FPM comme base
FROM php:8.2-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier les fichiers de configuration Nginx et Supervisor
COPY docker/nginx/sites-enabled/laravel.conf /etc/nginx/sites-enabled/default
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copier le code de l'application
COPY . /var/www

# Définir le répertoire de travail
WORKDIR /var/www

# Changer les permissions pour le répertoire storage
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Installer les dépendances de Composer
RUN composer install --no-interaction --optimize-autoloader

# Exposer le port 80
EXPOSE 80

# Lancer Supervisor
CMD ["/usr/bin/supervisord"]
