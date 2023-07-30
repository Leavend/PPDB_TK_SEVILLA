#!/bin/bash

# Hentikan web server atau worker jika diperlukan
# Contoh: systemctl stop nginx
# Contoh: supervisorctl stop laravel-worker

# Masuk ke direktori proyek Laravel
# cd /var/www/PPDB_TK_SEVILLA

# Pastikan Anda berada di branch yang benar (misalnya, "Version5")
sudo git checkout Version5

# Tarik perubahan terbaru dari repositori remote
sudo git pull origin Version5

# Install dependensi PHP (misalnya, dengan Composer)
sudo composer install --no-dev --optimize-autoloader

# Hapus cache Laravel jika diperlukan
# php artisan cache:clear

# Hapus file cache view jika diperlukan
# php artisan view:clear

# Jalankan migrasi database jika diperlukan
# php artisan migrate --force

# Generate kunci aplikasi (jika belum ada)
# php artisan key:generate

# Setel ulang cache konfigurasi (jika diperlukan)
# php artisan config:cache

# Setel ulang cache route (jika diperlukan)
# php artisan route:cache

# Setel ulang cache view (jika diperlukan)
# php artisan view:cache

# Pastikan web server atau worker berjalan kembali
# Contoh: systemctl start nginx
# Contoh: supervisorctl start laravel-worker

# Tampilkan pesan deploy selesai
echo 'Deployed'
