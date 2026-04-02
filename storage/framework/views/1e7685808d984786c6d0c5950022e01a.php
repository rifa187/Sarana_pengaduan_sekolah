<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-8 p-8 bg-[#111111] rounded-[2rem] shadow-xl relative overflow-hidden text-white flex items-center justify-between">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-20 -bottom-20 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10">
            <h1 class="text-3xl font-bold tracking-tight mb-2">Admin Dashboard</h1>
            <p class="text-slate-400 text-[15px]">Ringkasan seluruh laporan pengaduan fasilitas sekolah.</p>
        </div>
        <div class="relative z-10 hidden sm:block">
            <div class="w-16 h-16 bg-slate-800 rounded-[1.25rem] flex items-center justify-center border border-slate-700 shadow-inner">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Total -->
        <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center text-slate-500 border border-slate-100 group-hover:bg-slate-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Total Pengaduan</p>
            </div>
            <p class="text-4xl font-extrabold text-slate-800"><?php echo e($totalComplaints); ?></p>
        </div>

        <!-- Pending -->
        <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-amber-50 rounded-full opacity-50 block"></div>
            <div class="flex items-center gap-4 mb-4 relative z-10">
                <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center text-amber-500 border border-amber-100 group-hover:bg-amber-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-sm font-semibold text-amber-600 uppercase tracking-wide">Menunggu Verifikasi</p>
            </div>
            <p class="text-4xl font-extrabold text-slate-800 relative z-10"><?php echo e($pendingComplaints); ?></p>
        </div>

        <!-- Process -->
        <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-blue-50 rounded-full opacity-50 block"></div>
            <div class="flex items-center gap-4 mb-4 relative z-10">
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-500 border border-blue-100 group-hover:bg-blue-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Sedang Diproses</p>
            </div>
            <p class="text-4xl font-extrabold text-slate-800 relative z-10"><?php echo e($processComplaints); ?></p>
        </div>

        <!-- Finished -->
        <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-emerald-50 rounded-full opacity-50 block"></div>
            <div class="flex items-center gap-4 mb-4 relative z-10">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 border border-emerald-100 group-hover:bg-emerald-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="text-sm font-semibold text-emerald-600 uppercase tracking-wide">Selesai Ditangani</p>
            </div>
            <p class="text-4xl font-extrabold text-slate-800 relative z-10"><?php echo e($finishedComplaints); ?></p>
        </div>
    </div>

    <!-- Data Table & Import -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-white">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-6 bg-blue-500 rounded-full"></div>
                        <h2 class="text-xl font-bold text-slate-800">5 Pengaduan Terbaru</h2>
                    </div>
                    <a href="<?php echo e(route('admin.complaints.index')); ?>" class="text-sm font-semibold text-blue-600 hover:text-blue-800 px-4 py-2 hover:bg-blue-50 rounded-full transition-colors flex items-center gap-1">Lihat Semua <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg></a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <tbody class="text-slate-700 divide-y divide-slate-100">
                            <?php if(count($recentComplaints) > 0): ?>
                                <?php $__currentLoopData = $recentComplaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-slate-50 transition-colors group">
                                    <td class="py-5 px-8 text-[13.5px] font-medium text-slate-400 w-32 whitespace-nowrap">
                                        <?php echo e($complaint->created_at->format('d M, H:i')); ?>

                                    </td>
                                    <td class="py-5 px-4 w-full">
                                        <p class="font-bold text-[15px] text-slate-800 tracking-tight"><?php echo e($complaint->judul); ?></p>
                                        <p class="text-[13px] font-medium text-slate-500 mt-0.5"><?php echo e($complaint->user->name ?? 'User Terhapus'); ?></p>
                                    </td>
                                    <td class="py-5 px-8 text-right whitespace-nowrap">
                                        <a href="<?php echo e(route('admin.complaints.show', $complaint->id)); ?>" class="inline-flex items-center px-5 py-2 rounded-full text-[13px] font-bold bg-white border border-slate-200 text-slate-700 group-hover:border-blue-200 group-hover:bg-blue-50 group-hover:text-blue-700 transition-all shadow-sm group-hover:shadow">Verifikasi</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="3" class="py-12 text-center text-slate-500 font-medium">Belum ada data pengaduan masuk.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div>
            <!-- Modul Import -->
            <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden relative">
                <div class="px-8 py-6 border-b border-slate-100 bg-white">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center border border-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">Import Data Siswa</h2>
                    </div>
                </div>
                <div class="p-8">
                    <p class="text-[13.5px] font-medium text-slate-500 mb-6 leading-relaxed">Tambahkan user siswa secara massal menggunakan file Spreadsheet (CSV) agar mereka dapat login.</p>
                    <form action="<?php echo e(route('admin.students.import')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-5">
                            <label class="block sr-only">Pilih File CSV</label>
                            <input type="file" name="file" required accept=".csv" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border file:border-blue-100 file:text-[13px] file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all cursor-pointer">
                        </div>
                        <button type="submit" class="w-full bg-[#111111] hover:bg-black text-white rounded-xl py-3 text-[14.5px] font-bold transition-all shadow-md focus:ring-4 focus:ring-slate-300 hover:-translate-y-0.5">
                            Mulai Import
                        </button>
                    </form>
                    <div class="mt-6 p-4 bg-slate-50 border border-slate-100 rounded-xl">
                        <p class="text-[12.5px] text-slate-600 max-w-full leading-snug"><span class="font-bold text-slate-800">Format Header CSV (Wajib):</span><br><br>NIS, Nama_Lengkap, Kelas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sarana_pengaduan_sekolah\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>