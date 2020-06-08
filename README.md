# Aplikasi Pegawai

### Tutorial Instalasi
1. Buat database mysql baru dengan nama db_pegawai ` CREATE DATABASE db_pegawai; `
2. Copy file ` .env.example ` dan rename menjadi ` .env `
3. Jalankan perintah ` php artisan key:generate ` untuk mendapatkan key aplikasi pada .env
4. Konfigurasi database pada file .env
5. Lakukan migrasi database ` php artisan migrate `
6. Jalankan perintah ` composer install `
7. Jalankan aplikasi ` php artisan serve `
 
