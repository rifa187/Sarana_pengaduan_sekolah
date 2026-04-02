<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - LaporPak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fafbfd; } </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative antialiased z-0 py-12">
    <!-- Abstract background decorations -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] rounded-full bg-blue-100/40 blur-[100px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] rounded-full bg-blue-50/50 blur-[80px]"></div>
    </div>

    <div class="absolute top-8 left-8 hidden sm:block">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/70 backdrop-blur-md border border-slate-200/60 text-slate-600 font-bold text-[14px] hover:text-blue-600 hover:border-blue-200 hover:bg-white transition-all shadow-sm group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>
    </div>

    <div class="max-w-md w-full bg-white/70 backdrop-blur-xl rounded-[2rem] shadow-sm overflow-hidden border border-slate-100/60 p-8 sm:p-10">
        <div class="text-center mb-8">
            <h2 class="text-[1.75rem] font-bold text-slate-800 leading-tight">Buat Akun 🚀</h2>
            <p class="text-slate-500 mt-2 text-[14px]">Daftarkan diri Anda untuk mulai melapor.</p>
        </div>
        
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="block w-full rounded-2xl bg-white border-slate-200 py-3.5 px-4 shadow-sm border focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                @error('name') <span class="text-red-500 text-xs mt-2 px-1 block font-medium">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-1">Email / NIS</label>
                <input type="text" name="email" value="{{ old('email') }}" required
                    class="block w-full rounded-2xl bg-white border-slate-200 py-3.5 px-4 shadow-sm border focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                @error('email') <span class="text-red-500 text-xs mt-2 px-1 block font-medium">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-1">Password</label>
                <input type="password" name="password" required
                    class="block w-full rounded-2xl bg-white border-slate-200 py-3.5 px-4 shadow-sm border focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                @error('password') <span class="text-red-500 text-xs mt-2 px-1 block font-medium">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                    class="block w-full rounded-2xl bg-white border-slate-200 py-3.5 px-4 shadow-sm border focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
            </div>

            <div class="pt-5">
                <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-full shadow-lg shadow-blue-500/25 text-[15px] font-bold text-white bg-blue-600 hover:bg-blue-700 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/50 transition-all">
                    Daftar Sekarang
                </button>
            </div>
            
            <div class="text-center mt-5">
                <a href="{{ route('login') }}" class="text-[13.5px] text-slate-500 hover:text-blue-600 font-semibold transition-colors">
                    Sudah punya akun? Masuk di sini
                </a>
            </div>
        </form>
    </div>
</body>
</html>
