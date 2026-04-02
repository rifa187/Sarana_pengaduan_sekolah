@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex items-start justify-between">
        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <a href="{{ route('complaints.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 text-slate-600 font-bold text-[13px] hover:text-blue-600 hover:border-blue-200 hover:bg-blue-50 transition-all shadow-sm group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Pengaduan</h1>
        </div>
        
        @if($complaint->status == 'menunggu')
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Menunggu Validasi</span>
        @elseif($complaint->status == 'diproses')
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-blue-50 text-blue-600 border border-blue-200">Sedang Diproses</span>
        @elseif($complaint->status == 'selesai')
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Selesai Ditangani</span>
        @elseif($complaint->status == 'ditolak')
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[13px] font-bold bg-red-50 text-red-600 border border-red-200">Laporan Ditolak</span>
        @endif
    </div>

    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden mb-8 relative">
        <!-- Decoration -->
        <div class="absolute right-0 top-0 w-32 h-32 bg-blue-50/50 rounded-bl-[4rem]"></div>

        <div class="p-8 sm:p-10 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Deskripsi Laporan -->
                <div class="md:col-span-2 space-y-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 leading-tight">{{ $complaint->judul }}</h2>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-3 mt-3 text-[13px] font-medium text-slate-500">
                            <span class="flex items-center gap-1.5 bg-slate-50 px-3 py-1 rounded-lg">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $complaint->created_at->format('d M Y, H:i') }}
                            </span>
                            <span class="flex items-center gap-1.5 bg-slate-50 px-3 py-1 rounded-lg">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                Kategori: {{ $complaint->kategori }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Deskripsi Lengkap</h3>
                        <div class="bg-slate-50/50 p-5 rounded-[1rem] border border-slate-100 text-slate-700 whitespace-pre-wrap leading-relaxed">{{ $complaint->deskripsi }}</div>
                    </div>
                </div>

                <!-- Bukti Foto -->
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Laporan Lampiran</h3>
                    @if($complaint->bukti_file)
                        <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-sm group relative">
                            @if(\Illuminate\Support\Str::endsWith(strtolower($complaint->bukti_file), ['.pdf']))
                                <div class="p-8 bg-slate-50 flex flex-col items-center justify-center text-center h-48 group-hover:bg-slate-100 transition-colors">
                                    <svg class="w-12 h-12 text-red-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span class="text-sm font-bold text-slate-700">Lampiran PDF</span>
                                    <a href="{{ \Illuminate\Support\Facades\Storage::url($complaint->bukti_file) }}" target="_blank" class="mt-3 text-blue-600 hover:text-blue-800 text-[13px] font-bold">Lihat Dokumen</a>
                                </div>
                            @else
                                <div class="relative block overflow-hidden aspect-[4/3] bg-slate-100">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($complaint->bukti_file) }}" alt="Bukti Lampiran" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($complaint->bukti_file) }}" target="_blank" class="px-5 py-2 bg-white/90 backdrop-blur rounded-full text-sm font-bold text-slate-800 shadow-lg">Perbesar</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="bg-slate-50 border border-slate-200 border-dashed rounded-2xl p-8 flex flex-col items-center justify-center text-center aspect-[4/3]">
                            <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-[13px] font-medium text-slate-400">Tidak ada lampiran</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modul Tanggapan -->
    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="bg-white px-8 py-6 border-b border-slate-100 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </div>
            <h3 class="text-[1.1rem] font-bold text-slate-800">Tracking & Tanggapan Petugas</h3>
        </div>
        
        <div class="p-8">
            @if(isset($complaint->responses) && $complaint->responses->count() > 0)
                <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-6 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 before:to-transparent">
                    @foreach($complaint->responses as $response)
                    <div class="relative flex items-start gap-6">
                        <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 rounded-full border-4 border-white bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-lg shadow-sm relative z-10">
                            A
                        </div>
                        <div class="bg-slate-50/80 border border-slate-100 rounded-2xl p-5 w-full relative">
                            <!-- Arrow point -->
                            <div class="absolute w-3 h-3 bg-slate-50/80 border-b border-l border-slate-100 rotate-45 -left-[7px] top-4"></div>
                            
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-bold text-slate-800 text-[14.5px]">Admin Sekolah</span>
                                <span class="text-xs font-semibold text-slate-400 bg-white px-2 py-1 rounded-md border border-slate-100">{{ $response->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-slate-600 leading-relaxed text-[13.5px] mt-2">{{ $response->tanggapan }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10 px-4">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 border border-slate-100">
                        <svg class="h-6 w-6 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <p class="text-slate-800 font-bold text-[15px]">Menunggu Keputusan Admin</p>
                    <p class="text-slate-500 text-[13px] mt-1 max-w-sm mx-auto">Laporan Anda telah berhasil diajukan dan sedang mengantri untuk di evaluasi oleh petugas kami.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
