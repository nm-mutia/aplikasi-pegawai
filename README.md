# Aplikasi Pegawai

### Tutorial Instalasi
1. Buat database mysql baru dengan nama db_pegawai ` CREATE DATABASE db_pegawai; `
2. Copy file ` .env.example ` dan rename menjadi ` .env `
3. Jalankan perintah ` php artisan key:generate ` untuk mendapatkan key aplikasi pada .env
4. Lakukan migrasi database ` php artisan migrate `
5. Jalankan aplikasi ` php artisan serve `
 
