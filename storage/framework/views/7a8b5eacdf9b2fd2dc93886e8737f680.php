<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Pengaduan Sekolah - LaporPak</title>
    <!-- Tailwind CSS CDN for guaranteed styling during development -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#fafbfd] text-slate-800 min-h-screen flex flex-col relative antialiased z-0">
    
    <!-- Abstract background decorations -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] rounded-full bg-blue-100/40 blur-[100px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] rounded-full bg-blue-50/50 blur-[80px]"></div>
    </div>

    <!-- Navbar -->
    <nav class="bg-white/70 backdrop-blur-md border-b border-slate-200/60 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-[72px] items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:scale-105 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </div>
                        <span class="font-bold text-xl tracking-tight text-slate-800">LaporPak</span>
                    </a>
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-4">
                    <?php if(auth()->guard()->check()): ?>
                    <div class="text-slate-500 text-sm hidden sm:block font-medium">
                        Halo, <span class="font-bold text-slate-800"><?php echo e(auth()->user()->name); ?></span>
                    </div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-white border border-slate-200 hover:border-slate-300 hover:bg-slate-50 px-5 py-2.5 rounded-full text-sm font-semibold text-slate-700 transition-all duration-200 shadow-sm hover:shadow">
                            Logout
                        </button>
                    </form>
                    <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-slate-600 font-medium hover:text-blue-600 transition-colors">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fade-in-up">
        <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-emerald-50/80 backdrop-blur-sm border border-emerald-100 rounded-[1rem] shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-emerald-100 text-emerald-600 rounded-full">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-emerald-800 font-semibold"><?php echo e(session('success')); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <div class="mb-6 p-4 bg-red-50/80 backdrop-blur-sm border border-red-100 rounded-[1rem] shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-800 font-semibold"><?php echo e(session('error')); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.4s ease-out forwards;
        }
    </style>
</body>
</html>
<?php /**PATH C:\laragon\www\Sarana_pengaduan_sekolah\resources\views/layouts/app.blade.php ENDPATH**/ ?>