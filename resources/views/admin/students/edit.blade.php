@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    {{-- Header --}}
    <div class="mb-8 p-8 bg-[#111111] rounded-[2rem] shadow-xl relative overflow-hidden text-white">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <h1 class="text-3xl font-bold tracking-tight mb-2 relative z-10">Edit Data Siswa</h1>
        <p class="text-slate-400 text-[15px] relative z-10">Perbarui informasi akun siswa <span class="text-white font-semibold">{{ $student->name }}</span>.</p>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-[1.75rem] shadow-sm border border-slate-100 p-8">

        @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-4">
            <p class="font-bold text-red-700 text-sm mb-2">Terdapat kesalahan:</p>
            <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.students.update', $student->id) }}" id="form-edit-siswa">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                {{-- Nama Lengkap --}}
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition {{ $errors->has('name') ? 'border-red-400 bg-red-50' : '' }}">
                </div>

                {{-- NIS --}}
                <div>
                    <label for="nis" class="block text-sm font-bold text-slate-700 mb-1.5">NIS</label>
                    <input type="text" id="nis" name="nis" value="{{ old('nis', $student->nis) }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition {{ $errors->has('nis') ? 'border-red-400 bg-red-50' : '' }}">
                </div>

                {{-- Kelas --}}
                <div>
                    <label for="kelas" class="block text-sm font-bold text-slate-700 mb-1.5">Kelas</label>
                    <input type="text" id="kelas" name="kelas" value="{{ old('kelas', $student->kelas) }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition">
                </div>

                {{-- Jurusan --}}
                <div>
                    <label for="jurusan" class="block text-sm font-bold text-slate-700 mb-1.5">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', $student->jurusan) }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition">
                </div>

                {{-- No. HP --}}
                <div>
                    <label for="no_hp" class="block text-sm font-bold text-slate-700 mb-1.5">Nomor HP</label>
                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $student->no_hp) }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition">
                </div>

                {{-- Email --}}
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition {{ $errors->has('email') ? 'border-red-400 bg-red-50' : '' }}">
                </div>

                {{-- Divider --}}
                <div class="sm:col-span-2">
                    <div class="border-t border-slate-100 pt-4">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Ganti Password</p>
                        <p class="text-xs text-slate-400">Kosongkan jika tidak ingin mengubah password.</p>
                    </div>
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-1.5">Password Baru</label>
                    <input type="password" id="password" name="password"
                           placeholder="Min. 6 karakter"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition {{ $errors->has('password') ? 'border-red-400 bg-red-50' : '' }}">
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-1.5">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           placeholder="Ulangi password baru"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-200 focus:border-amber-400 transition">
                </div>

            </div>

            {{-- Actions --}}
            <div class="mt-8 flex items-center gap-3 justify-end">
                <a href="{{ route('admin.students.index') }}"
                   class="px-6 py-3 rounded-xl text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                    Batal
                </a>
                <button type="submit" id="btn-update-siswa"
                        class="px-8 py-3 bg-[#111111] text-white rounded-xl text-sm font-bold hover:bg-black transition hover:-translate-y-0.5 shadow-md focus:ring-4 focus:ring-slate-300">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
