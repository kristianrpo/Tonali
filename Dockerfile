FROM php:8.2-apache

RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git curl \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN npm install
RUN npm run build

RUN php artisan storage:link
RUN chmod -R 775 storage bootstrap/cache
RUN chmod -R guo+w storage
CMD ["apache2-foreground"]
