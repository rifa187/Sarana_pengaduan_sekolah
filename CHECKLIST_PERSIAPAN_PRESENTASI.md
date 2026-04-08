# ✅ CHECKLIST PERSIAPAN PRESENTASI UKK

## 📋 SEBELUM PRESENTASI

### Persiapan Jawaban Presentasi
- [ ] Baca file `JAWABAN_UKK_PRESENTASI.md` minimal 2-3 kali
- [ ] Baca file `JAWABAN_PRESENTASI_CONVERSATIONAL.md` untuk mengetahui cara menjawab
- [ ] Highlight/tandai poin-poin penting yang ingin diingat
- [ ] Catat kalimat-kalimat kunci dalam bentuk notes pendek
- [ ] Latih menjawab dengan kata-kata sendiri (jangan membeo)

### Persiapan File & Kode
- [ ] Pastikan folder project sudah rapi
- [ ] Folder uploads/complaints ada dan bisa tulis file
- [ ] Database sudah up-to-date dengan semua migrations
- [ ] Program sudah bisa dijalankan (tidak ada error)
- [ ] Data test sudah ada (buat beberapa sample complaints)
- [ ] Siapkan file Excel contoh untuk demo import

### Persiapan Teknis
- [ ] Laragon/XAMPP sudah siap
- [ ] Database sudah running
- [ ] Laravel server siap untuk di-jalankan
- [ ] Browser sudah siap (pastikan PHP dan JavaScript support ada)
- [ ] VS Code atau editor sudah siap untuk menunjukkan kode
- [ ] Network stabil/tidak ada wifi yang bermasalah

### Persiapan Diri
- [ ] Istirahat yang cukup malam sebelumnya
- [ ] Makan pukul 06-07 pagi
- [ ] Minum air putih sebelum presentasi
- [ ] Datang lebih awal ke tempat (15 menit lebih awal)
- [ ] Pakaian rapi dan profesional
- [ ] Persiapkan mental untuk confident

---

## 🎯 SAAT PRESENTASI

### Pembukaan (1-2 menit)
- [ ] Sapa penguji dengan sopan
- [ ] Sebutkan nama Anda dan judul program
- [ ] Jelaskan tujuan program dengan singkat dan jelas
- [ ] Tunjukkan enthusiasm/antusiasme terhadap program Anda

### Penjelasan Program (3-5 menit)
- [ ] Jelaskan alur/flow program dengan diagram atau verbal
- [ ] Sebutkan fitur utama program
- [ ] Jelaskan siapa user program (siswa dan admin)
- [ ] Jelaskan business process (pengaduan → proses → selesai)

### Jawab Pertanyaan Poin 1.1 - 1.19 & 2.1 - 2.3
Ketika penguji tanya poin tertentu:
- [ ] Dengarkan pertanyaan dengan seksama sampai selesai
- [ ] Jangan teburu-buru menjawab, ambil napas dulu
- [ ] Jawab dengan logis dan terstruktur
- [ ] Gunakan contoh dari program Anda
- [ ] Tunjukkan file/kode yang relevan
- [ ] Jika tidak tahu, bilang "Saya belum mengerti pertanyaannya, bisa diulang?" (jangan asal jawab)

### Demo Program (2-3 menit)
Jika diminta demo:
- [ ] Jalankan `php artisan serve` di terminal
- [ ] Buka browser dan akses aplikasi
- [ ] Login sebagai siswa dan buat pengaduan
- [ ] Upload file dan lihat hasil
- [ ] Logout dan login sebagai admin
- [ ] Lihat dashboard statistik
- [ ] Update status pengaduan
- [ ] Beri balasan untuk pengaduan

### Menunjukkan Kode
Jika diminta lihat kode:
- [ ] Buka VS Code
- [ ] Navigate ke folder/file yang diminta
- [ ] Jelaskan kode dengan singkat
- [ ] Tunjukkan relasi antara file-file
- [ ] Jangan terlalu detail membaca kode, jelaskan konsep/logikanya

### Penutup (1 menit)
- [ ] Simpulkan presentasi Anda
- [ ] Terima pertanyaan terakhir jika ada
- [ ] Ucapkan terima kasih
- [ ] Beri salam penutup dengan sopan

---

## 💬 KALIMAT-KALIMAT PENTING UNTUK DIINGAT

### Pembukaan
- "Saya membuat program Sistem Informasi Pengaduan Sarana Sekolah berbasis web"
- "Program ini memiliki dua jenis pengguna: siswa dan admin"
- "Tujuan program ini adalah untuk memudahkan siswa melaporkan masalah sarana dan memudahkan admin memproses laporan"

### Saat Menjelaskan Struktur
- "Saya membuat 3 struktur data utama: User, Complaint, dan Response"
- "Ketiga struktur ini saling terhubung dengan relasi One-to-Many"
- "Saya gunakan Laravel Eloquent ORM untuk mengakses data"

### Saat Menjelaskan Metode
- "Saya menggunakan metode MVC (Model-View-Controller)"
- "Saya pisahkan logika bisnis di Service Layer agar Controller tidak terlalu berat"
- "Saya gunakan Policy untuk kontrol akses dan keamanan"

### Saat Menjelaskan Tools
- "Saya memilih Laravel 11 karena memiliki built-in authentication dan authorization"
- "Saya gunakan MySQL karena familiar dan support relasi yang kompleks"
- "Saya gunakan Blade template yang terintegrasi dengan Laravel"

### Saat Menjelaskan Proses
- "Alurnya dimulai dari siswa login, membuat pengaduan, data disimpan dengan status menunggu"
- "Admin login, melihat semua pengaduan, ubah status, dan beri balasan"
- "Siswa dapat melihat balasan dari admin"

### Jika Tidak Tahu Jawaban
- "Saya belum mengerti pertanyaannya pak/bu, bisa dijelaskan lebih detail?"
- "Saya belum mendalami aspek itu, tapi teorinya adalah..."
- "Itu good question, mungkin bisa saya kembangkan di versi berikutnya"

### Penutup
- "Terima kasih pak/bu telah mendengarkan presentasi saya"
- "Saya siap menerima kritik dan saran untuk improvement program saya"

---

## ⚠️ YANG HARUS DIHINDARI

- ❌ Nervous atau terlihat ragu-ragu
- ❌ Jawab terlalu cepat atau terlalu lambat
- ❌ Membeo jawaban/menghafal text mentah
- ❌ Bicara sambil lihat kertas terus-menerus
- ❌ Berbelit-belit dan tidak fokus pada pertanyaan
- ❌ Menggunakan bahasa yang terlalu teknis/sulit dicerna
- ❌ Asal jawab jika tidak tahu
- ❌ Membela diri dengan cara agresif jika ditanya kritis
- ❌ Lupa untuk menunjukkan/demo program

---

## 🎁 BONUS TIPS

### Jika Penguji Tanya Hal yang Tidak Expect:
- Ambil napas dalam
- Pikir sebentar (boleh kira-kira 10 detik)
- Jawab sesuai yang Anda tahu
- Jika benar-benar tidak tahu, jujur bilang "Saya belum mendalami hal itu"

### Jika Program Crash/Error Saat Demo:
- Tetap tenang
- Bilang "Sepertinya ada technical issue, bisa saya check log?"
- Ganti dengan "Saya bisa jelaskan alurnya secara manual"
- Jangan panic atau kasih alasan yang berlebihan

### Jika Penguji Tanya Hal Kritis/Negatif:
- Dengarkan dengan baik
- Jangan langsung membela
- Bilang "Itu valid point, saya akan perbaiki di versi mendatang"
- Tunjukkan Anda open untuk improvement

### Untuk Nambah Confidence:
- Visualisasi sukses presentasi Anda
- Ingatkan diri bahwa ini program Anda dan Anda yang paling tahu
- Lakukan presentasi latihan dengan teman atau guru dulu
- Ingat kapan terakhir Anda sukses dalam presentasi apapun

---

## 📊 SCORING TIPS

Untuk mendapatkan nilai maksimal:
- ✅ Pahami setiap elemen kompetensi dengan baik
- ✅ Tunjukkan file kode yang relevan untuk setiap poin
- ✅ Demo program berfungsi dengan baik
- ✅ Tunjukkan best practices dalam kode
- ✅ Jelaskan alasan di balik setiap keputusan teknis
- ✅ Terima kritik dengan baik dan tunjukkan awareness akan improvement
- ✅ Presentasi dengan confidence dan clear communication

---

## 📞 KONTAK EMERGENCY

Jika ada masalah teknis sebelum presentasi:
- Hubungi guru pembimbing/guru IT
- Jika tidak ada guru, coba:
  - Restart Laragon/XAMPP
  - Cek koneksi database
  - Clear Laravel cache: `php artisan cache:clear`
  - Rebuild database: `php artisan migrate:fresh --seed`

---

**Good luck untuk presentasi UKK Anda! Anda pasti bisa! 💪🎓**
