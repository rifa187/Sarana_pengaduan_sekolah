# Panduan Setup Project di Laptop Baru

Dokumen ini berisi langkah-langkah lengkap untuk menjalankan project **Sarana Pengaduan Sekolah** ini di laptop atau komputer lain dari awal.

## 1. Persiapan Software (Wajib Install)
Pastikan software berikut sudah terinstall di laptop baru:

1.  **XAMPP** (atau Laragon)
    *   Pastikan versi PHP minimal **8.2**.
    *   Aktifkan ekstensi `fileinfo`, `pdo_sqlite`, `sqlite3` di `php.ini` (biasanya sudah aktif default).
2.  **Composer** (Dependency Manager untuk PHP)
    *   Download di [getcomposer.org](https://getcomposer.org/).
3.  **Node.js** (Untuk menjalankan Vite & Tailwind)
    *   Download versi LTS di [nodejs.org](https://nodejs.org/).
4.  **Git** (Opsional, tapi sangat disarankan)
    *   Download di [git-scm.com](https://git-scm.com/).
5.  **Visual Studio Code** (Text Editor)

---

## 2. Mendapatkan Project (Copy atau Clone)

Ada dua cara untuk memindahkan project:

**Cara A: Menggunakan Git (Disarankan)**
Jika project ini ada di GitHub/GitLab:
```bash
git clone <url-repository-anda>
cd nama-folder-project
```

**Cara B: Copy Manual (Flashdisk/Google Drive)**
1.  Copy seluruh folder project dari laptop lama.
2.  **PENTING:** Hapus folder `vendor` dan `node_modules` sebelum di-copy (agar proses copy lebih cepat & bersih). Folder ini akan di-generate ulang nanti.
3.  Paste di laptop baru (misal di `C:\xampp\htdocs` atau folder kerja Anda).

---

## 3. Install Dependencies

Buka terminal (Command Prompt/PowerShell/Git Bash) di dalam folder project, lalu jalankan perintah berikut secara berurutan:

### Install Library PHP (Laravel)
```bash
composer install
```
*Tunggu hingga proses selesai.*

### Install Library JavaScript (Tailwind & Vite)
```bash
npm install
```
*Tunggu hingga proses selesai.*

---

## 4. Konfigurasi Environment (.env)

Laravel butuh file `.env` untuk konfigurasi database & aplikasi.

1.  Duplicate file `.env.example` dan ubah namanya menjadi `.env`.
    *   Di Windows (Command Prompt):
        ```bash
        copy .env.example .env
        ```
    *   Di Terminal (Git Bash/Mac/Linux):
        ```bash
        cp .env.example .env
        ```

2.  Generate Key Aplikasi:
    ```bash
    php artisan key:generate
    ```

3.  Konfigurasi Database (SQLite):
    *   Buka file `.env` yang baru dibuat.
    *   Cari bagian `DB_CONNECTION`. Ubah menjadi:
        ```bash
        DB_CONNECTION=sqlite
        # DB_HOST=127.0.0.1  <-- Beri komentar (#) atau hapus baris ini
        # DB_PORT=3306       <-- Beri komentar (#) atau hapus baris ini
        # DB_DATABASE=laravel <-- Beri komentar (#) atau hapus baris ini
        # DB_USERNAME=root   <-- Beri komentar (#) atau hapus baris ini
        # DB_PASSWORD=       <-- Beri komentar (#) atau hapus baris ini
        ```
    *   **PENTING**: Buat file database kosong.
        *   Di Windows (Command Prompt):
            ```bash
            type nul > database/database.sqlite
            ```
        *   Di Terminal (Git Bash/Mac/Linux):
            ```bash
            touch database/database.sqlite
            ```

---

## 5. Migrasi & Seeding Database

Jalankan perintah ini untuk membuat tabel-tabel database dan mengisi data awal (akun admin & siswa):

```bash
php artisan migrate --seed
```
*Jika muncul pertanyaan "Do you really wish to run this command?", ketik `yes` lalu Enter.*

---

## 6. Menjalankan Project

Untuk menjalankan project, Anda butuh **DUA** terminal yang berjalan bersamaan:

**Terminal 1 (Menjalankan Laravel Server):**
```bash
php artisan serve
```
*Project akan berjalan di `http://127.0.0.1:8000`*

**Terminal 2 (Menjalankan Vite/Tailwind untuk Tampilan):**
```bash
npm run dev
```
*Biarkan terminal ini terbuka selama Anda bekerja agar perubahan tampilan (CSS/JS) langsung terlihat.*

---

## 7. Akun Login Default (Dari Seeder)

Gunakan akun ini untuk login pertama kali:

**Administrator:**
*   **NIS / Login ID:** `admin`
*   **Password:** `password`

**Siswa:**
*   **NIS / Login ID:** `12345678`
*   **Password:** `password`

---

## Masalah Umum (Troubleshooting)

*   **Error "Vite manifest not found":**
    *   Solusi: Jalankan `npm run build` sekali, atau pastikan `npm run dev` sedang berjalan di terminal lain.
*   **Error "Table not found":**
    *   Solusi: Pastikan sudah menjalankan `php artisan migrate`.
*   **Error "Permission denied" (Storage/Log):**
    *   Solusi: Hapus file di folder `storage/logs/` (kecuali .gitignore) atau pastikan folder `storage` dan `bootstrap/cache` memiliki izin *write*.
