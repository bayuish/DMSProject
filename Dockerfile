# Gunakan image PHP-FPM resmi sebagai base image
FROM php:8.2-fpm-alpine

# Set working directory di dalam container
WORKDIR /var/www/html

# Install dependensi sistem yang dibutuhkan oleh PHP dan Composer
RUN apk add --no-cache \
    bash \
    git \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    jpeg-dev \
    libjpeg-turbo-dev \
    oniguruma-dev \
    netcat-openbsd \
    postgresql-dev \
    sqlite-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd bcmath opcache \
    && docker-php-ext-configure gd --with-jpeg \
    && rm -rf /var/cache/apk/*

# Install Composer menggunakan multi-stage build dari image Composer resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin kode aplikasi Laravel ke dalam container
COPY . /var/www/html

# Konfigurasi hak akses untuk direktori storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Salin custom entrypoint script dan jadikan executable
COPY docker/app/entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port 9000 untuk PHP-FPM
EXPOSE 9000

# Atur custom entrypoint script sebagai ENTRYPOINT utama kontainer
ENTRYPOINT ["docker-entrypoint.sh"]
# CMD ini akan menjadi argumen default untuk ENTRYPOINT jika tidak ada argumen lain yang diberikan
CMD ["php-fpm"]