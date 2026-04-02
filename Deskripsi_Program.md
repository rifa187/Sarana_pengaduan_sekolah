# Deskripsi Program
## Aplikasi Pengaduan Sarana Sekolah

### 1. Latar Belakang
Aplikasi ini dikembangkan untuk memenuhi kebutuhan Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak. Tujuannya adalah menyediakan wadah digital bagi siswa untuk menyampaikan aspirasi atau laporan kerusakan sarana prasarana sekolah secara cepat, terdata, dan transparan.

### 2. Fitur Utama

#### A. Aktor: Siswa
*   **Buat Pengaduan:** Mengisi formulir pengaduan (Judul, Kategori, Deskripsi, Lampiran Foto).
*   **Mode Anonim:** Bisa memilih untuk menyembunyikan identitas pelapor.
*   **Riwayat Pengaduan:** Melihat daftar pengaduan yang pernah dibuat beserta statusnya.
*   **Lihat Tanggapan:** Melihat balasan atau update dari pihak sekolah (Admin).

#### B. Aktor: Admin (Sekolah)
*   **Dashboard Statistik:** Melihat ringkasan jumlah laporan Menunggu, Diproses, dan Selesai.
*   **Manajemen Pengaduan:** Melihat detail laporan masuk.
*   **Verifikasi & Validasi:** Mengubah status laporan (Menunggu -> Diproses -> Selesai / Ditolak).
*   **Berikan Tanggapan:** Menulis balasan resmi kepada siswa terkait laporan.
*   **Filter Data:** Menyaring laporan berdasarkan status untuk memudahkan pekerjaan.

### 3. Teknologi yang Digunakan
*   **Bahasa Pemrograman:** PHP 8.2+
*   **Framework:** Laravel 11.x (MVC Architecture)
*   **Database:** SQLite / MySQL
*   **Frontend:** Blade Templating Engine + Tailwind CSS
*   **Server:** Apache / Nginx (via Laragon/XAMPP)

### 4. Alur Kerja Sistem (Flowchart Singkat)
1.  **Start:** Siswa Login dengan NIS & Password.
2.  **Input:** Siswa mengisi form pengaduan & upload bukti.
3.  **Proses:** Data tersimpan di database dengan status "Menunggu".
4.  **Admin:** Admin menerima notifikasi data baru di dashboard.
5.  **Verifikasi:** Admin mengecek validitas laporan.
    *   Jika Valid -> Ubah status "Diproses".
    *   Jika Tidak Valid -> Ubah status "Ditolak".
6.  **Tindak Lanjut:** Admin melakukan perbaikan di lapangan.
7.  **Selesai:** Admin mengupdate status "Selesai" dan memberi tanggapan.
8.  **Output:** Siswa melihat status "Selesai" di dashboard mereka.

---
*Dibuat untuk Tugas Praktik Kompetensi Keahlian RPL Tahun Pelajaran 2025/2026*
