# Dokumentasi Fungsi dan Prosedur
## Aplikasi Pengaduan Sarana Sekolah

Dokumen ini menjelaskan fungsi-fungsi (Functions) dan prosedur (Procedures) utama yang digunakan dalam backend aplikasi, khususnya pada bagian *Controller* (Pengendali Logika).

### 1. ComplaintController (Logika Siswa)
Mengatur segala aktivitas yang berhubungan dengan pengaduan dari sisi siswa.

#### a. `index()`
*   **Tujuan:** Menampilkan daftar pengaduan milik siswa yang sedang login.
*   **Logika:**
    1.  Mengambil ID user yang sedang login (`Auth::id()`).
    2.  Melakukan *query* ke tabel `complaints` dengan filter `where('user_id', ...)` dan urutan terbaru (`latest()`).
    3.  Mengirim data ke tampilan `student.complaints.index`.

#### b. `store(Request $request)`
*   **Tujuan:** Menyimpan data pengaduan baru ke database.
*   **Prosedur:**
    1.  **Validasi Input:** Mengecek apakah judul, kategori, dan deskripsi sudah terisi. Mengecek apakah file bukti (jika ada) sesuai format (jpg/png/pdf) dan ukuran (max 2MB).
    2.  **Persiapan Data:** Mengisi `user_id` otomatis dari sesi login. Menetapkan status awal sebagai `menunggu`.
    3.  **Simpan File:** Jika ada bukti foto, file disimpan ke folder `public/storage`.
    4.  **Insert Database:** Data disimpan ke tabel `complaints`.
    5.  **Redirect:** Mengarahkan kembali ke halaman daftar dengan pesan sukses.

#### c. `show(Complaint $complaint)`
*   **Tujuan:** Menampilkan detail satu pengaduan beserta tanggapannya.
*   **Logika:**
    1.  Menerima parameter `$complaint` (Model Binding).
    2.  **Otorisasi:** Mengecek apakah pengaduan ini benar milik siswa yang login (Fitur keamanan `authorize`).
    3.  Mengirim data ke tampilan `student.complaints.show`.

### 2. AdminController (Logika Admin)
Mengatur pengelolaan data oleh pihak sekolah.

#### a. `index()` (Dashboard)
*   **Tujuan:** Menampilkan statistik ringkasan di halaman utama admin.
*   **Logika:**
    1.  Menghitung jumlah total pengaduan (`count()`).
    2.  Menghitung jumlah pengaduan berdasarkan status masing-masing (Menunggu, Diproses, Selesai).
    3.  Mengambil 5 data terbaru untuk ditampilkan di widget "Pengaduan Terbaru".

#### b. `complaints(Request $request)` (Filter)
*   **Tujuan:** Menampilkan daftar semua pengaduan dengan fitur penyaringan (filter).
*   **Prosedur:**
    1.  Membuat *query builder* awal.
    2.  **Cek Filter:** Jika ada parameter `status` di URL (misal `?status=menunggu`), tambahkan kondisi `where` ke query.
    3.  **Paginasi:** Membatasi tampilan 10 data per halaman (`paginate(10)`).

#### c. `updateStatus(Request $request, Complaint $complaint)`
*   **Tujuan:** Mengubah status pengerjaan laporan.
*   **Prosedur:**
    1.  Validasi input status (harus salah satu dari: menunggu, diproses, selesai, ditolak).
    2.  Melakukan update kolom `status` pada data pengaduan yang dipilih.
    3.  Kembali ke halaman sebelumnya dengan notifikasi berhasil.

### 3. ResponseController (Tanggapan)

#### a. `store(Request $request, Complaint $complaint)`
*   **Tujuan:** Menyimpan balasan admin terhadap suatu pengaduan.
*   **Prosedur:**
    1.  Validasi isi pesan tanggapan.
    2.  Menyimpan data ke tabel `responses` dengan menyertakan ID Pengaduan dan ID Admin.
    3.  (Opsional) Sekaligus mengupdate status pengaduan jika dipilih di form.

---
**Catatan Teknis:**
Semua fungsi di atas ditulis menggunakan prinsip **MVC (Model-View-Controller)** yang memisahkan logika (Controller), data (Model), dan tampilan (View) agar kode rapi dan mudah dikembangkan.
