# Dokumentasi Debugging (Log Error & Perbaikan)
## Aplikasi Pengaduan Sarana Sekolah

Dokumen ini mencatat masalah teknis (error) yang ditemukan selama proses pengembangan aplikasi dan langkah-langkah yang dilakukan untuk memperbaikinya (Debugging).

| No | Masalah / Error Message | Penyebab | Solusi / Perbaikan |
| :--- | :--- | :--- | :--- |
| 1 | `Target class [ComplaintController] does not exist.` | Route di `web.php` memanggil Controller yang belum di-import atau salah namespace. | Menambahkan `use App\Http\Controllers\ComplaintController;` di bagian atas file `web.php`. |
| 2 | `SQLSTATE[HY000]: General error: 1 no such table: complaints` | Tabel belum dibuat di database karena lupa menjalankan migrasi. | Menjalankan perintah `php artisan migrate` di terminal untuk membuat tabel. |
| 3 | `Attempt to read property "name" on null` (di file `index.blade.php`) | Mencoba menampilkan nama pelapor (`$complaint->user->name`) padahal relasi user belum dimuat atau data user terhapus. | Memastikan data user ada. Untuk kasus anonim, tambahkan pengecekan `@if($complaint->user)` atau gunakan operator *null coalesce* (`??`). |
| 4 | Gambar bukti tidak muncul (`404 Not Found`) | File tersimpan di `storage/app/public` tapi browser tidak bisa akses karena belum ada *symbolic link*. | Menjalankan perintah `php artisan storage:link` agar folder publik bisa membaca file storage. |
| 5 | `403 This action is unauthorized.` | User mencoba melihat detail pengaduan milik orang lain. | Menambahkan Policy atau pengecekan di controller: `if ($complaint->user_id !== Auth::id()) abort(403);`. |
| 6 | Data tidak tersimpan saat Submit Form | Lupa menambahkan atribut `enctype="multipart/form-data"` pada tag `<form>`. | Menambahkan `enctype` pada form agar bisa mengunggah file gambar. |
| 7 | `Route [login] not defined.` | Middleware `auth` mencoba mengarahkan user yang belum login, tapi route login belum diberi nama. | Memastikan route login punya nama: `Route::get('/login', ...)->name('login');`. |
| 8 | Tampilan berantakan (CSS tidak load) | Asset Vite belum dijalankan atau tidak terkoneksi. | Menjalankan `npm run dev` di terminal terpisah selama pengembangan. |

### Tips Debugging Lanjutan:
1.  **Gunakan `dd($variabel)`:** Fitur Laravel `dump and die` sangat berguna untuk melihat isi data sebelum diproses lebih lanjut.
2.  **Cek Laravel Log:** Jika terjadi *Server Error (500)*, buka file profil `storage/logs/laravel.log` untuk melihat detail error yang sebenarnya.
3.  **Browser Console:** Tekan F12 di browser untuk melihat jika ada error JavaScript atau network request yang gagal.
