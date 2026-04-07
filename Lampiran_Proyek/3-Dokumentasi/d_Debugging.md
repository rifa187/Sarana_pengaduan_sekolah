# Dokumentasi Debugging
Dokumentasi ini mencatat tahapan pemecahan masalah / debugging selama siklus hidup proyek sebelum status tahap peluncuran (Production Ready):

1. **Error Linter: Class "\Spatie\Permission\Traits\HasRoles" not found**
   - **Kondisi Awal:** Menggunakan package ACL eksternal yang diinisialisasi namun ditarik dari pipeline environment kerja aplikasi.
   - **Tindakan Perbaikan:** Menghapus deklarasi namespace tersebut di model `User`. Menyesuaikan infrastruktur dengan peran otorisasi asli milik kerangka kerja `Enum` basis data (`siswa`, `admin`).
   - **Status:** *Resolved* 

2. **Kesalahan Modul Composer "create-project"**
   - **Kondisi Awal:** Penggunaan parameter instruksi Console Command tidak valid saat mencoba inisialisasi lingkungan.
   - **Tindakan Perbaikan:** Menyesuaikan ulang command instalasi scaffolding PHP/Laravel serta struktur flag instalator framework yang paling kompatibel untuk sistem operasi.
   - **Status:** *Resolved*

3. **Undefined Variable Error pada View (Blade Templates)**
   - **Kondisi Awal:** Laporan crash (HTTP 500) saat merender template karena View komponen tidak memiliki konteks data dari Model yang relevan.
   - **Tindakan Perbaikan:** Melengkapi parameter `compact('variabel')` di Return method function controller atau menyesuaikan array pengikatan pada rute parameter ke view. Memastikan tidak ada pengulangan query berlebih di interface (`N+1 Query Resolution`).
   - **Status:** *Resolved*

Semua anomali telah tertangani dan diuji melewati tes manual. Integritas dan struktur sintaks program aman dari kebocoran memori atau loop bersarang tak terhingga.
