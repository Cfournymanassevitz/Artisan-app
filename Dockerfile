# Utiliser l'image officielle php-fpm comme base
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
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Copier les fichiers de configuration Nginx et Supervisor
COPY docker/nginx/sites-enabled/laravel.conf /etc/nginx/sites-enabled/default
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copier le code de l'application
COPY . /var/www

# Définir le répertoire de travail
WORKDIR /var/www

# Exposer le port 80
EXPOSE 80

# Lancer Supervisor
CMD ["/usr/bin/supervisord"]
