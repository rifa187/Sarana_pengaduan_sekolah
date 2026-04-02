@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8 flex items-start justify-between">
        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <a href="{{ route('admin.complaints.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 text-slate-600 font-bold text-[13px] hover:text-black hover:border-slate-400 hover:bg-slate-50 transition-all shadow-sm group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Evaluasi Tindak Lanjut</h1>
                <p class="text-[13px] font-medium text-slate-500 mt-1">Review laporan dan update status penyelesaian masalah.</p>
            </div>
        </div>
        
        <div class="px-5 py-2.5 bg-slate-900 rounded-full text-[13px] font-bold text-white shadow-lg flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
            #P-{{ str_pad($complaint->id, 5, '0', STR_PAD_LEFT) }}
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Informasi Keluhan -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden relative">
                <div class="px-8 py-6 bg-white border-b border-slate-100 flex items-center gap-3">
                    <div class="w-2 h-6 bg-blue-500 rounded-full"></div>
                    <h3 class="text-[1.1rem] font-bold text-slate-800">Form Laporan Siswa</h3>
                    
                    <div class="ml-auto">
                    @if($complaint->status == 'menunggu')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Menunggu Verifikasi</span>
                    @elseif($complaint->status == 'diproses')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-blue-50 text-blue-600 border border-blue-200">Sedang Diproses</span>
                    @elseif($complaint->status == 'selesai')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Selesai Ditangani</span>
                    @elseif($complaint->status == 'ditolak')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-red-50 text-red-600 border border-red-200">Ditolak</span>
                    @endif
                    </div>
                </div>
                <div class="p-8 space-y-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 leading-tight">{{ $complaint->judul }}</h2>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-3 mt-4 text-[13px] font-medium text-slate-500">
                            <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ $complaint->created_at->format('d F Y, H:i') }} WIB</span>
                            <span class="flex items-center gap-1.5 bg-slate-50 px-3 py-1 rounded-lg border border-slate-100"><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg> {{ $complaint->kategori }}</span>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-3">Deskripsi / Kronologi</h3>
                        <div class="bg-blue-50/30 p-5 rounded-2xl text-slate-700 whitespace-pre-wrap leading-relaxed border border-blue-50 font-medium">{{ $complaint->deskripsi }}</div>
                    </div>
                    
                    <div>
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-3">Bukti Lampiran Siswa</h3>
                        @if($complaint->bukti_file)
                            <div class="rounded-2xl overflow-hidden border border-slate-200 group relative">
                                @if(\Illuminate\Support\Str::endsWith(strtolower($complaint->bukti_file), ['.pdf']))
                                    <div class="p-8 bg-slate-50 flex flex-col items-center justify-center text-center h-48 group-hover:bg-slate-100 transition-colors">
                                        <svg class="w-12 h-12 text-red-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($complaint->bukti_file) }}" target="_blank" class="mt-2 inline-block px-5 py-2.5 bg-white border border-slate-200 rounded-full shadow-sm text-[13px] font-bold text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">Verifikasi Dokumen PDF</a>
                                    </div>
                                @else
                                    <div class="relative block overflow-hidden bg-slate-100 max-h-96">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($complaint->bukti_file) }}" alt="Bukti Foto" class="w-full h-auto object-contain">
                                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($complaint->bukti_file) }}" target="_blank" class="px-5 py-2 bg-white/90 backdrop-blur rounded-full text-sm font-bold text-slate-800 shadow-lg">Buka Ukuran Asli</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="bg-slate-50 border border-slate-200 border-dashed rounded-2xl p-8 text-center flex flex-col justify-center items-center h-40">
                                <svg class="w-10 h-10 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-[13px] font-medium text-slate-400">Tidak ada bukti visual (Foto/PDF) dilampirkan oleh pelapor.</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Aksi -->
        <div class="space-y-6">
            <!-- Data Pelapor -->
            <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-6 py-5 bg-slate-50/50 border-b border-slate-100 flex items-center gap-3">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <h3 class="text-[1.1rem] font-bold text-slate-800">Profil Pelapor</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-14 h-14 rounded-[1rem] bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 font-extrabold text-2xl shadow-inner">
                            {{ substr($complaint->user->name ?? 'G', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-[15px] text-slate-800 block">{{ $complaint->user->name ?? 'Akun Terhapus' }}</p>
                            <span class="inline-block mt-1 px-2.5 py-1 bg-slate-100 rounded-md text-[11px] font-bold text-slate-500 uppercase tracking-wide">Siswa</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-6 pt-5 border-t border-slate-100">
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-center">
                            <p class="text-[11px] text-slate-400 uppercase font-bold mb-1">N.I.S</p>
                            <p class="text-[13px] text-slate-800 font-bold max-w-full truncate" title="{{ $complaint->user->nis ?? '-' }}">{{ $complaint->user->nis ?? '-' }}</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-center">
                            <p class="text-[11px] text-slate-400 uppercase font-bold mb-1">Kelas</p>
                            <p class="text-[13px] text-slate-800 font-bold max-w-full truncate" title="{{ $complaint->user->kelas ?? '-' }}">{{ $complaint->user->kelas ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proses Tindak Lanjut -->
            <div class="bg-white rounded-[1.5rem] shadow-lg shadow-blue-900/5 border border-slate-100 overflow-hidden">
                <div class="px-6 py-5 bg-[#111111] border-b border-black flex items-center gap-3">
                    <div class="w-6 h-6 rounded-md bg-blue-500/20 text-blue-400 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-[1.1rem] font-bold text-white">Tindakan Admin</h3>
                </div>
                <div class="p-6 bg-slate-50/50">
                    <form action="{{ route('admin.complaints.status', $complaint->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label class="block text-[13.5px] font-bold text-slate-700 mb-2 px-1">Tahap Penyelesaian (Status)</label>
                            <select name="status" class="w-full rounded-xl border-slate-200 py-3.5 px-4 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 text-slate-700 font-medium bg-white shadow-sm border transition-all cursor-pointer appearance-none">
                                <option value="menunggu" {{ $complaint->status == 'menunggu' ? 'selected' : '' }}>⏳ Menunggu (Belum Diverifikasi)</option>
                                <option value="diproses" {{ $complaint->status == 'diproses' ? 'selected' : '' }}>🛠️ Diproses (Sedang Dikerjakan)</option>
                                <option value="selesai" {{ $complaint->status == 'selesai' ? 'selected' : '' }}>✅ Selesai (Sudah Diperbaiki)</option>
                                <option value="ditolak" {{ $complaint->status == 'ditolak' ? 'selected' : '' }}>❌ Ditolak (Tidak Valid)</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-[#111111] hover:bg-black text-white rounded-xl py-3.5 text-[14px] font-bold transition-all shadow-md focus:ring-4 focus:ring-slate-300 hover:-translate-y-0.5">
                            Update & Informasikan Siswa
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="bg-blue-50/80 border border-blue-100 rounded-xl p-4">
                <p class="text-[12.5px] text-blue-800 font-medium leading-relaxed">
                    <span class="font-bold flex items-center gap-1.5 mb-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Quick Info</span>
                    Status yang Anda ganti akan otomatis ter-update dan bisa dilihat langsung oleh siswa melalui menu riwayat pengaduan mereka.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
