@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div
            class="mb-8 p-8 bg-[#111111] rounded-[2rem] shadow-xl relative overflow-hidden text-white flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-4">
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-[12px] transition-all group backdrop-blur-sm">
                        <svg class="w-3.5 h-3.5 group-hover:-translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <h1 class="text-3xl font-bold tracking-tight mb-2">Manajemen Pengaduan</h1>
                <p class="text-slate-400 text-[15px]">Daftar antrian laporan keluhan dari para siswa yang siap Anda
                    evaluasi.</p>
            </div>

            <div class="relative z-10 w-full md:w-auto">
                <form action="{{ route('admin.complaints.index') }}" method="GET"
                    class="flex items-center gap-3 w-full bg-black/40 p-2.5 rounded-2xl border border-white/10 backdrop-blur-md">
                    <div class="flex-grow">
                        <select name="status"
                            class="w-full bg-transparent border-none text-white text-[14px] font-medium focus:ring-0 cursor-pointer outline-none px-2 appearance-none">
                            <option value="" class="text-slate-800">Cari Semua Status</option>
                            <option value="menunggu" class="text-slate-800" {{ request('status') == 'menunggu' ? 'selected' : '' }}> Menunggu Antrian</option>
                            <option value="diproses" class="text-slate-800" {{ request('status') == 'diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                            <option value="selesai" class="text-slate-800" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai Ditangani</option>
                            <option value="ditolak" class="text-slate-800" {{ request('status') == 'ditolak' ? 'selected' : '' }}> Laporan Ditolak</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-[1rem] text-[13.5px] font-bold hover:bg-blue-500 hover:-translate-y-0.5 transition-all shadow-lg shadow-blue-900/50">
                        Filter Data
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50/50 border-b border-slate-100 text-slate-400 text-[12px] uppercase tracking-wider font-bold">
                            <th class="py-5 px-8">Tanggal</th>
                            <th class="py-5 px-6">Pelapor</th>
                            <th class="py-5 px-6 w-1/4">Judul Laporan</th>
                            <th class="py-5 px-6">Kategori</th>
                            <th class="py-5 px-6">Status</th>
                            <th class="py-5 px-8 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700 divide-y divide-slate-50">
                        @if(count($complaints) > 0)
                            @foreach($complaints as $complaint)
                                <tr class="hover:bg-slate-50/80 transition-colors group">
                                    <td class="py-5 px-8 whitespace-nowrap text-[13.5px] font-medium text-slate-400 w-32">
                                        {{ $complaint->created_at->format('d M y') }} <br><span
                                            class="text-[12px] opacity-70">{{ $complaint->created_at->format('H:i') }}</span>
                                    </td>
                                    <td class="py-5 px-6">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-600 text-[15px]">
                                                {{ substr($complaint->user->name ?? '?', 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-[14px] text-slate-800">
                                                    {{ $complaint->user->name ?? 'Anonim/Terhapus' }}</p>
                                                <div class="flex items-center gap-2 mt-1">
                                                    <span class="text-[12px] font-medium text-slate-500">NIS:
                                                        {{ $complaint->user->nis ?? '-' }}</span>
                                                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                                    <span
                                                        class="text-[11px] font-bold text-slate-600 bg-slate-100 border border-slate-200 px-2 py-0.5 rounded-md">{{ $complaint->user->kelas ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6">
                                        <p class="font-bold text-[14.5px] text-slate-800 truncate max-w-[200px]"
                                            title="{{ $complaint->judul }}">{{ $complaint->judul }}</p>
                                    </td>
                                    <td class="py-5 px-6 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50">{{ $complaint->kategori }}</span>
                                    </td>
                                    <td class="py-5 px-6 whitespace-nowrap">
                                        @if($complaint->status == 'menunggu')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Menunggu</span>
                                        @elseif($complaint->status == 'diproses')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-blue-50 text-blue-600 border border-blue-200">Diproses</span>
                                        @elseif($complaint->status == 'selesai')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Selesai</span>
                                        @elseif($complaint->status == 'ditolak')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold bg-red-50 text-red-600 border border-red-200">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="py-5 px-8 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                                class="inline-flex items-center px-4 py-2 rounded-[1rem] text-[13px] font-bold bg-white border border-slate-200 text-slate-700 hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700 transition-all shadow-sm">Review</a>
                                            <form action="{{ route('admin.complaints.destroy', $complaint->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini secara permanen?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 rounded-[1rem] text-[13px] font-bold bg-white border border-red-200 text-red-600 hover:border-red-300 hover:bg-red-50 transition-all shadow-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="py-16 text-center text-slate-500">
                                    <div
                                        class="w-16 h-16 bg-slate-50 rounded-[1.25rem] flex items-center justify-center mx-auto mb-4 border border-slate-100 shadow-sm text-slate-300">
                                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-lg font-bold text-slate-800">Tidak Ada Data</p>
                                    <p class="text-[14px]">Belum ada pengaduan yang sesuai dengan filter saat ini.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination Component -->
            @if($complaints->hasPages())
                <div class="px-8 py-5 border-t border-slate-100 bg-slate-50/30">
                    {{ $complaints->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection