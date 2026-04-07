# SKENARIO PENGUJIAN (DEBUGGING & TESTING) SAAT UKK

Berikut adalah 2 Skenario Pengujian yang sangat direkomendasikan untuk Anda demokan dan jalankan di depan penguji saat presentasi UKK untuk membuktikan bahwa aplikasi Anda stabil, aman, dan berfungsi penuh:

## Skenario 1: *End-to-End Core Flow* (Alur Utama Pengaduan)
**Tujuan:** Membuktikan bahwa fitur utama beroperasi dengan benar dan *Role-Based Access Control* (RBAC) antar peran berjalan sempurna.
**Aktor:** Siswa dan Petugas/Admin

**Langkah-langkah Demo:**
1. **Siswa Melapor:** Login menggunakan akun **Siswa**. Buka halaman ajukan pengaduan, isi keluhan secara lengkap dan *upload* sebuah gambar bukti, lalu submit.
2. **Cek Status Awal:** Tunjukkan kepada penguji di dashboard siswa bahwa laporan baru saja masuk dengan status masih **"Pending"** (Belum Diproses).
3. **Pindah Peran:** Logout dari akun siswa, lalu Login menggunakan akun **Petugas/Admin**.
4. **Proses Laporan:** Arahkan ke menu daftar pengaduan masuk. Buka laporan dari siswa tadi, lalu berikan sebuah **Tanggapan/Balasan** dan ubah status laporan menjadi **"Selesai"** (atau "Diproses").
5. **Validasi Akhir:** Logout dari Petugas. Login kembali menggunakan akun **Siswa** di langkah 1. Tunjukkan kepada penguji bahwa laporan di dashboard siswa statusnya telah berubah menjadi **"Selesai"** dan tanggapan dari petugas sudah muncul.

---

## Skenario 2: *Error Handling & Security* (Uji Keamanan & Validasi Input)
**Tujuan:** Membuktikan kepada penguji bahwa aplikasi tidak akan *crash/error* (muncul layar kuning Laravel) ketika user melakukan kesalahan, melainkan memberikan peringatan ke user.
**Aktor:** Admin (dan/atau) Siswa

**Langkah-langkah Demo (Pilih salah satu atau demokan keduanya):**

*   **Uji A (Validasi Upload / Import Excel):**
    1. Login sebagai **Admin**, masuk ke fitur **Import Data Siswa**.
    2. Sengaja lakukan kesalahan dengan meng-upload file yang formatnya salah (misalnya upload file gambar `.jpg` atau file `.pdf`, atau upload file Excel yang formatnya berantakan).
    3. Tunjukkan kepada penguji bahwa sistem menolak file tersebut dan menampilkan **Notifikasi/Pesan Peringatan Error** (contoh: *"Format file harus xlsx/xls..."*). 
    *(Ini membuktikan sistem validasi form Laravel bekerja).*

*   **Uji B (Uji Keamanan Akses URL - Middleware):**
    1. Login sebagai **Siswa**.
    2. Perhatikan URL di *address bar* browser. Posisinya mungkin di `localhost:8000/siswa/dashboard`.
    3. Sengaja coba akses URL admin dengan mengetik paksa di *address bar*: `localhost:8000/admin/dashboard` lalu tekan Enter.
    4. Tunjukkan kepada penguji bahwa siswa **tidak bisa menembus** masuk ke halaman admin. Aplikasi akan langsung menjaga keamanan dan me-lempar (*redirect*) paksa ke halaman sebelumnya atau menampilkan peringatan *"Anda tidak memiliki akses (Unathorized)"*. 
    *(Ini membuktikan pengamanan sistem Middleware/Roles Anda sudah tingkat lanjut).*
