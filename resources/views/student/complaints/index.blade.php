@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 text-slate-600 font-bold text-[13px] hover:text-blue-600 hover:border-blue-200 hover:bg-blue-50 transition-all shadow-sm group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Riwayat Pengaduan Saya</h1>
                <p class="text-slate-500 text-[13.5px] mt-1">Daftar semua keluhan yang pernah Anda ajukan dan kerjakan.</p>
            </div>
        </div>
        <a href="{{ route('complaints.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full text-[14px] font-bold flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Buat Laporan Baru
        </a>
    </div>

    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
        @if($complaints->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-slate-400 text-[12px] uppercase tracking-wider font-bold">
                        <th class="py-5 px-8">Tanggal</th>
                        <th class="py-5 px-6">Judul Laporan</th>
                        <th class="py-5 px-6">Kategori</th>
                        <th class="py-5 px-6">Status</th>
                        <th class="py-5 px-8 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 divide-y divide-slate-50">
                    @foreach($complaints as $complaint)
                    <tr class="hover:bg-slate-50/80 transition-colors group">
                        <td class="py-5 px-8 whitespace-nowrap text-[13.5px] font-medium text-slate-400 w-32">
                            {{ $complaint->created_at->format('d M Y') }}
                        </td>
                        <td class="py-5 px-6">
                            <p class="font-bold text-[14.5px] text-slate-800 truncate max-w-xs md:max-w-md">{{ $complaint->judul }}</p>
                        </td>
                        <td class="py-5 px-6 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50">
                                {{ $complaint->kategori }}
                            </span>
                        </td>
                        <td class="py-5 px-6 whitespace-nowrap">
                            @if($complaint->status == 'menunggu')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Menunggu</span>
                            @elseif($complaint->status == 'diproses')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-blue-50 text-blue-600 border border-blue-200">Diproses</span>
                            @elseif($complaint->status == 'selesai')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Selesai</span>
                            @elseif($complaint->status == 'ditolak')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-red-50 text-red-600 border border-red-200">Ditolak</span>
                            @endif
                        </td>
                        <td class="py-5 px-8 whitespace-nowrap text-right">
                            <a href="{{ route('complaints.show', $complaint->id) }}" class="inline-flex items-center px-5 py-2 rounded-full text-[13px] font-bold bg-white border border-slate-200 text-slate-700 group-hover:border-blue-200 group-hover:bg-blue-50 group-hover:text-blue-700 transition-all shadow-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="py-16 px-6 text-center text-slate-500">
            <div class="w-16 h-16 bg-slate-50 rounded-[1.25rem] flex items-center justify-center mx-auto mb-4 border border-slate-100 shadow-sm">
                <svg class="h-8 w-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <p class="text-lg font-bold text-slate-800 mb-1">Belum Ada Pengaduan</p>
            <p class="text-[14px]">Anda belum pernah membuat laporan apapun. Mari laporkan kerusakan jika menemukannya.</p>
            <div class="mt-6">
                <a href="{{ route('complaints.create') }}" class="inline-flex items-center justify-center bg-blue-50 text-blue-600 px-6 py-2.5 rounded-full font-bold border border-blue-100 hover:bg-blue-100 transition-colors">
                    Mulai Buat Laporan
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
