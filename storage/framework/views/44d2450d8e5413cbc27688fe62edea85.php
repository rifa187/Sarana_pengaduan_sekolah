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
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
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

        <?php if(Route::has('login')): ?>
        <nav class="flex items-center gap-3 font-medium text-sm">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/student/dashboard')); ?>" class="px-5 py-2.5 rounded-full border border-slate-200 hover:border-slate-300 transition-all text-slate-700 bg-white shadow-sm hover:shadow">Dashboard Siswa</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="px-5 py-2.5 rounded-full border border-slate-200 hover:border-slate-300 hover:bg-slate-50 transition-all text-slate-700 bg-white shadow-sm hover:shadow">Masuk Siswa</a>
            <?php endif; ?>
            
            <a href="<?php echo e(route('admin.login')); ?>" class="px-5 py-2.5 rounded-full bg-[#111111] text-white hover:bg-black transition-all shadow-md hover:shadow-lg">Admin Portal</a>
        </nav>
        <?php endif; ?>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center justify-center max-w-4xl mx-auto px-6 pt-12 pb-24 text-center">
        <!-- Hero Section -->
        <span class="text-blue-500 font-bold tracking-widest text-xs mb-8 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-100 uppercase">PLATFORM PENGADUAN SEKOLAH</span>
        
        <h1 class="text-[2.75rem] md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-8 leading-[1.15]">
            Suara Anda Membangun <br/> 
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400">Sekolah Lebih Baik</span>
        </h1>
        
        <p class="text-slate-500 text-[15px] md:text-lg max-w-2xl mx-auto mb-10 leading-relaxed font-normal">
            Laporkan kerusakan fasilitas, sarana, dan prasarana sekolah dengan mudah, cepat, dan transparan. Bersama kita ciptakan lingkungan belajar yang nyaman.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?php echo e(route('login')); ?>" class="px-8 py-3.5 rounded-full bg-[#2563eb] text-white font-semibold flex items-center gap-2 hover:bg-blue-700 transition-all shadow-lg hover:shadow-blue-500/25 hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
                Buat Laporan Sekarang
            </a>
            
            <a href="#alur" class="px-8 py-3.5 rounded-full border border-slate-200 bg-white text-slate-700 font-semibold flex items-center gap-2 hover:bg-slate-50 hover:border-slate-300 transition-all">
                Pelajari Alur
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </a>
        </div>

        <!-- Features / Stats Divider -->
        <div class="w-full flex justify-center mt-20 mb-20 border-t border-slate-200/60 pt-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center divide-y md:divide-y-0 md:divide-x divide-slate-200/60 w-full max-w-3xl">
                <div class="px-4">
                    <h3 class="text-[1.35rem] font-bold text-slate-800 mb-1">100%</h3>
                    <p class="text-[13px] text-slate-400 font-medium tracking-wide">Transparan</p>
                </div>
                <div class="px-4 pt-8 md:pt-0">
                    <h3 class="text-[1.35rem] font-bold text-slate-800 mb-1">24 Jam</h3>
                    <p class="text-[13px] text-slate-400 font-medium tracking-wide">Akses Layanan</p>
                </div>
                <div class="px-4 pt-8 md:pt-0">
                    <h3 class="text-[1.35rem] font-bold text-slate-800 mb-1">Responsif</h3>
                    <p class="text-[13px] text-slate-400 font-medium tracking-wide">Tindak Lanjut</p>
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
        &copy; <?php echo e(date('Y')); ?> Aplikasi Pengaduan Sarana Sekolah. All rights reserved.
    </footer>
</body>
</html>
<?php /**PATH C:\laragon\www\Sarana_pengaduan_sekolah\resources\views/welcome.blade.php ENDPATH**/ ?>