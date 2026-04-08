<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex items-start justify-between">
        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <a href="<?php echo e(route('complaints.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 text-slate-600 font-bold text-[13px] hover:text-blue-600 hover:border-blue-200 hover:bg-blue-50 transition-all shadow-sm group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Pengaduan</h1>
        </div>
        
        <?php if($complaint->status == 'menunggu'): ?>
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Menunggu Validasi</span>
        <?php elseif($complaint->status == 'diproses'): ?>
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-blue-50 text-blue-600 border border-blue-200">Sedang Diproses</span>
        <?php elseif($complaint->status == 'selesai'): ?>
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Selesai Ditangani</span>
        <?php elseif($complaint->status == 'ditolak'): ?>
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-red-50 text-red-600 border border-red-200">Laporan Ditolak</span>
        <?php endif; ?>
    </div>

    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden mb-8 relative">
        <!-- Decoration -->
        <div class="absolute right-0 top-0 w-32 h-32 bg-blue-50/50 rounded-bl-[4rem]"></div>

        <div class="p-8 sm:p-10 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Deskripsi Laporan -->
                <div class="md:col-span-2 space-y-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 leading-tight"><?php echo e($complaint->judul); ?></h2>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-3 mt-3 text-[13px] font-medium text-slate-500">
                            <span class="flex items-center gap-1.5 bg-slate-50 px-3 py-1 rounded-lg">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <?php echo e($complaint->created_at->format('d M Y, H:i')); ?>

                            </span>
                            <span class="flex items-center gap-1.5 bg-slate-50 px-3 py-1 rounded-lg">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                Kategori: <?php echo e($complaint->kategori); ?>

                            </span>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Deskripsi Lengkap</h3>
                        <div class="bg-slate-50/50 p-5 rounded-[1rem] border border-slate-100 text-slate-700 whitespace-pre-wrap leading-relaxed"><?php echo e($complaint->deskripsi); ?></div>
                    </div>
                </div>

                <!-- Bukti Foto -->
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Bukti Foto / Dokumen</h3>
                    <?php if($complaint->bukti_file): ?>
                        <div class="rounded-xl overflow-hidden border border-slate-200 shadow-sm group relative">
                            <?php if(\Illuminate\Support\Str::endsWith(strtolower($complaint->bukti_file), ['.pdf'])): ?>
                                <div class="p-6 bg-gradient-to-br from-red-50 to-red-100/50 flex flex-col items-center justify-center text-center h-40">
                                    <svg class="w-10 h-10 text-red-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span class="text-sm font-bold text-slate-700">Dokumen PDF</span>
                                    <a href="<?php echo e(Storage::url($complaint->bukti_file)); ?>" target="_blank" class="mt-2 inline-flex items-center gap-1 text-red-600 hover:text-red-700 text-xs font-bold transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Unduh
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="relative block overflow-hidden aspect-[4/3] bg-slate-100">
                                    <img src="<?php echo e(Storage::url($complaint->bukti_file)); ?>" 
                                         alt="Bukti Laporan" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                         onerror="this.style.display='none'; document.getElementById('img-error-<?php echo e($complaint->id); ?>').style.display='flex'">
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <a href="<?php echo e(Storage::url($complaint->bukti_file)); ?>" target="_blank" class="px-4 py-2 bg-white/95 backdrop-blur rounded-lg text-xs font-bold text-slate-800 shadow-lg hover:bg-white transition-colors">
                                            Perbesar Foto
                                        </a>
                                    </div>
                                </div>
                                <div id="img-error-<?php echo e($complaint->id); ?>" class="hidden w-full aspect-[4/3] bg-slate-50 flex flex-col items-center justify-center text-center">
                                    <svg class="w-8 h-8 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span class="text-xs text-slate-400 font-medium">Foto tidak dapat dimuat</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="bg-slate-50 border border-slate-200 border-dashed rounded-xl p-6 flex flex-col items-center justify-center text-center aspect-[4/3]">
                            <svg class="w-10 h-10 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs font-medium text-slate-400">Tidak ada bukti lampiran</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modul Tanggapan (Minimalis) -->
    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-8 py-5 border-b border-slate-100 flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
            <h3 class="text-base font-bold text-slate-800">Tanggapan Admin</h3>
        </div>
        
        <div class="p-6">
            <?php if(isset($complaint->responses) && $complaint->responses->count() > 0): ?>
                <div class="space-y-4">
                    <?php $__currentLoopData = $complaint->responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-slate-50 border border-slate-200 rounded-lg p-4">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-sm font-semibold text-blue-600">Admin</span>
                            <span class="text-xs text-slate-400"><?php echo e($response->created_at->format('d M Y, H:i')); ?></span>
                        </div>
                        <p class="text-slate-700 text-sm leading-relaxed"><?php echo e($response->tanggapan); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center py-8 px-4">
                    <svg class="h-10 w-10 text-slate-300 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-slate-700 font-semibold text-sm">Belum ada tanggapan</p>
                    <p class="text-slate-500 text-xs mt-1">Admin akan memberikan tanggapan setelah laporan diverifikasi</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sarana_pengaduan_sekolah\resources\views/student/complaints/show.blade.php ENDPATH**/ ?>