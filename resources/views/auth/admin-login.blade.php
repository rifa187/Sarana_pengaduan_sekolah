<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - LaporPak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0c0a09; } </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative antialiased z-0 text-slate-200">
    <!-- Abstract dark background decorations -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] right-[-10%] w-[600px] h-[600px] rounded-full bg-blue-900/20 blur-[120px]"></div>
        <div class="absolute bottom-[-20%] left-[-10%] w-[500px] h-[500px] rounded-full bg-indigo-900/20 blur-[100px]"></div>
    </div>

    <!-- Back to home -->
    <div class="absolute top-8 left-8">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/5 backdrop-blur-md border border-white/10 text-slate-300 font-bold text-[14px] hover:text-white hover:bg-white/10 transition-all shadow-sm group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>
    </div>

    <div class="max-w-md w-full bg-[#1c1917]/80 backdrop-blur-xl rounded-[2rem] shadow-2xl overflow-hidden border border-slate-800 p-8 sm:p-10">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-slate-700 shadow-inner">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <h2 class="text-[1.75rem] font-bold text-white leading-tight">Admin Portal</h2>
            <p class="text-slate-400 mt-2 text-[14px]">Masuk sebagai pengelola sarana sekolah.</p>
        </div>
        
        <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
            @csrf
            <div>
                <label for="nis" class="block text-sm font-semibold text-slate-300 mb-1.5 px-1">Username / NIP</label>
                <input id="nis" type="text" name="nis" value="{{ old('nis') }}" required autofocus
                    class="block w-full rounded-2xl bg-[#0c0a09] border-slate-700 py-3.5 px-4 shadow-inner border focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-white outline-none placeholder-slate-600">
                @error('nis') <span class="text-red-400 text-xs mt-2 px-1 block font-medium">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-300 mb-1.5 px-1">Password</label>
                <input id="password" type="password" name="password" required
                    class="block w-full rounded-2xl bg-[#0c0a09] border-slate-700 py-3.5 px-4 shadow-inner border focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-white outline-none placeholder-slate-600">
                @error('password') <span class="text-red-400 text-xs mt-2 px-1 block font-medium">{{ $message }}</span> @enderror
            </div>
            
            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-full shadow-lg shadow-blue-900/50 text-[15px] font-bold text-white bg-blue-600 hover:bg-blue-500 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/40 transition-all">
                    Masuk ke Dashboard
                </button>
            </div>
        </form>
    </div>
</body>
</html>
