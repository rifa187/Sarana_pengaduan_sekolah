# 📋 PANDUAN LENGKAP JAWABAN UKK - Sarana Pengaduan Sekolah

**Program:** Sistem Informasi Pengaduan Sarana Sekolah  
**Platform:** Web Application dengan Laravel 11  
**Tanggal:** 2026

---

## 🎯 PENGANTAR PROGRAM
Program yang saya buat adalah aplikasi **web untuk mengelola pengaduan sarana sekolah**. Melalui program ini, siswa dapat melaporkan masalah sarana/prasarana sekolah dengan mudah, dan admin dapat memproses laporan tersebut dengan efisien. Konsepnya seperti sistem ticket support tetapi kami terapkan untuk kebutuhan sekolah kami.

---

# ✅ JAWABAN UNTUK SETIAP ELEMEN KOMPETENSI

## **KRITERIA ELEMEN KOMPETENSI UTAMA**

---

### **1.1 Menerapkan Struktur Data dan Akses terhadap Struktur Data Tersebut**


**PENJELASAN MUDAH:**
Jadi, untuk program saya ini, saya membuat beberapa struktur data agar informasi tersimpan dengan teratur dan mudah diakses. Berikut adalah struktur data utama yang saya buat:

**STRUKTUR DATA UTAMA:**

1. **Struktur Data User (Pengguna)**
   - **File:** [app/Models/User.php](app/Models/User.php)
   - **Data yang disimpan:**
     - `nis` = Nomor Induk Siswa (untuk login)
     - `name` = Nama lengkap
     - `email` = Email pengguna
     - `role` = Peran (admin atau siswa)
     - `password` = Kata sandi (dienkripsi)

   **Cara mengakses:**
   ```php
   // Di UserController atau model apapun
   $user = Auth::user();  // Ambil data user yang login sekarang
   echo $user->name;      // Akses nama user
   if($user->role === 'admin') { // Cek apakah role admin
       // Lakukan sesuatu
   }
   ```

2. **Struktur Data Complaint (Pengaduan)**
   - **File:** [app/Models/Complaint.php](app/Models/Complaint.php)
   - **Data yang disimpan:**
     - `judul` = Judul pengaduan (misal: "Meja rusak")
     - `kategori` = Kategori (Sarana, Prasarana, Kesiswaan)
     - `deskripsi` = Penjelasan detail
     - `bukti_file` = File bukti/foto
     - `status` = Status pengaduan (menunggu, diproses, selesai, ditolak)

   **Cara mengakses:**
   ```php
   // Di ComplaintController atau form
   $complaint = Complaint::find(1); // Ambil pengaduan ID 1
   echo $complaint->judul;          // Lihat judulnya
   echo $complaint->status;         // Lihat status pengaduan
   
   // Mengakses user yang buat pengaduan
   echo $complaint->user->name;     // Lihat nama siswa pembuat
   ```

3. **Struktur Data Response (Balasan dari Admin)**
   - **File:** [app/Models/Response.php](app/Models/Response.php)
   - **Data yang disimpan:**
     - `complaint_id` = ID pengaduan yang dibalas
     - `admin_id` = ID admin yang memberi balasan
     - `respon` = Teks balasan dari admin

   **Cara mengakses:**
   ```php
   $complaint = Complaint::find(1);
   $responses = $complaint->responses; // Ambil semua balasan
   foreach($responses as $response) {
       echo $response->respon;         // Lihat isi balasan
   }
   ```

---

### **1.2 Menggunakan Metode Pengembangan Program**

**PENJELASAN MUDAH:**
Dalam mengembangkan program ini, saya menggunakan beberapa metode profesional agar kode saya rapi, terorganisir, dan mudah dipelihara. Berikut adalah metode-metode yang saya terapkan:

**METODE YANG DIGUNAKAN:**

1. **Metode Model-View-Controller (MVC)**
   - **Model** = Database dan logika data
   - **View** = Tampilan/interface yang dilihat user
   - **Controller** = Jembatan antara Model dan View
   
   **Implementasi di program:**
   - **Model:** [app/Models/](app/Models/) – Complaint.php, User.php, Response.php
   - **Views:** [resources/views/](resources/views/) – Tampilan student dan admin
   - **Controllers:** [app/Http/Controllers/](app/Http/Controllers/) – Mengelola logika

2. **Metode Service Layer (Pemisahan Logika Bisnis)**
   - **Fungsi:** Pisahkan kode bisnis dari controller agar lebih rapi
   - **File:** [app/Services/](app/Services/)
     - [ComplaintService.php](app/Services/ComplaintService.php) – Logika pengaduan
     - [ResponseService.php](app/Services/ResponseService.php) – Logika balasan
   
   **Contoh penggunaan:**
   ```php
   // Di ComplaintController
   public function store(StoreComplaintRequest $request) {
       $complaint = $this->complaintService->createComplaint(
           $request->validated(),
           $request->file('bukti_file')
       );
       return redirect()->route('complaints.show', $complaint);
   }
   ```

3. **Metode Repository Pattern untuk Database**
   - Model Eloquent ORM untuk komunikasi dengan database
   - Semua query diurus oleh Model, bukan langsung di controller

---

### **1.3 Menggunakan Diagram Program dan Deskripsi Program**

**PENJELASAN MUDAH:**
Dalam membuat program saya, saya telah merancang diagram untuk menunjukkan alur kerja aplikasi secara visual. Ini membantu saya dan developer lain memahami bagaimana program saya bekerja dari awal hingga akhir.

**DIAGRAM ALUR PENGADUAN PROGRAM SAYA:**

```
SISWA LOGIN
    ↓
BUAT PENGADUAN
  (Isi form: Judul, Kategori, Deskripsi, Unggah Bukti)
    ↓
SIMPAN KE DATABASE
  (Status: MENUNGGU)
    ↓
LIHAT DAFTAR PENGADUAN
  (Bisa lihat status)
    ↓
ADMIN LOGIN
    ↓
LIHAT SEMUA PENGADUAN
    ↓
UPDATE STATUS
  (MENUNGGU → DIPROSES → SELESAI/DITOLAK)
    ↓
BERI BALASAN
  (Admin ketik respon)
    ↓
SISWA LIHAT BALASAN
  (Selesai)
```

**DESKRIPSI PROGRAM SAYA:**
Program yang saya buat bekerja dengan cara seperti ini:
1. Saya membuat dua tipe pengguna dengan role berbeda: **Siswa** dan **Admin**
2. Siswa dapat membuat pengaduan baru dengan mengisi data: Judul, Kategori, Deskripsi, dan File Bukti
3. Pengaduan tersimpan di database saya dengan status awal "MENUNGGU"
4. Admin (guru/staff) dapat melihat semua pengaduan dan mengubah statusnya menjadi "DIPROSES" atau "SELESAI" sesuai kondisi
5. Admin dapat memberikan balasan (respon) untuk setiap pengaduan
6. Siswa dapat melihat balasan dari admin pada pengaduan mereka

**File dokumentasi:**
- [Deskripsi_Program.md](Deskripsi_Program.md) – Penjelasan lengkap program
- [Dokumentasi_ERD_Implementasi.md](Dokumentasi_ERD_Implementasi.md) – Diagram database

---

### **1.4 Menerapkan Hasil Pemodelan ke dalam Pengembangan Program**

**PENJELASAN MUDAH:**
Proses kerja saya dimulai dengan membuat model atau rancangan di awal project, kemudian saya implementasikan desain tersebut menjadi kode program yang nyata dan berfungsi.

**PEMODELAN & IMPLEMENTASI YANG SAYA LAKUKAN:**

1. **Database Modeling (Pemodelan Database)**
   - **File rancangan saya:** [Dokumentasi_ERD_Revisi.md](Dokumentasi_ERD_Revisi.md)
   - **Implementasi di kode:** [database/migrations/](database/migrations/)
   
   **Contoh dari pekerjaan saya:**
   - Rancangan awal: "Table User harus memiliki field nis, name, email, dan role untuk membedakan siswa dan admin"
   - Implementasi kode saya: [database/migrations/0001_01_01_000000_create_users_table.php](database/migrations/0001_01_01_000000_create_users_table.php)
   ```php
   Schema::create('users', function (Blueprint $table) {
       $table->id();
       $table->string('nis')->unique()->nullable();
       $table->string('name');
       $table->string('email')->unique();
       $table->enum('role', ['admin', 'siswa']);
       $table->string('password');
       $table->timestamps();
   });
   ```

2. **Business Logic Modeling**
   - **Rancangan saya:** "Setiap pengaduan harus punya status yang berubah-ubah: menunggu, diproses, selesai, atau ditolak"
   - **Implementasi saya:** [app/Models/Complaint.php](app/Models/Complaint.php) + [database/migrations/2026_02_09_120000_create_complaints_table.php](database/migrations/2026_02_09_120000_create_complaints_table.php)

3. **Access Control Modeling (Model Kontrol Akses)**
   - **Rancangan keamanan saya:** "Siswa hanya boleh melihat pengaduan milik mereka sendiri, sementara Admin boleh melihat semua pengaduan"
   - **Implementasi keamanan saya:** [app/Policies/ComplaintPolicy.php](app/Policies/ComplaintPolicy.php)
   ```php
   public function view(User $user, Complaint $complaint)
   {
       // Admin bisa lihat semua, atau siswa bisa lihat milik sendiri
       return $user->role === 'admin' || $user->id === $complaint->user_id;
   }
   ```

---

### **1.5 Mengeksekusi Source Code**

**PENJELASAN MUDAH:**
Mengeksekusi source code berarti menjalankan program hingga berfungsi di web browser.

**CARA MENGEKSEKUSI PROGRAM INI:**

**Langkah 1: Install Dependensi**
```bash
# Unduh library/paket yang dibutuhkan
composer install
```
**Lokasi:** Folder [vendor/](vendor/) akan terisi dengan paket Laravel dan lainnya

**Langkah 2: Setup Database**
```bash
# Buat file .env dari template
cp .env.example .env

# Generate APP_KEY
php artisan key:generate

# Jalankan migrasi (buat tabel database)
php artisan migrate

# Isi data awal (kalau ada seeder)
php artisan db:seed
```
**Lokasi:** [database/migrations/](database/migrations/) – Semua file migrasi

**Langkah 3: Jalankan Development Server**
```bash
# Terminal 1: Jalankan Laravel server
php artisan serve

# Terminal 2: Compile CSS/JS dengan Vite
npm run dev
```

**Langkah 4: Akses di Browser**
```
http://localhost:8000
```

**File yang dieksekusi saat program berjalan:**
- [public/index.php](public/index.php) – Entry point aplikasi
- [routes/web.php](routes/web.php) – Daftar route/URL
- [bootstrap/app.php](bootstrap/app.php) – Inisialisasi aplikasi
- [app/Http/Controllers/](app/Http/Controllers/) – Controller yang menangani request

---

### **1.6 Memilih Tools Pemrograman yang Sesuai dengan Kebutuhan**

**PENJELASAN MUDAH:**
Dalam membuat program ini, saya memilih beberapa tools/alat yang tepat sesuai dengan kebutuhan project saya. Setiap tool yang saya pilih memiliki alasan spesifik mengapa cocok untuk program saya.

**TOOLS YANG SAYA PILIH & ALASAN:**

| Tool | Kegunaan | Alasan Dipilih |
|------|----------|---|
| **Laravel 11** | Framework PHP | Cepat, aman, built-in database, authentication, authorization |
| **MySQL/MariaDB** | Database | Reliable, mudah, support relasi (foreign key) |
| **Blade** | Template Engine | Built-in Laravel, mudah belajar |
| **Tailwind CSS** | Styling | Responsive, modern, utility-first |
| **Vite** | Build tool | Cepat, modern, menggantikan Webpack 5 |
| **Composer** | Package Manager PHP | Mudah install library |
| **npm** | Package Manager JS | Untuk dependency frontend |
| **Spatie Permission** | Authorization | Role-based access control |
| **Maatwebsite/Laravel-Excel** | File Upload Excel | Import data siswa dari Excel mudah |
| **PHPUnit** | Testing | Testing framework untuk quality assurance |

**File konfigurasi tools:**
- [composer.json](composer.json) – Daftar package PHP
- [package.json](package.json) – Daftar package JavaScript
- [vite.config.js](vite.config.js) – Konfigurasi Vite
- [config/](config/) – Konfigurasi Laravel

---

### **1.7 Instalasi Tool Pemrograman**

**PENJELASAN MUDAH:**
Sebelum saya mulai coding, saya harus mempersiapkan dan menginstal semua tools yang diperlukan. Berikut adalah langkah-langkah instalasi yang saya lakukan dari awal:

**LANGKAH-LANGKAH INSTALASI:**

**1. Instalasi PHP 8.2+**
   - Download dari php.net atau pakai Laragon/XAMPP
   - Cek versi: `php --version`

**2. Instalasi Composer**
   - Download dari getcomposer.org
   - Cek versi: `composer --version`
   - Fungsi: Install package PHP

**3. Instalasi Node.js & npm**
   - Download dari nodejs.org
   - Cek versi: `node --version` dan `npm --version`
   - Fungsi: Install package JavaScript

**4. Instalasi Laravel**
   ```bash
   composer global require laravel/installer
   laravel new nama_project
   ```

**5. Instalasi Git**
   - Download dari git-scm.com
   - Fungsi: Version control, tracking perubahan kode

**6. Instalasi Database Software**
   - MySQL atau MariaDB
   - Setup user dan password database
   - Fungsi: Tempat menyimpan data

**7. Instalasi Code Editor**
   - Visual Studio Code (gratis)
   - Atau PHPStorm (berbayar)
   - Fungsi: Tempat menulis kode

**File hasil instalasi di program ini:**
- [vendor/](vendor/) – Package PHP (setelah `composer install`)
- [node_modules/](node_modules/) – Package JavaScript (setelah `npm install`)

---

### **1.8 Menerapkan Hasil Pemodelan ke dalam Eksekusi Script Sederhana**

**PENJELASAN MUDAH:**
Setelah merencanakan, saya membuat beberapa script/kode sederhana yang langsung mengimplementasikan model yang telah saya rancang sebelumnya.

**CONTOH 1: Membuat Pengaduan Baru (Simple Script)**

**Model/Rancangan saya:**
- Input yang dibutuhkan: judul, kategori, deskripsi, bukti_file
- Output yang diharapkan: Simpan ke database dengan status "menunggu"

**Script Implementasi yang saya buat:**
**File saya:** [app/Services/ComplaintService.php](app/Services/ComplaintService.php)

```php
public function createComplaint(array $data, ?UploadedFile $file)
{
    // 1. Jika ada file, simpan ke storage
    if ($file) {
        $filePath = $file->store('complaints', 'public');
        $data['bukti_file'] = $filePath;
    }
    
    // 2. Simpan complaint ke database
    return Complaint::create($data);
}
```

**Cara bagaimana saya gunakan di Controller:**
**File saya:** [app/Http/Controllers/ComplaintController.php](app/Http/Controllers/ComplaintController.php)

```php
public function store(StoreComplaintRequest $request)
{
    $complaint = $this->complaintService->createComplaint(
        $request->validated(),
        $request->file('bukti_file')
    );
    return redirect()->route('complaints.index');
}
```

**CONTOH 2: Mengubah Status Pengaduan**

**Model/Rancangan saya:**
- Input: complaint ID, status baru yang ingin diubah
- Output: Update status di database

**Script Implementasi saya:**
**File saya:** [app/Services/ComplaintService.php](app/Services/ComplaintService.php)

```php
public function updateStatus(Complaint $complaint, string $status)
{
    $complaint->update(['status' => $status]);
    return $complaint;
}
```

**CONTOH 3: Ambil Data Siswa Tertentu**

```php
// Script sederhana di Controller
$user = Auth::user();  // Ambil user yang login
$complaints = $user->complaints;  // Ambil pengaduan user itu
```

---

### **1.9 Melakukan Konfigurasi Tools untuk Pemrograman**

**PENJELASAN MUDAH:**
Saat membuat program ini, saya harus melakukan konfigurasi pada berbagai tools agar bekerja sesuai dengan kebutuhan program saya. Berikut adalah konfigurasi-konfigurasi yang saya lakukan:

**KONFIGURASI YANG DILAKUKAN:**

**1. Konfigurasi Laravel (.env file)**
**File saya:** [.env.example](copy ke .env)

Di file ini, saya mengatur nama aplikasi, URL, database connection, dan setting lainnya sesuai kebutuhan program saya.

```env
APP_NAME="Sarana Pengaduan Sekolah"
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pengaduan_sekolah
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_DRIVER=file
```

**2. Konfigurasi Database**
**File saya:** [config/database.php](config/database.php)

Di sini saya mengatur koneksi database saya dengan detail seperti host, port, database name, username, dan password.

```php
'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'pengaduan_sekolah'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
]
```

**3. Konfigurasi Authentication**
**File:** [config/auth.php](config/auth.php)

```php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
],
'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
]
```

**4. Konfigurasi Session untuk Admin**
**File:** [config/session.php](config/session.php) & [app/Http/Middleware/AdminSession.php](app/Http/Middleware/AdminSession.php)

```php
// Middleware AdminSession membuat session admin terpisah
// Sehingga admin bisa login di tab berbeda tanpa logout siswa
```

**5. Konfigurasi Permission/Role**
**File:** [config/permission.php](config/permission.php)

```php
// Konfigurasi Spatie Permission untuk role dan permission
```

**6. Konfigurasi Build Tool (Vite)**
**File:** [vite.config.js](vite.config.js)

```javascript
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
})
```

---

### **1.10 Menggunakan Tools Sesuai Kebutuhan Pembuatan Program**

**PENJELASAN MUDAH:**
Dalam membuat program saya, saya harus tahu bagaimana menggunakan setiap tool dengan tepat untuk tugas-tugas yang berbeda.

**PENGGUNAAN TOOLS DI PROGRAM:**

**1. Menggunakan Artisan (Command Line Laravel)**

```bash
# Membuat Controller baru
php artisan make:controller ComplaintController

# Membuat Model baru
php artisan make:model Complaint -m

# Membuat Migration (untuk buat tabel)
php artisan make:migration create_complaints_table

# Run migration (jalankan migrasi)
php artisan migrate

# Membuat Policy (untuk authorization)
php artisan make:policy ComplaintPolicy

# Membuat Testing Class
php artisan make:test ComplaintTest
```

**2. Menggunakan Composer untuk Install Packages**

```bash
# Install Spatie Permission
composer require spatie/laravel-permission

# Install Laravel Excel
composer require maatwebsite/excel

# Install Faker untuk testing
composer require fakerphp/faker
```

**3. Menggunakan npm untuk Frontend Tools**

```bash
npm install          # Install dependencies
npm run dev         # Jalankan dev build watch
npm run build       # Build production
```

**4. Menggunakan IDE (VS Code)**
- IntelliSense untuk autocomplete kode
- Extension untuk highlight syntax PHP, Blade
- Git integration untuk tracking perubahan

**5. Menggunakan Git untuk Version Control**

```bash
git init              # Inisialisasi git
git add .             # Stage semua file
git commit -m "message"  # Commit dengan pesan
git push              # Push ke remote
```

---

### **1.11 Menerapkan Coding Guidelines dan Best Practices dalam Penulisan Program**

**PENJELASAN MUDAH:**
Saat menulis kode program, saya menerapkan best practices - yaitu aturan dan standar menulis kode yang rapi, mudah dibaca, dan aman. Ini dilakukan agar kode saya berkualitas tinggi dan dapat dirawat dengan mudah di masa depan.

**BEST PRACTICES YANG SAYA TERAPKAN DI PROGRAM INI:**

**1. Naming Convention (Penamaan Variabel & Fungsi)**

**Untuk Class:**
```php
// ✅ BENAR - PascalCase
class ComplaintController { }
class Complaint { }
class UserFactory { }

// ❌ SALAH
class complaint_controller { }
class COMPLAINT { }
```

**Untuk Method/Function:**
```php
// ✅ BENAR - camelCase
public function createComplaint() { }
public function updateStatus() { }
public function getUserComplaints() { }

// ❌ SALAH
public function CreateComplaint() { }
public function update_status() { }
```

**Untuk Variabel:**
```php
// ✅ BENAR
$userName = "Budi";
$complaintId = 1;
$isAdmin = true;

// ❌ SALAH
$user_name = "Budi";  // Gunakan camelCase
$x = 1;              // Nama tidak jelas
$admin = "yes";      // Gunakan boolean
```

**Untuk Database Column:**
```sql
-- ✅ BENAR - snake_case
user_id, complaint_id, created_at, updated_at

-- ❌ SALAH
userId, complaintId - tidak standard di Laravel
```

**2. Code Organization (Organisasi Kode)**

**Struktur Folder yang Rapi:**
```
app/
├── Models/           # Model data
├── Controllers/      # Controller logika
├── Services/         # Business logic
├── Policies/         # Authorization rules
├── Http/
│   ├── Requests/    # Form validation
│   ├── Middleware/  # Custom middleware
└── Imports/         # Data imports

resources/
├── views/           # Template/tampilan
├── css/             # CSS files
└── js/              # JavaScript files

database/
├── migrations/      # Skema database
├── seeders/         # Initial data
└── factories/       # Test factories
```

**3. Single Responsibility Principle (SRP)**

Setiap class/function hanya punya satu tanggung jawab.

```php
// ✅ BENAR - ComplaintService hanya handle complaint logic
class ComplaintService
{
    public function createComplaint($data, $file) { }
    public function updateStatus($complaint, $status) { }
}

// ❌ SALAH - Mencampur responsibility
class ComplaintManager
{
    public function createComplaint() { }    // Create complaint
    public function createUser() { }         // Create user
    public function sendEmail() { }          // Send email
}
```

**4. Validation (Validasi Data)**

Selalu validasi input sebelum proses.

```php
// ✅ BENAR - Validasi di Form Request
class StoreComplaintRequest extends FormRequest
{
    public function rules()
    {
        return [
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'bukti_file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048'
        ];
    }
}

// Digunakan di Controller
public function store(StoreComplaintRequest $request) // Auto-validated!
{
    $complaint = Complaint::create($request->validated());
}
```

**5. Error Handling (Penanganan Error)**

```php
// ✅ BENAR - Handle error dengan try-catch
try {
    $user = User::findOrFail($id);
} catch (ModelNotFoundException $e) {
    return redirect()->route('users.index')
                    ->with('error', 'User tidak ditemukan');
}

// ✅ BENAR - Use policy untuk authorization
$this->authorize('view', $complaint);
```

**6. Comments & Documentation**

```php
// ✅ BENAR - Comment yang jelas
/**
 * Create a new complaint
 * @param array $data - Data pengaduan
 * @param UploadedFile $file - File bukti (optional)
 * @return Complaint
 */
public function createComplaint(array $data, ?UploadedFile $file)
{
    // Process file jika ada
    if ($file) {
        $data['bukti_file'] = $file->store('complaints', 'public');
    }
    
    // Create dan return complaint
    return Complaint::create($data);
}

// ❌ SALAH - Comment tidak jelas
// ini buat complaint
public function createComplaint($data, $file) { }
```

**7. DRY (Don't Repeat Yourself)**

Jangan repeat kode yang sama berkali-kali.

```php
// ❌ SALAH - Repeat kode
public function updateComplaint($id, $data)
{
    $complaint = Complaint::find($id);
    if (!$complaint) {
        return abort(404);
    }
    $complaint->update($data);
}

public function deleteComplaint($id)
{
    $complaint = Complaint::find($id);
    if (!$complaint) {
        return abort(404);
    }
    $complaint->delete();
}

// ✅ BENAR - Gunakan helper/trait
public function updateComplaint($id, $data)
{
    $complaint = Complaint::findOrFail($id);
    $complaint->update($data);
}

public function deleteComplaint($id)
{
    $complaint = Complaint::findOrFail($id);
    $complaint->delete();
}
```

**8. File Upload Security**

```php
// ✅ BENAR - Validasi file dengan ketat
'bukti_file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',

// Simpan di storage (private), bukan public directly
$filePath = $file->store('complaints', 'public');

// ❌ SALAH
$file->move('uploads/');  // Tidak aman
```

**File yang menerapkan best practices:**
- [app/Http/Controllers/ComplaintController.php](app/Http/Controllers/ComplaintController.php) – Proper naming, validation
- [app/Services/ComplaintService.php](app/Services/ComplaintService.php) – SRP, separation of concerns
- [app/Policies/ComplaintPolicy.php](app/Policies/ComplaintPolicy.php) – Authorization handling
- [app/Http/Requests/StoreComplaintRequest.php](app/Http/Requests/StoreComplaintRequest.php) – Validation logic

---

### **1.12 Menggunakan Ukuran Performansi dalam Menuliskan Kode Sumber**

**PENJELASAN MUDAH:**
Performansi program saya sangat penting agar aplikasi berjalan cepat dan efisien. Untuk itu, saya menerapkan beberapa teknik optimasi performa saat menulis kode program.

**OPTIMASI PERFORMA YANG SAYA TERAPKAN:**

**1. Hindari N+1 Query Problem**

```php
// ❌ BURUK (N+1 problem) - Query berkali-kali
$complaints = Complaint::all();
foreach ($complaints as $complaint) {
    echo $complaint->user->name;  // Query user setiap loop = 100 query!
}

// ✅ BAIK - Eager loading
$complaints = Complaint::with('user')->get();  // Hanya 2 query total!
foreach ($complaints as $complaint) {
    echo $complaint->user->name;
}
```

**File yang menerapkan:**
- [app/Http/Controllers/AdminController.php](app/Http/Controllers/AdminController.php)
```php
// Ambil complaints dengan eager loading
$complaints = Complaint::with('user', 'responses.admin')
    ->orderByDesc('created_at')
    ->get();
```

**2. Index Database untuk Query Cepat**

**File:** [database/migrations/2026_02_09_120000_create_complaints_table.php](database/migrations/2026_02_09_120000_create_complaints_table.php)

```php
// ✅ Tambah index pada kolom yang sering di-query
$table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
$table->index('status');  // Index pada status untuk filter cepat
$table->index('created_at');  // Index pada created_at untuk sorting
```

**3. Pagination untuk Data Besar**

```php
// ❌ BURUK - Ambil semua sekaligus
$complaints = Complaint::all();

// ✅ BAIK - Pagination
$complaints = Complaint::paginate(15);  // 15 per halaman
```

**4. Lazy Loading untuk File**

```php
// ✅ BAIK - File loading otomatis saat diakses
$complaint = Complaint::find(1);
echo $complaint->bukti_file;  // File loaded saat diakses
```

**5. Cache untuk Data yang Jarang Berubah**

```php
// ✅ Bisa gunakan cache untuk dashboard stats
$totalComplaints = Cache::remember('total_complaints', 60, function () {
    return Complaint::count();
});
```

**6. Optimize Query Select**

```php
// ❌ BURUK - Select semua kolom
$complaints = Complaint::all();

// ✅ BAIK - Select hanya kolom yang diperlukan
$complaints = Complaint::select('id', 'judul', 'status', 'created_at')->get();
```

---

### **1.13 Menggunakan Tipe Data dan Control Program**

**PENJELASAN MUDAH:**
Dalam membuat program saya, saya menggunakan berbagai tipe data (angka, teks, boolean, dll) dan pengaturan alur program (if, loop, switch) untuk membuat logika yang bekerja dengan baik.

**TIPE DATA YANG SAYA GUNAKAN DI PROGRAM SAYA:**

**1. String (Teks)**
```php
$name = "John Doe";           // Nama user
$judul = "Meja Rusak";        // Judul pengaduan
$respon = "Akan segera diperbaiki"; // Respon admin
```

**2. Integer (Angka)**
```php
$id = 1;
$user_id = 5;
$complaint_id = 10;
```

**3. Boolean (True/False)**
```php
$isAdmin = true;    // Cek role admin
$isPending = false; // Cek status pengaduan
```

**4. Array (Kumpulan Data)**
```php
$data = [
    'judul' => 'Meja Rusak',
    'kategori' => 'Sarana',
    'deskripsi' => 'Ada meja yang plosok'
];

// Akses:
echo $data['judul'];  // "Meja Rusak"
```

**5. Object (Instansi Model)**
```php
$complaint = Complaint::find(1);  // Ambil object Complaint
echo $complaint->judul;           // Akses property
```

**6. Enum (Tipe khusus Laravel untuk pilihan terbatas)**

**File:** [database/migrations/2026_02_09_000000_create_users_table.php](database/migrations/2026_02_09_000000_create_users_table.php)

```php
// Role hanya bisa 'admin' atau 'siswa'
$table->enum('role', ['admin', 'siswa']);
```

---

**PENGATURAN ALUR PROGRAM (CONTROL STRUCTURES) YANG SAYA GUNAKAN:**

**1. If-Else (Kondisi)**

```php
// Di ComplaintPolicy
public function view(User $user, Complaint $complaint)
{
    // Jika role admin, boleh view
    if ($user->role === 'admin') {
        return true;
    }
    
    // Jika user yang buat complaint, boleh view
    if ($user->id === $complaint->user_id) {
        return true;
    }
    
    // Selain itu, tidak boleh
    return false;
}
```

**2. Loop (Perulangan)**

```php
// Menampilkan semua complaints di view
@forelse ($complaints as $complaint)
    <tr>
        <td>{{ $complaint->judul }}</td>
        <td>{{ $complaint->status }}</td>
    </tr>
@empty
    <tr>
        <td colspan="2">Tidak ada pengaduan</td>
    </tr>
@endforelse
```

**3. Switch Case**

```php
// Menentukan warna badge berdasarkan status
switch($complaint->status) {
    case 'menunggu':
        $color = 'yellow';
        break;
    case 'diproses':
        $color = 'blue';
        break;
    case 'selesai':
        $color = 'green';
        break;
    case 'ditolak':
        $color = 'red';
        break;
}
```

**4. Try-Catch (Error Handling)**

```php
try {
    $complaint = Complaint::findOrFail($id);
    $complaint->delete();
} catch (ModelNotFoundException $e) {
    return redirect()->back()->with('error', 'Pengaduan tidak ditemukan');
}
```

---

### **1.14 Membuat Program Sederhana**

**PENJELASAN MUDAH:**
Untuk memastikan program saya berfungsi dengan baik, saya membuat setiap modul dengan alur logika yang jelas dan mudah diikuti. Berikut adalah contoh program sederhana yang saya buat.

**PROGRAM SEDERHANA SAYA: Halaman Dashboard Admin**

**Alur program saya:**
```
1. Admin melakukan login
2. Admin mengakses URL /admin/dashboard
3. Sistem saya ambil data dari database: jumlah pengaduan, status breakdown, pengaduan terbaru
4. Semua data saya tampilkan di halaman dashboard
```

**Implementasi program saya:**

**File Controller saya:** [app/Http/Controllers/AdminController.php](app/Http/Controllers/AdminController.php)

Di Controller ini, saya buat method index() yang menangani logika:
1. Count total complaints
2. Count complaints per status
3. Ambil 5 complaint terbaru dengan relasi user

```php
class AdminController extends Controller
{
    public function index()
    {
        // 1. Ambil total complaints
        $totalComplaints = Complaint::count();
        
        // 2. Ambil complaints per status
        $pendingComplaints = Complaint::where('status', 'menunggu')->count();
        $processingComplaints = Complaint::where('status', 'diproses')->count();
        $completedComplaints = Complaint::where('status', 'selesai')->count();
        
        // 3. Ambil 5 complaint terbaru
        $recentComplaints = Complaint::with('user')
                           ->orderByDesc('created_at')
                           ->take(5)
                           ->get();
        
        // 4. Kirim ke view
        return view('admin.dashboard', [
            'totalComplaints' => $totalComplaints,
            'pendingComplaints' => $pendingComplaints,
            'processingComplaints' => $processingComplaints,
            'completedComplaints' => $completedComplaints,
            'recentComplaints' => $recentComplaints,
        ]);
    }
}
```

**File Route saya yang saya buat:** [routes/web.php](routes/web.php)

Di sini saya definisikan route /admin/dashboard dan mana Controller/method yang handle request ini.

```php
Route::middleware('auth', 'is.admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
```

**File View saya:** [resources/views/admin/dashboard.blade.php](resources/views/admin/dashboard.blade.php)

Di View ini, saya gunakan Blade template engine untuk menampilkan data dari Controller ke halaman HTML yang rapi.

```blade
@extends('layouts.admin')

@section('content')
<h1>Dashboard Admin</h1>

<div class="stats">
    <div class="stat">
        <h3>{{ $totalComplaints }}</h3>
        <p>Total Pengaduan</p>
    </div>
    <div class="stat">
        <h3>{{ $pendingComplaints }}</h3>
        <p>Menunggu</p>
    </div>
    <div class="stat">
        <h3>{{ $processingComplaints }}</h3>
        <p>Diproses</p>
    </div>
    <div class="stat">
        <h3>{{ $completedComplaints }}</h3>
        <p>Selesai</p>
    </div>
</div>

<h2>Pengaduan Terbaru</h2>
<table>
    <tr>
        <th>Judul</th>
        <th>Siswa</th>
        <th>Status</th>
        <th>Tanggal</th>
    </tr>
    @foreach ($recentComplaints as $complaint)
    <tr>
        <td>{{ $complaint->judul }}</td>
        <td>{{ $complaint->user->name }}</td>
        <td>{{ $complaint->status }}</td>
        <td>{{ $complaint->created_at->format('d-m-Y') }}</td>
    </tr>
    @endforeach
</table>
@endsection
```

---

### **1.15 Membuat Program Menggunakan Prosedur dan Fungsi**

**PENJELASAN MUDAH:**
Pada saat membuat program saya, saya membuat prosedur/fungsi-fungsi yang dapat dipakai berkali-kali. Dengan cara ini, saya tidak perlu menulis ulang kode yang sama berulang kali.

**FUNGSI-FUNGSI YANG SAYA BUAT:

**1. Fungsi Service saya: createComplaint**

**File saya:** [app/Services/ComplaintService.php](app/Services/ComplaintService.php)

Fungsi ini saya buat untuk menangani logic pembuatan complaint baru, termasuk upload file jika ada.

```php
public function createComplaint(array $data, ?UploadedFile $file)
{
    // Handle file upload
    if ($file) {
        $filePath = $file->store('complaints', 'public');
        $data['bukti_file'] = $filePath;
    }
    
    // Create complaint
    return Complaint::create($data);
}
```

**Digunakan di Controller:**

```php
// Cukup panggil function, tidak perlu nulis logic lagi
$complaint = $this->complaintService->createComplaint(
    $request->validated(),
    $request->file('bukti_file')
);
```

**2. Fungsi Service saya: updateStatus**

**File saya:** [app/Services/ComplaintService.php](app/Services/ComplaintService.php)

Fungsi ini saya buat untuk mengupdate status complaint dengan mudah.

```php
public function updateStatus(Complaint $complaint, string $status)
{
    $complaint->update(['status' => $status]);
    return $complaint;
}
```

**Digunakan di Controller:**

```php
// Cukup panggil function
$this->complaintService->updateStatus($complaint, 'selesai');
```

**3. Fungsi Relationship saya di Model**

**File saya:** [app/Models/Complaint.php](app/Models/Complaint.php)

Di Model ini, saya buat beberapa relationship function untuk mengakses data yang terhubung dengan complaint.

```php
// Fungsi untuk ambil user (siswa) yang buat complaint
public function user()
{
    return $this->belongsTo(User::class);
}

// Fungsi untuk ambil semua responses dari admin
public function responses()
{
    return $this->hasMany(Response::class);
}
```

**Digunakan di Controller:**

```php
$complaint = Complaint::find(1);
echo $complaint->user()->name;        // Panggil fungsi
$responses = $complaint->responses(); // Panggil fungsi
```

**4. Fungsi di Model: Query Scope (Custom Query)**

Contoh di Model (bisa ditambahkan jika belum ada):

```php
// Di Complaint Model - buat query custom untuk status tertentu
public function scopePending($query)
{
    return $query->where('status', 'menunggu');
}

public function scopeCompleted($query)
{
    return $query->where('status', 'selesai');
}
```

**Digunakan:**

```php
// Bukannya: Complaint::where('status', 'menunggu')->get()
// Jadi lebih simple:
$pending = Complaint::pending()->get();
$completed = Complaint::completed()->get();
```

---

### **1.16 Membuat Program Menggunakan Array**

**PENJELASAN MUDAH:**
Array adalah kumpulan data yang saya simpan dalam satu variabel. Ini sangat berguna ketika saya perlu menyimpan banyak data sekaligus di program.

**PENGGUNAAN ARRAY DI PROGRAM SAYA:**

**1. Array Input Form (Request Data)**

Ketika siswa mengirim form untuk membuat pengaduan baru, saya kumpulkan semua data dalam satu array
$data = [
    'judul' => 'Meja Rusak',
    'kategori' => 'Sarana',
    'deskripsi' => 'Ada meja di ruang kelas yang rusak',
    'bukti_file' => 'path/to/file.jpg'
];

// Simpan ke database
Complaint::create($data);
```

**File terkait:** [app/Http/Requests/StoreComplaintRequest.php](app/Http/Requests/StoreComplaintRequest.php)

```php
public function rules()
{
    return [
        'judul' => 'required',
        'kategori' => 'required', // Return array of validation messages
        'deskripsi' => 'required',
        'bukti_file' => 'nullable|mimes:jpg,jpeg,png,pdf'
    ];
}
```

**2. Array dari Database Query**

```php
// Ambil semua complaints (return array of objects)
$complaints = Complaint::get();  // Array berisi 5 object Complaint

// Loop array
foreach ($complaints as $complaint) {
    echo $complaint->judul;
}
```

**3. Array untuk Response Data**

```php
// Di Controller, siapkan array data untuk view
$viewData = [
    'complaints' => Complaint::get(),
    'totalCompleted' => Complaint::where('status', 'selesai')->count(),
    'userRole' => Auth::user()->role,
];

// Kirim ke view
return view('admin.index', $viewData);
```

**4. Array di View (Blade)**

```blade
@foreach ($complaints as $complaint)
    <h3>{{ $complaint['judul'] }}</h3>
    <p>Kategori: {{ $complaint['kategori'] }}</p>
@endforeach

<!-- Atau dengan object (dot notation) -->
@foreach ($complaints as $complaint)
    <h3>{{ $complaint->judul }}</h3>
    <p>Kategori: {{ $complaint->kategori }}</p>
@endforeach
```

**5. Array untuk API Response (JSON)**

```php
// Ketika return API, gunakan array
return response()->json([
    'success' => true,
    'message' => 'Complaint created successfully',
    'data' => $complaint,
    'status_code' => 201
]);
```

---

### **1.17 Mempersiapkan Kode Program**

**PENJELASAN MUDAH:**
Sebelum menjalankan program, ada beberapa proses persiapan yang harus saya lakukan agar program berfungsi dengan maksimal.

**PERSIAPAN YANG SAYA LAKUKAN SEBELUM JALANKAN PROGRAM:**

**1. Setup Environment**
```bash
# Copy file konfigurasi
cp .env.example .env

# Generate APP_KEY
php artisan key:generate

# Set database config di .env
# Ubah: DB_DATABASE, DB_USERNAME, DB_PASSWORD
```

**2. Install Dependencies**
```bash
# Install PHP packages
composer install

# Install JavaScript packages
npm install

# Compile CSS/JS
npm run build
```

**3. Setup Database**
```bash
# Create database (done in DB software)
php artisan migrate  # Jalankan semua migrations

# Optional: Seed data awal
php artisan db:seed  # Isi data awal
```

**4. Clear Cache & Optimize**
```bash
php artisan config:clear   # Clear config cache
php artisan cache:clear    # Clear app cache
php artisan optimize       # Optimize loading
```

**5. Permission Setup (Linux/Mac)**
```bash
# Beri akses write ke storage dan bootstrap
chmod -R 755 storage bootstrap/cache
```

**6. Setup File Storage**
```bash
# Link public storage untuk file upload
php artisan storage:link
```

**File yang dipersiapkan:**
- [.env.example](.env.example) – Copy ke .env dan setting
- [bootstrap/app.php](bootstrap/app.php) – Inisialisasi aplikasi
- [config/](config/) – Semua konfigurasi
- [database/migrations/](database/migrations/) – Struktur database

---

### **1.18 Melakukan Debugging**

**PENJELASAN MUDAH:**
Saat mengembangkan program saya, pasti ada error atau bug. Saya harus mencari dan memperbaiki semua bug tersebut agar program bekerja dengan sempurna.

**TEKNIK DEBUGGING YANG SAYA GUNAKAN:**

**1. Lihat Error di Laravel Log**
```bash
# Tail log file real-time
tail -f storage/logs/laravel.log

# Atau buka file
cat storage/logs/laravel.log
```

**2. Gunakan dd() Function (Dump and Die)**

```php
// Di Controller, lihat isi variabel
$complaint = Complaint::find(1);
dd($complaint);  // Tampilkan isi $complaint dan stop

// Lihat queries yang dijalankan
// Di .env set: DB_QUERY_LOG=true
// Maka queries tercatat di storage/logs
```

**3. Gunakan Laravel Debugbar** (kalau install)

```php
// Di .env set APP_DEBUG=true
// Maka debugbar muncul di bottom halaman
```

**4. Log Manual**

```php
// Tulis ke log untuk tracking
Log::info('Complaint created', ['complaint_id' => $complaint->id]);
Log::error('Error saat update status', ['error' => $e->getMessage()]);

// Lihat di storage/logs/laravel.log
```

**5. Gunakan IDE Debugger (VS Code XDebug)**

```php
// Set breakpoint di VS Code (klik di nomor baris)
// Jalankan dengan debugger
// Program akan pause di breakpoint
// Lihat nilai semua variabel
```

**6. Browser Developer Tools**

```javascript
// Cek network request, response
// Buka F12 → Network tab
// Lihat request/response setiap aksi
```

**7. Test di Tinker (Interactive Shell)**

```bash
# Buka Laravel Tinker (interactive PHP)
php artisan tinker

# Test code langsung
>>> $complaint = Complaint::find(1);
>>> echo $complaint->judul;
```

**Contoh debugging yang saya lakukan di program saya:** [Dokumentasi_Debugging.md](Dokumentasi_Debugging.md)

---

### **1.19 Memperbaiki Program**

**PENJELASAN MUDAH:**
Setelah menemukan error atau bug, langkah berikutnya saya lakukan adalah menganalisis dan memperbaiki dengan mengubah kode saya.

**CONTOH PERBAIKAN BUG YANG SAYA LAKUKAN:

**Bug 1: File Upload Tidak Tersimpan**

**Error:** File tidak muncul di folder storage

**Debugging:**
```php
// Debug di ComplaintService
public function createComplaint(array $data, ?UploadedFile $file)
{
    dd($file);  // Lihat apakah file ada
    
    if ($file) {
        dd($file->store('complaints', 'public'));  // Lihat hasil store
    }
}
```

**Perbaikan:**
```php
// Pastikan public storage linked
php artisan storage:link

// Atau ubah kode:
if ($file) {
    $filePath = $file->store('complaints', 'public');
    $data['bukti_file'] = $filePath;  // Simpan path
}
```

**Bug 2: Admin Tidak Bisa Lihat Complaints**

**Error:** Admin dashboard kosong

**Debugging:**
```php
// Di AdminController
public function index()
{
    $complaints = Complaint::all();
    dd($complaints);  // Lihat apakah ada data
}
```

**Perbaikan:**
```php
// Cek database ada data tidak
// Atau ubah query:
$complaints = Complaint::with('user')->get();
```

**Bug 3: Middleware Admin Tidak Bekerja**

**Error:** Siswa bisa akses admin area

**Debugging:**
- Cek di [routes/web.php](routes/web.php) apakah middleware sudah diterapkan
- Cek di [app/Http/Middleware/AdminSession.php](app/Http/Middleware/AdminSession.php)

**Perbaikan:**
```php
// Di routes/web.php, pastikan protect routes
Route::middleware(['auth', 'is.admin'])->group(function () {
    // admin routes
});
```

---

## **KRITERIA ELEMEN KOMPETENSI PENDUKUNG**

---

### **2.1 Mengidentifikasi Konsep Data dan Struktur Data**

**PENJELASAN MUDAH:**
Dalam membuat program, saya perlu memahami konsep data dan struktur data. Ini berarti saya harus mengerti bagaimana cara data saya organize dan diatur.

**KONSEP DATA YANG ADA DI PROGRAM SAYA:**

**1. Data Entity (Entitas Data)**

Entitas adalah "hal" yang kita simpan datanya. Ada 3 entitas utama:

| Entitas | Deskripsi | Contoh Data |
|---------|-----------|--|
| **User** | Orang (Siswa/Admin) | Nama, Email, NIS, Role |
| **Complaint** | Laporan pengaduan | Judul, Deskripsi, Status |
| **Response** | Balasan dari admin | Teks respon, Tanggal |

**2. Data Relationship (Relasi Data)**

Hubungan antar entitas:

```
    User (Siswa) ──────── creates ──────► Complaint
       ▲                                        │
       │                                        │
       │                                        ▼
       └───── responds via ────────── Response
       
    User (Admin) ────────────────────────────┘
```

**Relasi Detail:**
- 1 User bisa membuat banyak Complaint (1-to-Many)
- 1 Complaint bisa menerima banyak Response (1-to-Many)
- 1 User (Admin) bisa membuat banyak Response (1-to-Many)

**3. Tipe Data**

| Tipe | Deskripsi | Contoh | Storage |
|-----|-----------|--------|---------|
| String | Teks | "John Doe", "Meja Rusak" | 255 karakter |
| Integer | Angka bulat | 1, 2, 100 | 4 bytes |
| Timestamp | Waktu | 2026-02-09 10:30:45 | 8 bytes |
| Enum | Pilihan terbatas | 'admin', 'siswa' | varchar |
| Boolean | True/False | true, false | 1 byte |
| Text | Teks panjang | Deskripsi detil | hingga 65535 char |

**4. Data Validation (Validasi Data)**

Memastikan data valid sebelum disimpan:

```php
'judul' => 'required|max:255'      // Harus ada, max 255 char
'kategori' => 'required|in:Sarana,Prasarana,Kesiswaan'  // Harus salah satu
'bukti_file' => 'mimes:jpg,pdf|max:2048'  // Hanya jpg/pdf, max 2MB
```

---

### **2.2 Mengidentifikasi Mekanisme Running atau Eksekusi Source Code**

**PENJELASAN MUDAH:**
Saya harus memahami bagaimana mekanisme program saya bekerja - dari tempat user mengetik URL di browser sampai program saya menampilkan halaman di layar.

**ALUR EKSEKUSI PROGRAM SAYA:**

```
1. User buka browser dan ketik URL
   └─> http://localhost:8000/complaints

2. Browser kirim HTTP Request ke server
   └─> GET /complaints HTTP/1.1

3. Laravel router ([routes/web.php](routes/web.php)) menerima request
   └─> Route::get('/complaints', [ComplaintController::class, 'index'])

4. Middleware dijalankan
   └─> Auth (cek user login)
   └─> Throttle (cegah spam)

5. Controller dijalankan
   └─> ComplaintController::index() 
   └─> Query database: $complaints = Complaint::all()

6. Database return data (Model + Eloquent)
   └─> Array of Complaint objects

7. Data dikirim ke View
   └─> return view('complaints.index', ['complaints' => $complaints])

8. View (Blade template) render HTML
   └─> [resources/views/student/complaints/index.blade.php](resources/views/student/complaints/index.blade.php)
   └─> @foreach ($complaints as $complaint) ...

9. HTML dikirim kembali ke browser
   └─> HTTP Response 200 OK

10. Browser render HTML → tampil di layar
```

**FLOW DIAGRAM LEBIH DETAIL:**

```
REQUEST
  ↓
├─ Router (web.php)
├─ Middleware (auth)
├─ Controller (ComplaintController@index)
│   ├─ Query: Complaint::all()
│   └─ Model (Complaint.php)
├─ Database (MySQL)
│   └─ SELECT * FROM complaints
├─ View (complaint/index.blade.php)
│   └─ Blade compile menjadi PHP
├─ PHP execute
├─ HTML generate
└─ Response →送 Browser
  ↓
DISPLAY
```

**File-file penting yang terlibat dalam execution program saya:**
- [public/index.php](public/index.php) – Entry point pertama
- [bootstrap/app.php](bootstrap/app.php) – Inisialisasi Laravel
- [routes/web.php](routes/web.php) – Route definition
- [app/Http/Controllers/](app/Http/Controllers/) – Logic
- [app/Models/](app/Models/) – Database interaction
- [resources/views/](resources/views/) – Output HTML

---

### **2.3 Mengidentifikasi Hasil Eksekusi**

**PENJELASAN MUDAH:**
Setiap kali program saya dijalankan, pasti ada output atau hasil yang keluar. Saya perlu memahami berbagai hasil yang mungkin muncul dari eksekusi program.

**HASIL EKSEKUSI YANG DIHARAPKAN DARI PROGRAM SAYA:**

**1. Hasil Success (Berhasil)**

**Aksi:** Siswa membuat pengaduan baru

**Input:**
```
Judul: Meja Rusak
Kategori: Sarana
Deskripsi: Ada meja yang plosok
File: bukti.jpg
```

**Proses:**
```php
// ComplaintController::store()
$complaint = $this->complaintService->createComplaint(
    $request->validated(),
    $request->file('bukti_file')
);
```

**Output Hasil:**
- ✅ Redirect ke halaman complaints
- ✅ Muncul pesan: "Pengaduan berhasil dibuat"
- ✅ Data tersimpan di database
- ✅ File tersimpan di storage/public/complaints

**2. Hasil Validation Error (Validation gagal)**

**Input (tidak lengkap):**
```
Judul: (kosong)
Kategori: (kosong)
Deskripsi: (kosong)
```

**Output:**
```html
❌ Error messages:
   - Judul harus diisi
   - Kategori harus dipilih
   - Deskripsi harus diisi
```

**File handling:** [app/Http/Requests/StoreComplaintRequest.php](app/Http/Requests/StoreComplaintRequest.php)

**3. Hasil Authorization Error (Tidak punya akses)**

**Aksi:** Siswa A coba lihat pengaduan milik Siswa B

**Output:**
```
❌ 403 Forbidden - Unauthorized
```

**File handling:** [app/Policies/ComplaintPolicy.php](app/Policies/ComplaintPolicy.php)

**4. Hasil Query Database**

**Query:** Ambil semua pengaduan dengan status "menunggu"

```php
$pending = Complaint::where('status', 'menunggu')->get();
```

**Output:** Array of Complaint objects
```php
[
    Complaint {
        id: 1,
        judul: "Meja Rusak",
        status: "menunggu",
        user_id: 5,
        ...
    },
    Complaint {
        id: 2,
        judul: "Lampu Putus",
        status: "menunggu",
        ...
    }
]
```

**5. Hasil View Render (HTML)**

**Dari Blade:**
```blade
@foreach ($complaints as $complaint)
    <tr>
        <td>{{ $complaint->judul }}</td>
        <td>{{ $complaint->status }}</td>
    </tr>
@endforeach
```

**Menjadi HTML:**
```html
<tr>
    <td>Meja Rusak</td>
    <td>menunggu</td>
</tr>
<tr>
    <td>Lampu Putus</td>
    <td>menunggu</td>
</tr>
```

**6. Hasil API Response (jika ada API endpoint)**

```php
return response()->json([
    'success' => true,
    'message' => 'Data berhasil diambil',
    'data' => $complaints,
    'total' => count($complaints)
]);
```

**Output JSON:**
```json
{
    "success": true,
    "message": "Data berhasil diambil",
    "data": [
        {
            "id": 1,
            "judul": "Meja Rusak",
            "status": "menunggu"
        }
    ],
    "total": 1
}
```

---

---

# 📝 RINGKASAN SINGKAT UNTUK PRESENTASI

Ketika ditanya penguji, gunakan jawaban singkat ini:

**"Program saya adalah sistem pengaduan sarana sekolah berbasis web. Ada dua pengguna: siswa dan admin. Siswa bisa membuat pengaduan dengan data judul, kategori, deskripsi, dan file bukti. Data disimpan ke database dengan status "menunggu". Admin bisa melihat semua pengaduan dan mengubah statusnya menjadi "diproses" atau "selesai". Admin juga bisa memberikan balasan untuk setiap pengaduan. Teknologi yang digunakan adalah Laravel 11, MySQL, dan Blade untuk interface."**

---

# 🔗 FILE REFERENSI UNTUK SETIAP POIN

| Poin | File Referensi | Tujuan |
|-----|---|---|
| 1.1 Struktur Data | [app/Models/](app/Models/) | Model data User, Complaint, Response |
| 1.2 Metode Development | [app/Services/](app/Services/) | Service layer |
| 1.3 Diagram | [Dokumentasi_ERD_Revisi.md](Dokumentasi_ERD_Revisi.md) | Entity Relationship Diagram |
| 1.4 Pemodelan | [database/migrations/](database/migrations/) | Implementasi model ke database |
| 1.5 Eksekusi | [public/index.php](public/index.php) | Entry point program |
| 1.6 Pemilihan Tools | [composer.json](composer.json) | Daftar tools/packages |
| 1.7 Instalasi | [GUIDE_SETUP_LAPTOP_LAIN.md](GUIDE_SETUP_LAPTOP_LAIN.md) | Panduan instalasi |
| 1.8 Script Sederhana | [app/Services/ComplaintService.php](app/Services/ComplaintService.php) | Service logic |
| 1.9 Konfigurasi | [config/](config/) | File konfigurasi |
| 1.10 Menggunakan Tools | [routes/web.php](routes/web.php) | Route definition |
| 1.11 Best Practices | [app/Http/Controllers/ComplaintController.php](app/Http/Controllers/ComplaintController.php) | Implementation patterns |
| 1.12 Performansi | [app/Http/Controllers/AdminController.php](app/Http/Controllers/AdminController.php) | Query optimization |
| 1.13 Tipe Data | [database/migrations/](database/migrations/) | Schema dengan tipe data |
| 1.14 Program Sederhana | [resources/views/admin/dashboard.blade.php](resources/views/admin/dashboard.blade.php) | Dashboard view |
| 1.15 Prosedur/Fungsi | [app/Services/](app/Services/) | Service functions |
| 1.16 Array | [app/Http/Requests/](app/Http/Requests/) | Array validation rules |
| 1.17 Persiapan Kode | [.env.example](.env.example) | Setup configuration |
| 1.18 Debugging | [Dokumentasi_Debugging.md](Dokumentasi_Debugging.md) | Debugging guide |
| 1.19 Perbaikan | [storage/logs/](storage/logs/) | Error logs |
| 2.1 Konsep Data | [Dokumentasi_ERD_Implementasi.md](Dokumentasi_ERD_Implementasi.md) | Data concept |
| 2.2 Mekanisme Running | [routes/web.php](routes/web.php) | Request flow |
| 2.3 Hasil Eksekusi | [resources/views/](resources/views/) | Output/views |

---

**Semoga panduan ini membantu! Selamat presentasi! 🎉**
