@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="mb-8 p-8 bg-[#111111] rounded-[2rem] shadow-xl relative overflow-hidden text-white flex items-center justify-between">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-20 -bottom-20 w-64 h-64 bg-purple-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold tracking-tight mb-2">Manajemen Siswa</h1>
            <p class="text-slate-400 text-[15px]">Tambah, edit, dan kelola data akun siswa secara manual.</p>
        </div>
        <div class="relative z-10">
            <a href="{{ route('admin.students.create') }}"
               id="btn-tambah-siswa"
               class="inline-flex items-center gap-2 bg-white text-[#111111] font-bold px-5 py-3 rounded-xl hover:bg-slate-100 transition-all shadow-md hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Tambah Siswa
            </a>
        </div>
    </div>

    {{-- Notification --}}
    @if(session('success'))
    <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-6 py-4">
        <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <p class="font-medium text-sm">{{ session('success') }}</p>
    </div>
    @endif
    @if(session('error'))
    <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 rounded-2xl px-6 py-4">
        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <p class="font-medium text-sm">{{ session('error') }}</p>
    </div>
    @endif

    {{-- Search & Table --}}
    <div class="bg-white rounded-[1.75rem] shadow-sm border border-slate-100 overflow-hidden">
        {{-- Search Bar --}}
        <div class="px-8 py-5 border-b border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-2 h-6 bg-indigo-500 rounded-full"></div>
                <h2 class="text-xl font-bold text-slate-800">Daftar Siswa</h2>
                <span class="text-sm font-semibold text-slate-400 bg-slate-100 px-3 py-1 rounded-full">{{ $students->total() }} siswa</span>
            </div>
            <form method="GET" action="{{ route('admin.students.index') }}" class="flex gap-2 w-full sm:w-auto">
                <div class="relative flex-1 sm:w-72">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           id="input-cari-siswa"
                           placeholder="Cari nama, NIS, kelas, email..."
                           class="w-full pl-9 pr-4 py-2.5 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 transition">
                </div>
                <button type="submit" class="px-5 py-2.5 bg-[#111111] text-white text-sm font-bold rounded-xl hover:bg-black transition hover:-translate-y-0.5">Cari</button>
                @if(request('search'))
                <a href="{{ route('admin.students.index') }}" class="px-4 py-2.5 bg-slate-100 text-slate-600 text-sm font-semibold rounded-xl hover:bg-slate-200 transition">Reset</a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                        <th class="px-8 py-4">Nama / Email</th>
                        <th class="px-4 py-4">NIS</th>
                        <th class="px-4 py-4">Kelas</th>
                        <th class="px-4 py-4">Jurusan</th>
                        <th class="px-4 py-4">No. HP</th>
                        <th class="px-8 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($students as $student)
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-sm shrink-0">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800">{{ $student->name }}</p>
                                    <p class="text-slate-400 text-xs">{{ $student->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-slate-600 font-medium">{{ $student->nis ?? '-' }}</td>
                        <td class="px-4 py-4 text-slate-600 font-medium">{{ $student->kelas ?? '-' }}</td>
                        <td class="px-4 py-4 text-slate-600 font-medium">{{ $student->jurusan ?? '-' }}</td>
                        <td class="px-4 py-4 text-slate-600 font-medium">{{ $student->no_hp ?? '-' }}</td>
                        <td class="px-8 py-4 text-right whitespace-nowrap">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.students.edit', $student->id) }}"
                                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold bg-white border border-slate-200 text-slate-700 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700 transition-all shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.students.destroy', $student->id) }}"
                                      onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold bg-white border border-slate-200 text-slate-700 hover:border-red-200 hover:bg-red-50 hover:text-red-600 transition-all shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-16 text-center">
                            <div class="flex flex-col items-center gap-3 text-slate-400">
                                <svg class="w-12 h-12 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <p class="font-semibold text-slate-500">Belum ada data siswa.</p>
                                <a href="{{ route('admin.students.create') }}" class="text-indigo-600 font-bold text-sm hover:underline">+ Tambah Siswa Baru</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($students->hasPages())
        <div class="px-8 py-5 border-t border-slate-100">
            {{ $students->links() }}
        </div>
        @endif
    </div>

    {{-- Back button --}}
    <div class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-800 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
