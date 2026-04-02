<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa - LaporPak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fafbfd; } </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative antialiased z-0">
    <!-- Abstract background decorations -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] rounded-full bg-blue-100/40 blur-[100px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] rounded-full bg-blue-50/50 blur-[80px]"></div>
    </div>
    
    <div class="absolute top-8 left-8">
        <a href="<?php echo e(url('/')); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/70 backdrop-blur-md border border-slate-200/60 text-slate-600 font-bold text-[14px] hover:text-blue-600 hover:border-blue-200 hover:bg-white transition-all shadow-sm group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>
    </div>

    <div class="max-w-md w-full bg-white/70 backdrop-blur-xl rounded-[2rem] shadow-sm overflow-hidden border border-slate-100/60 p-8 sm:p-10">
        <div class="text-center mb-8">
            <h2 class="text-[1.75rem] font-bold text-slate-800 leading-tight">Selamat Datang 👋</h2>
            <p class="text-slate-500 mt-2 text-[14px]">Masuk ke portal siswa untuk membuat laporan.</p>
        </div>
        
        <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5">
            <?php echo csrf_field(); ?>
            <div>
                <label for="nis" class="block text-sm font-semibold text-slate-700 mb-1.5 px-1">NIS / Email</label>
                <input id="nis" type="text" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username"
                    class="block w-full rounded-2xl bg-white border-slate-200 py-3.5 px-4 shadow-sm border focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-2 px-1 block font-medium"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5 px-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full rounded-2xl bg-white border-slate-200 py-3.5 px-4 shadow-sm border focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-2 px-1 block font-medium"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="flex items-center justify-between px-1 py-1">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 w-4 h-4 cursor-pointer">
                    <span class="ml-2 text-[13px] font-medium text-slate-500">Ingat Saya</span>
                </label>
            </div>
            
            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-full shadow-lg shadow-blue-500/25 text-[15px] font-bold text-white bg-blue-600 hover:bg-blue-700 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/50 transition-all">
                    Masuk Sekarang
                </button>
            </div>

            <?php if(Route::has('register')): ?>
            <div class="text-center mt-6">
                <a href="<?php echo e(route('register')); ?>" class="text-[13.5px] text-slate-500 hover:text-blue-600 font-semibold transition-colors">
                    Belum punya akun? Daftar di sini
                </a>
            </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\Sarana_pengaduan_sekolah\resources\views/auth/login.blade.php ENDPATH**/ ?>