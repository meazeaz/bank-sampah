# Menjalankan We-Cycle dengan Docker

Project ini butuh **PHP 7.4** (CrudBooster 5.6 tidak jalan di PHP 8) dan **MySQL 5**.
Karena Windows tidak lagi menyediakan PHP 7.4 lewat winget, environment-nya dijalankan
lewat Docker dengan versi yang persis sesuai requirement.

## Perintah harian

Semua dijalankan dari folder project ini.

```powershell
# Menyalakan
docker compose up -d

# Mematikan
docker compose down

# Melihat log Apache/PHP
docker compose logs -f app

# Masuk ke shell container (untuk artisan, composer, dll)
docker exec -it wecycle-app bash
```

Website: <http://127.0.0.1:8000>

## Akun

| Peran               | URL                         | Email                            | Password      |
|---------------------|-----------------------------|----------------------------------|---------------|
| Super Admin (Gesang)| http://127.0.0.1:8000/admin | gesangbanksampah2025@gmail.com   | `password`    |
| Admin bawaan        | http://127.0.0.1:8000/admin | admin@crudbooster.com            | `123456`      |
| Nasabah             | http://127.0.0.1:8000/login | budi@example.com                 | `password123` |

Nasabah lain hasil seeder: `siti@`, `ahmad@`, `dewi@`, `hendra@`, `rina@`, `tedi@`
(semua `@example.com`, password sama).

Catatan: file [USER](USER) mendaftar 20 nasabah (`tedihanafiah12@gmail.com` dst, password
`password`). Daftar itu milik `DummyDataSeeder`, bukan `FreshDataSeeder` yang dipakai di
sini. Untuk memakai daftar tersebut jalankan `docker exec wecycle-app php artisan db:seed
--class=DummyDataSeeder --force` — perlu diingat seeder itu meng-truncate seluruh data
nasabah, sampah, reward, dan transaksi yang ada sekarang.

## Perintah artisan

Jalankan di dalam container, bukan di Windows:

```powershell
docker exec wecycle-app php artisan migrate
docker exec wecycle-app php artisan db:seed --class=FreshDataSeeder
docker exec wecycle-app php artisan cache:clear
```

## Database

MySQL 5.7 di container `wecycle-db`, database `we-cycle`.

- Dari dalam container app: host `db`, port `3306`
- Dari Windows (DBeaver/HeidiSQL/TablePlus): host `127.0.0.1`, port **33061**
- User `root`, password `root`

```powershell
# Akses CLI MySQL
docker exec -it wecycle-db mysql -uroot -proot we-cycle

# Backup
docker exec wecycle-db mysqldump -uroot -proot we-cycle > backup.sql
```

Dump `we-cycle.sql` hanya di-import otomatis saat volume database pertama kali dibuat.
Untuk mengulang dari nol:

```powershell
docker compose down -v
docker compose up -d
docker exec wecycle-app php artisan migrate --force
docker exec wecycle-app php artisan db:seed --class=FreshDataSeeder --force
```

## Catatan performa

Bind mount Windows → container sangat lambat (~20-35 ms per akses file). Tanpa penanganan,
satu request Laravel memakan ~25 detik. Karena itu:

- `vendor/` dan `storage/framework` dilayani dari volume internal container, bukan dari
  folder Windows. Ini memangkas request menjadi ~1 detik.
- OPcache aktif dengan `validate_timestamps=1`, jadi **perubahan kode di `app/`,
  `routes/`, `resources/` tetap langsung terbaca** tanpa perlu restart.

Konsekuensinya: kalau menjalankan `composer install`/`composer require`, jalankan di dalam
container (`docker exec -it wecycle-app composer install`) supaya menulis ke volume yang
benar. Kalau `vendor/` di Windows berubah dan ingin disinkronkan, rebuild image:

```powershell
docker compose up -d --build app
```
