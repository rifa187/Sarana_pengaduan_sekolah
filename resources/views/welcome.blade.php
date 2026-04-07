<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengaduan Sekolah - LaporPak</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fafbfd;
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col relative text-slate-800">

    <!-- Abstract background decorations -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] rounded-full bg-blue-100/40 blur-[100px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] rounded-full bg-blue-50/50 blur-[80px]"></div>
    </div>

    <!-- Navigation -->
    <header class="w-full max-w-6xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </div>
            <span class="font-bold text-xl tracking-tight text-slate-800">LaporPak</span>
        </div>

        @if (Route::has('login'))
        <nav class="flex items-center gap-3 font-medium text-sm">
            @auth
                <a href="{{ url('/student/dashboard') }}" class="px-5 py-2.5 rounded-full border border-slate-200 hover:border-slate-300 transition-all text-slate-700 bg-white shadow-sm hover:shadow">Dashboard Siswa</a>
            @else
                <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full border border-slate-200 hover:border-slate-300 hover:bg-slate-50 transition-all text-slate-700 bg-white shadow-sm hover:shadow">Masuk Siswa</a>
            @endauth
            
            <a href="{{ route('admin.login') }}" class="px-5 py-2.5 rounded-full bg-[#111111] text-white hover:bg-black transition-all shadow-md hover:shadow-lg">Admin Portal</a>
        </nav>
        @endif
    </header>

    <!-- Main Content -->
    <main class="flex-grow w-full max-w-6xl mx-auto px-6 pt-16 pb-24">
        <!-- Hero Section: Split Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
            <!-- Left: Text Content -->
            <div class="text-left">
                <span class="inline-flex items-center gap-2 text-blue-600 font-bold tracking-widest text-xs mb-6 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-100 uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                    Platform Pengaduan Sekolah
                </span>

                <h1 class="text-[2.6rem] md:text-5xl font-extrabold tracking-tight mb-6 leading-[1.15] text-slate-900">
                    Suara Anda <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-500">Membangun Sekolah</span><br/>
                    Lebih Baik.
                </h1>

                <p class="text-slate-500 text-[15.5px] max-w-lg mb-10 leading-relaxed">
                    Laporkan kerusakan fasilitas, sarana, dan prasarana sekolah dengan mudah, cepat, dan transparan. Kami pastikan laporan Anda ditindaklanjuti.
                </p>

                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <a href="{{ route('login') }}" class="px-8 py-4 rounded-full bg-blue-600 text-white font-bold flex items-center gap-2.5 hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/25 hover:-translate-y-0.5 text-[15px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                        Buat Laporan Sekarang
                    </a>
                    <a href="#alur" class="px-8 py-4 rounded-full border border-slate-200 bg-white text-slate-700 font-semibold flex items-center gap-2 hover:bg-slate-50 hover:border-slate-300 transition-all text-[15px] shadow-sm">
                        Lihat Alur
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </a>
                </div>

                <!-- Trust badges -->
                <div class="flex items-center gap-6 mt-10 pt-8 border-t border-slate-100">
                    <div class="text-center">
                        <p class="text-2xl font-extrabold text-slate-800">100%</p>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mt-0.5">Transparan</p>
                    </div>
                    <div class="w-px h-10 bg-slate-200"></div>
                    <div class="text-center">
                        <p class="text-2xl font-extrabold text-slate-800">24 Jam</p>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mt-0.5">Akses Layanan</p>
                    </div>
                    <div class="w-px h-10 bg-slate-200"></div>
                    <div class="text-center">
                        <p class="text-2xl font-extrabold text-slate-800">Cepat</p>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mt-0.5">Tindak Lanjut</p>
                    </div>
                </div>
            </div>

            <!-- Right: Visual Card -->
            <div class="relative hidden lg:block">
                <!-- Decorative background glow -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-indigo-50 rounded-[2.5rem] blur-2xl scale-105 opacity-60"></div>

                <!-- Main card -->
                <div class="relative bg-white rounded-[2rem] shadow-2xl shadow-blue-900/10 border border-slate-100 p-8 overflow-hidden">
                    <!-- Card header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800 text-[14px]">Laporan Baru</p>
                                <p class="text-[12px] text-slate-400">Baru saja dikirim</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-amber-50 text-amber-600 border border-amber-200 text-[11px] font-bold">Menunggu</span>
                    </div>

                    <!-- Fake complaint content -->
                    <div class="bg-slate-50 rounded-xl p-4 mb-5 border border-slate-100">
                        <p class="font-bold text-slate-800 text-[14px] mb-1">AC Kelas XII RPL 1 Rusak</p>
                        <p class="text-[12.5px] text-slate-500 leading-relaxed">Unit AC di kelas XII RPL tidak berfungsi dengan baik. Sudah 3 hari mati dan mengganggu proses belajar...</p>
                    </div>

                    <!-- Status timeline -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <p class="text-[12.5px] font-semibold text-slate-700">Laporan Dikirim</p>
                                    <span class="text-[11px] text-slate-400">09:14</span>
                                </div>
                                <div class="h-0.5 bg-slate-100 rounded mt-1 w-full"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                <div class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></div>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <p class="text-[12.5px] font-semibold text-blue-600">Menunggu Verifikasi Admin</p>
                                    <span class="text-[11px] text-slate-400">Sekarang</span>
                                </div>
                                <div class="h-0.5 bg-slate-100 rounded mt-1 w-2/3"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 opacity-40">
                            <div class="w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0">
                                <div class="w-2 h-2 rounded-full bg-slate-300"></div>
                            </div>
                            <p class="text-[12.5px] font-semibold text-slate-400">Ditindaklanjuti Petugas</p>
                        </div>
                    </div>

                    <!-- Decorative corner -->
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-blue-50 rounded-full opacity-60"></div>
                </div>
            </div>
        </div>




        <!-- Alur Section -->
        <section id="alur" class="w-full text-center mt-12 bg-white/50 backdrop-blur-sm rounded-[2rem] p-10 md:p-14 border border-slate-100 shadow-sm">
            <h2 class="text-[1.75rem] font-bold text-slate-800 mb-3">Alur Pengaduan Mudah</h2>
            <p class="text-slate-500 mb-12 max-w-xl mx-auto text-sm">Kami menyederhanakan proses pelaporan agar masalah dapat segera ditangani oleh petugas.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left relative">
                
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-[1.5rem] shadow-sm border border-slate-100 hover:shadow-md transition-all relative overflow-hidden group">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 shadow-sm border border-blue-100/50">1</div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2">Login / Daftar</h4>
                    <p class="text-slate-500 text-[13.5px] leading-relaxed">Masuk menggunakan NIS Anda sebagai siswa untuk mulai membuat laporan kerusakan.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-[1.5rem] shadow-sm border border-slate-100 hover:shadow-md transition-all relative overflow-hidden group">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 shadow-sm border border-indigo-100/50">2</div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2">Tulis Laporan</h4>
                    <p class="text-slate-500 text-[13.5px] leading-relaxed">Jelaskan kerusakan fasilitas secara detail dan unggah foto bukti agar petugas mudah memverifikasi.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-[1.5rem] shadow-sm border border-slate-100 hover:shadow-md transition-all relative overflow-hidden group">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 shadow-sm border border-blue-100/50">3</div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2">Proses & Selesai</h4>
                    <p class="text-slate-500 text-[13.5px] leading-relaxed">Pantau status laporan Anda (Pending, Diproses, Selesai) dari dashboard siswa Anda.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="w-full text-center py-8 text-slate-400 text-sm mt-auto pb-10">
        &copy; {{ date('Y') }} Aplikasi Pengaduan Sarana Sekolah. All rights reserved.
    </footer>
</body>
</html>
