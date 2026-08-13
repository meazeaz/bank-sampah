FROM php:7.4-apache

# Ekstensi yang dibutuhkan Laravel 8 + CrudBooster 5.6 (gd untuk upload/resize gambar,
# pdo_mysql untuk MySQL, zip/bcmath/exif dipakai paket-paket vendor).
RUN apt-get update && apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        libonig-dev \
        unzip \
        git \
        default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" gd pdo_mysql zip bcmath exif opcache \
    && rm -rf /var/lib/apt/lists/*

# Composer 2.2 LTS = versi terakhir yang masih mendukung PHP 7.4
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini

# vendor/ dibangun di dalam image supaya named volume "wecycle-vendor" tersemai
# otomatis. Tanpa ini Laravel harus membaca ~600 file per request lewat bind mount
# Windows yang berbiaya ~35ms/file (= request 25 detik).
#
# Dibangun dari composer.json/lock, bukan disalin dari host, supaya hasil clone
# yang bersih (vendor/ tidak ikut ke git) tetap bisa di-build.
# --no-scripts dipakai karena source code aplikasi belum ada saat build, sehingga
# "artisan package:discover" belum bisa jalan; Laravel menjalankannya sendiri saat
# request pertama dan menulis hasilnya ke bootstrap/cache.
COPY composer.json composer.lock /var/www/html/
RUN cd /var/www/html \
    && composer install --no-scripts --no-interaction --prefer-dist --no-progress \
    && composer clear-cache

# Menyemai named volume storage/framework dengan struktur folder yang Laravel harapkan
RUN mkdir -p /var/www/html/storage/framework/cache/data \
             /var/www/html/storage/framework/sessions \
             /var/www/html/storage/framework/views \
    && chown -R www-data:www-data /var/www/html/storage

WORKDIR /var/www/html
