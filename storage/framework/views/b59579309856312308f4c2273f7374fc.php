<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">

   

    
    <div class="bg-white rounded-[1.75rem] shadow-sm border border-slate-100 p-8">

        <?php if($errors->any()): ?>
        <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-4">
            <p class="font-bold text-red-700 text-sm mb-2">Terdapat kesalahan:</p>
            <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.students.store')); ?>" id="form-tambah-siswa">
            <?php echo csrf_field(); ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>"
                           placeholder="nama lengkap siswa"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition <?php echo e($errors->has('name') ? 'border-red-400 bg-red-50' : ''); ?>">
                </div>

                
                <div>
                    <label for="nis" class="block text-sm font-bold text-slate-700 mb-1.5">NIS</label>
                    <input type="text" id="nis" name="nis" value="<?php echo e(old('nis')); ?>"
                           placeholder="NIS siswa"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition <?php echo e($errors->has('nis') ? 'border-red-400 bg-red-50' : ''); ?>">
                </div>

                
                <div>
                    <label for="kelas" class="block text-sm font-bold text-slate-700 mb-1.5">Kelas</label>
                    <input type="text" id="kelas" name="kelas" value="<?php echo e(old('kelas')); ?>"
                           placeholder="kelas"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition">
                </div>

                
                <div>
                    <label for="jurusan" class="block text-sm font-bold text-slate-700 mb-1.5">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" value="<?php echo e(old('jurusan')); ?>"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition">
                </div>

                
                <div>
                    <label for="no_hp" class="block text-sm font-bold text-slate-700 mb-1.5">Nomor HP</label>
                    <input type="text" id="no_hp" name="no_hp" value="<?php echo e(old('no_hp')); ?>"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition">
                </div>

                
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition <?php echo e($errors->has('email') ? 'border-red-400 bg-red-50' : ''); ?>">
                </div>

                
                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-1.5">Password <span class="text-red-500">*</span></label>
                    <input type="password" id="password" name="password"
                           placeholder="Min. 6 karakter"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition <?php echo e($errors->has('password') ? 'border-red-400 bg-red-50' : ''); ?>">
                </div>

                
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-1.5">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           placeholder="Ulangi password"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition">
                </div>

            </div>

            
            <div class="mt-8 flex items-center gap-3 justify-end">
                <a href="<?php echo e(route('admin.students.index')); ?>"
                   class="px-6 py-3 rounded-xl text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                    Batal
                </a>
                <button type="submit" id="btn-simpan-siswa"
                        class="px-8 py-3 bg-[#111111] text-white rounded-xl text-sm font-bold hover:bg-black transition hover:-translate-y-0.5 shadow-md focus:ring-4 focus:ring-slate-300">
                    Simpan Siswa
                </button>
            </div>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sarana_pengaduan_sekolah\resources\views/admin/students/create.blade.php ENDPATH**/ ?>