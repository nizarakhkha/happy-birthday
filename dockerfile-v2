FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    sqlite3 \
    libsqlite3-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite zip \
    && a2enmod rewrite \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && printf "APP_NAME=Laravel\nAPP_ENV=production\nAPP_KEY=\nAPP_DEBUG=false\nAPP_URL=http://localhost\nLOG_CHANNEL=stack\nDB_CONNECTION=sqlite\nDB_DATABASE=/var/www/html/database/database.sqlite\nSESSION_DRIVER=file\nCACHE_STORE=file\nQUEUE_CONNECTION=sync\n" > .env \
    && mkdir -p /var/www/html/database \
    && mkdir -p /var/www/html/storage/framework/cache \
    && mkdir -p /var/www/html/storage/framework/sessions \
    && mkdir -p /var/www/html/storage/framework/views \
    && mkdir -p /var/www/html/storage/logs \
    && touch /var/www/html/database/database.sqlite \
    && composer install --no-dev --optimize-autoloader --no-scripts \
    && npm install \
    && npm run build \
    && php artisan key:generate --force \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
