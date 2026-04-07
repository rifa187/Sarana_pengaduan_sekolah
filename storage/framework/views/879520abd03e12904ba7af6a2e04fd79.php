<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto">
    <div class="mb-8 flex items-start gap-4">
        <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-2 px-4 py-2 mt-1 rounded-full bg-white border border-slate-200 text-slate-600 font-bold text-[13px] hover:text-blue-600 hover:border-blue-200 hover:bg-blue-50 transition-all shadow-sm group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Buat Laporan Baru</h1>
            <p class="text-slate-500 text-[13px] mt-0.5">Mohon isi detail kerusakan dengan jelas dan valid.</p>
        </div>
    </div>

    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 sm:p-10">
            <form action="<?php echo e(route('complaints.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?php echo csrf_field(); ?>
                
                <div>
                    <label for="judul" class="block text-[14px] font-bold text-slate-700 mb-2 px-1">Judul Laporan <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" id="judul" required value="<?php echo e(old('judul')); ?>" placeholder="Contoh: AC Kelas XII RPL Rusak" 
                           class="w-full rounded-xl bg-slate-50 border-slate-200 py-3.5 px-4 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all text-slate-800 font-medium">
                    <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 px-1 text-sm font-medium text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="kategori" class="block text-[14px] font-bold text-slate-700 mb-2 px-1">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" id="kategori" required class="w-full rounded-xl bg-slate-50 border-slate-200 py-3.5 px-4 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all text-slate-800 font-medium">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Sarana" <?php echo e(old('kategori') == 'Sarana' ? 'selected' : ''); ?>>Sarana (Peralatan, Meja, Kursi)</option>
                        <option value="Prasarana" <?php echo e(old('kategori') == 'Prasarana' ? 'selected' : ''); ?>>Prasarana (Gedung, Lapangan)</option>
                        <option value="Layanan" <?php echo e(old('kategori') == 'Layanan' ? 'selected' : ''); ?>>Layanan Umum (Kantin, Perpus)</option>
                        <option value="Lainnya" <?php echo e(old('kategori') == 'Lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                    </select>
                    <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 px-1 text-sm font-medium text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="deskripsi" class="block text-[14px] font-bold text-slate-700 mb-2 px-1">Deskripsi Detail <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" required placeholder="Jelaskan secara rinci kerusakan atau masalah yang Anda temui..." 
                              class="w-full rounded-xl bg-slate-50 border-slate-200 py-3.5 px-4 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all text-slate-800 font-medium leading-relaxed"><?php echo e(old('deskripsi')); ?></textarea>
                    <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 px-1 text-sm font-medium text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-[14px] font-bold text-slate-700 mb-2 px-1">Bukti Foto <span class="text-slate-400 font-normal">(Opsional)</span></label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-xl bg-slate-50 hover:bg-blue-50/50 hover:border-blue-300 transition-colors group cursor-pointer relative">
                        <div class="space-y-2 text-center pointer-events-none">
                            <div class="w-14 h-14 bg-white shadow-sm border border-slate-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                                <svg class="h-6 w-6 text-blue-500" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex text-[14px] text-slate-600 justify-center">
                                <span class="relative font-bold text-blue-600 hover:text-blue-500 cursor-pointer">
                                    <span>Upload file bukti</span>
                                </span>
                                <p class="pl-1 font-medium">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-slate-400 font-medium">PNG, JPG, PDF (Max. 2MB)</p>
                        </div>
                        <input id="bukti_file" name="bukti_file" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                    <?php $__errorArgs = ['bukti_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-2 px-1 text-sm font-medium text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="pt-6 flex flex-col-reverse sm:flex-row justify-end gap-3 border-t border-slate-100">
                    <a href="<?php echo e(route('complaints.index')); ?>" class="px-6 py-3 text-[14px] font-bold text-slate-600 bg-white border border-slate-200 rounded-full hover:bg-slate-50 transition-colors text-center shadow-sm">Batalkan</a>
                    <button type="submit" class="px-6 py-3 text-[14px] font-bold text-white bg-blue-600 border border-transparent rounded-full hover:bg-blue-700 focus:ring-4 focus:ring-blue-500/30 transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 text-center">
                        Kirim Laporan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sarana_pengaduan_sekolah\resources\views/student/complaints/create.blade.php ENDPATH**/ ?>