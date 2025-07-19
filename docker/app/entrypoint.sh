#!/bin/sh

# Jalankan perintah-perintah yang perlu dieksekusi sebelum PHP-FPM dimulai

# Periksa apakah file .env ada dan APP_KEY belum diatur atau kosong
if [ -f .env ] && (! grep -q "APP_KEY=" .env || grep -q "APP_KEY=$" .env); then
    echo "Menggenerasi APP_KEY untuk aplikasi Laravel..."
    php artisan key:generate
fi

# Jalankan migrasi database otomatis (opsional, bisa dihapus jika tidak diinginkan otomatis)
# echo "Menjalankan migrasi database..."
# php artisan migrate --force

# Jalankan perintah utama kontainer (PHP-FPM)
exec docker-php-entrypoint "$@"