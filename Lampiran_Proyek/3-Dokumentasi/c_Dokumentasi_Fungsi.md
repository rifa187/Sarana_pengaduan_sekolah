# Dokumentasi Fungsi / Prosedur Controller

1. **Role-Based Routing:**
   - Aplikasi menggunakan Middleware Auth Laravel tingkat lanjut yang dipadukan dengan pengecekan enum `role` untuk memisahkan akses `Admin` dan `Siswa`. Rute siswa dikelompokkan dalam prefix `/student` sedangkan admin di `/admin`.

2. **Auth Controller (Login & Register):**
   - `login(Request $request)`: Melakukan prosedur validasi input form login, menggunakan `Auth::attempt()`, lalu mengalihkan pengguna ke dashboard fungsional yang sesuai.
   - `register(Request $request)`: Menyimpan data pengguna baru secara spesifik untuk `role = siswa` ke dalam database `users` dilanjutkan dengan proses enkripsi kata sandi.

3. **ComplaintController (User/Siswa):**
   - `index()`: Memanggil fungsi Eloquent `where('user_id', Auth::id())` untuk mengambil hanya daftar pengaduan milik pengguna yang sedang login.
   - `store(Request $request)`: Fungsi pemrosesan input form, memfasilitasi logika peyimpanan `upload` file bukti ke folder penyimpanan publik, dan merekam entitas ke tabel `complaints` dengan default status `menunggu`.

4. **Admin/ComplaintController (Admin):**
   - `index()`: Mengambil seluruh data pengaduan semua pengguna terkait `users` (eager loading).
   - `show(Complaint $complaint)`: Menampilkan detail laporan, file gambar, serta UI form untuk merespon atau mengubah tahapan status administrasi laporan tersebut.
   - `update(Request $request, Complaint $complaint)`: Mengeksekusi query Builder pembaruan kolom `status` sesuai dengan proses yang ditentukan.
   - `storeResponse(Request $request, Complaint $complaint)`: Menyisipkan catatan aksi balasan ke dalam relasi entitas tabel `responses`.
