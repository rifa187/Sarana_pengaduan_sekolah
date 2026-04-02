@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Welcome Card -->
    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden mb-8 relative">
        <div class="absolute top-[-50%] right-[-10%] w-64 h-64 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="bg-gradient-to-br from-[#2563eb] to-[#4338ca] relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute -right-12 -top-12 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
            
            <div class="px-10 py-12 text-white relative z-10">
                <h1 class="text-[2rem] font-bold mb-3 tracking-tight">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-blue-100 text-[15px] max-w-2xl leading-relaxed">Sampaikan keluhan dan aspirasi Anda mengenai sarana dan prasarana sekolah agar kami dapat memperbaikinya segera. Suara Anda membangun sekolah lebih baik.</p>
            </div>
        </div>
        
        <div class="p-8 sm:p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Buat Laporan Card -->
                <a href="{{ route('complaints.create') }}" class="group block p-8 bg-white rounded-[1.5rem] border border-slate-200 hover:border-blue-500 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-1 relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 border border-blue-100 rounded-[1rem] flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 relative z-10">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2 relative z-10">Buat Pengaduan Baru</h3>
                    <p class="text-[14px] text-slate-500 leading-relaxed relative z-10">Laporkan kerusakan fasilitas atau sampaikan saran baru untuk sekolah kita.</p>
                </a>

                <!-- Riwayat Laporan Card -->
                <a href="{{ route('complaints.index') }}" class="group block p-8 bg-white rounded-[1.5rem] border border-slate-200 hover:border-indigo-500 hover:shadow-lg hover:shadow-indigo-500/10 transition-all duration-300 hover:-translate-y-1 relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 border border-indigo-100 rounded-[1rem] flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300 relative z-10">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2 relative z-10">Riwayat Pengaduan Saya</h3>
                    <p class="text-[14px] text-slate-500 leading-relaxed relative z-10">Pantau status laporan yang pernah Anda sampaikan sebelumnya.</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
