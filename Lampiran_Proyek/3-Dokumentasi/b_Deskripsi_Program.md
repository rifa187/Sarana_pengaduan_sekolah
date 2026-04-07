# Dokumentasi Proyek: Web Pengaduan Siswa 

## 1. Deskripsi Singkat Web 
Web Pengaduan Siswa adalah sebuah platform pelayanan aduan berbasis web yang dibangun menggunakan framework Laravel 11 dengan desain antarmuka menggunakan Tailwind CSS. Aplikasi ini dirancang khusus untuk memfasilitasi pelaporan keluhan terkait kerusakan atau kekurangan sarana dan prasarana sekolah oleh Siswa kepada pihak administrasi sekolah. 

Dengan penerapan sistem hak akses (Role-Based Access Control), aplikasi memisahkan alur kerja antara Siswa (sebagai pihak pelapor) dan Admin (sebagai pihak sekolah yang menindak status laporan). Sistem ini mendorong transparansi, kecepatan respons tanggapan dari pihak sekolah, dan menjaga kerahasiaan pengaduan dalam alur kerja berbasis digital. 

## 2. Penjelasan Fitur-Fitur Aplikasi Utama 

### A. Hak Akses Siswa (Student Features) 
Hak akses ini diberikan khusus untuk siswa dengan memanfaatkan data internal, yaitu login menggunakan Nomor Induk Siswa (NIS). 
- **Autentikasi Aman Berbasis NIS:** Sistem otentikasi login menggunakan kredensial berupa NIS dan password untuk memastikan hanya siswa terdaftar di sekolah tersebut yang dapat mengakses dan melapor. Password akun siswa secara default disamakan dengan NIS masing-masing. 
- **Dashboard Siswa:** Halaman beranda utama siswa yang menampilkan pesan sambutan personal serta dua pintasan aksi utama: membuat laporan pengaduan baru dan mengakses riwayat laporan yang pernah dikirim. 
- **Form Buat Laporan Pengaduan:** Fitur utama tempat siswa melayangkan aduan. Siswa mengisi Judul Laporan, memilih "Kategori Laporan" (Sarana, Prasarana, Layanan Umum, atau Lainnya), melengkapi "Deskripsi/Kronologi Laporan", serta dapat mengunggah foto atau dokumen PDF sebagai bukti pendukung, lalu mengirimkannya ke pihak admin sekolah. 
- **Riwayat Laporan (History & Tracking):** Halaman pelacakan komprehensif. Siswa dapat memonitor setiap aduan yang pernah dibuat beserta Status Terkini yang ditampilkan dengan badge berwarna (Menunggu, Diproses, Selesai, atau Ditolak). Siswa juga bisa membaca Tanggapan/Respons langsung dari pihak sekolah melalui halaman detail laporan. 

### B. Hak Akses Admin (Admin Features) 
Hak akses ini dikhususkan bagi staf administrasi atau pihak berwenang di sekolah untuk menangani dan memproses seluruh laporan yang masuk melalui Admin Portal yang terpisah dari portal siswa. 
- **Admin Dashboard Terpusat:** Panel analitik utama yang berisi 4 kartu statistik agregat (Total Pengaduan, Menunggu Verifikasi, Sedang Diproses, Selesai Ditangani), tabel 5 laporan terbaru yang siap ditindaklanjuti, serta modul import data siswa secara massal. 
- **Manajemen Data Laporan:** Admin dapat melihat daftar seluruh keluhan masuk dengan fitur filter berdasarkan status, memvalidasi bukti lampiran foto/PDF, lalu memperbarui Status Tindak Lanjut melalui dropdown pilihan (Menunggu, Diproses, Selesai, Ditolak) yang langsung dapat dipantau oleh siswa pelapor. 
- **Import Data Siswa via Excel/CSV:** Admin dapat mendaftarkan banyak siswa sekaligus dengan mengunggah file spreadsheet (format .xlsx, .xls, atau .csv). Sistem secara otomatis mengenali berbagai variasi nama kolom yang umum digunakan serta mengabaikan kolom yang tidak relevan. 
- **Proteksi Keamanan Rute:** Semua fitur Admin diproteksi penuh dengan middleware autentikasi, sehingga pengguna biasa (Siswa) tidak bisa melakukan intervensi ke dalam halaman manajerial sekolah. 

## 3. Lampiran Screenshot Antarmuka Web 

*(Silakan salin (Copy) bagian ini ke Ms. Word Anda, lalu sisipkan gambar hasil screenshot aplikasi / web browser Anda untuk melengkapi laporannya)*

**Halaman Utama (Landing Page)** 
> Keterangan: Antarmuka beranda publik yang menampilkan deskripsi aplikasi, preview card laporan interaktif, dan tombol akses menuju portal siswa maupun portal admin. 

[ SISIPKAN GAMBAR SCREENSHOT DI SINI ]
<br><br>

**Halaman Login Siswa** 
> Keterangan: Antarmuka autentikasi login siswa menggunakan kredensial NIS dan password untuk mengakses sistem web pengaduan. 

[ SISIPKAN GAMBAR SCREENSHOT DI SINI ]
<br><br>

**Dashboard Siswa** 
> Keterangan: Tampilan beranda pribadi siswa setelah login, memuat pesan sambutan personal dan dua aksi utama: membuat laporan baru dan melihat riwayat pengaduan. 

[ SISIPKAN GAMBAR SCREENSHOT DI SINI ]
<br><br>

**Form Pengisian Laporan** 
> Keterangan: Formulir interaktif di mana siswa mengisi judul, memilih kategori, menuliskan deskripsi aduan, dan mengunggah bukti foto/PDF ke sistem. 

[ SISIPKAN GAMBAR SCREENSHOT DI SINI ]
<br><br>

**Halaman Riwayat & Tanggapan Siswa** 
> Keterangan: Tabel pelacakan historis dari daftar laporan siswa, memuat badge status berwarna dan tombol detail untuk melihat umpan balik dari pihak sekolah. 

[ SISIPKAN GAMBAR SCREENSHOT DI SINI ]
<br><br>

**Dashboard Admin Sekolah** 
> Keterangan: Panel pantauan utama berisi 4 kartu statistik laporan, tabel laporan terbaru, dan modul import data siswa massal via Excel/CSV. 

[ SISIPKAN GAMBAR SCREENSHOT DI SINI ]
<br><br>

**Halaman Manajemen Status & Evaluasi Laporan** 
> Keterangan: Antarmuka yang digunakan pihak sekolah untuk memeriksa detail aduan, memverifikasi bukti lampiran, dan memperbarui dropdown status tindak lanjut kepada siswa pelapor.

[ SISIPKAN GAMBAR SCREENSHOT DI SINI ]
