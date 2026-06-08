@extends('users.event.layouts.app')

@section('title', $event->nama_event . ' - Detail Event')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-[#4A0E17] via-[#4A0E17] to-red-100 text-white pt-32 pb-24 px-6 relative z-20 overflow-hidden">   <div class="max-w-6xl mx-auto">
        
        <div class="mb-8">
            <a href="{{ route('event.index') }}" class="inline-flex items-center text-red-400 hover:text-red-300 font-bold transition gap-2">
                ➔ Kembali ke Daftar Event
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-12 items-start">
            
            <div class="md:col-span-1 relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-yellow-500 rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-1000"></div>
                <div class="relative bg-[#2A050A] rounded-3xl p-4 border border-red-950 shadow-2xl">
                    @if($event->poster)
                        <img src="{{ asset('storage/' . $event->poster) }}" 
                             alt="{{ $event->nama_event }}" 
                             class="w-full h-auto rounded-2xl object-cover shadow-lg"
                             onerror="this.onerror=null; this.src='{{ asset($event->poster) }}';">
                    @else
                        <div class="w-full aspect-[3/4] bg-red-950/40 rounded-2xl flex flex-col items-center justify-center text-center p-6 border border-dashed border-red-800">
                           
                            <p class="text-sm text-gray-400 font-semibold">Poster Belum Tersedia</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="md:col-span-2 space-y-8">
                <div>
                    <span class="text-xs uppercase tracking-[4px] text-red-500 font-black block mb-2">
                        DETAIL INFORMASI EVENT
                    </span>
                    <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white leading-tight">
                        {{ $event->nama_event }}
                    </h1>
                    
                    <p class="text-yellow-400 font-bold text-lg mt-3 flex items-center gap-2">
                         By: {{ $event->perusahaan->nama_perusahaan ?? 'Penyelenggara Perusahaan' }}
                    </p>
                </div>

            <div class="flex flex-col gap-6">
    
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        
        <div class="bg-white/5 backdrop-blur-sm p-4 rounded-2xl border border-white/10 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-400 font-medium">Tanggal</p>
                <p class="text-base font-bold text-yellow-200 mt-0.5">{{ $event->tanggal_event ?? '-' }}</p>
            </div>
           
        </div>
        
        <div class="bg-white/5 backdrop-blur-sm p-4 rounded-2xl border border-white/10 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-400 font-medium">Waktu / Jam</p>
                <p class="text-base font-bold text-yellow-200 mt-0.5">
                    {{ $event->jam ? substr($event->jam, 0, 5) . ' WIB' : '-' }}
                </p>
            </div>
           
        </div>
        
        <div class="bg-white/5 backdrop-blur-sm p-4 rounded-2xl border border-white/10 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-400 font-medium">Kuota</p>
                <p class="text-base font-bold text-yellow-200 mt-0.5">{{ $event->kuota }} Peserta</p>
            </div>
           
        </div>

    </div>

    <div class="bg-white/5 backdrop-blur-sm p-5 rounded-2xl border border-white/10 w-full">
        <div class="flex items-start gap-4">
            
            <div>
                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Lokasi Tempat</p>
                <p class="text-xl font-black text-white mt-1 leading-relaxed">
                    {{ $event->lokasi }}
                </p>
            </div>
        </div>
    </div>

</div>

                <div class="bg-white/5 backdrop-blur-sm p-6 md:p-8 rounded-3xl border border-white/10 space-y-4">
                    <h3 class="text-xl font-bold text-red-400 border-b border-white/10 pb-2">Deskripsi Event</h3>
                    <div class="text-[#FFC917] leading-relaxed text-base whitespace-pre-line">
                        {!! $event->deskripsi !!}
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    @if(isset($event->link_wa_group) || !empty($event->link_wa_group))
                        <a href="{{ $event->link_wa_group }}" 
                           target="_blank" 
                           class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold text-center px-8 py-4 rounded-full transition duration-300 transform hover:-translate-y-1 shadow-lg flex items-center justify-center gap-2">
                            Join WhatsApp Group
                        </a>
                    @endif

                    <a href="{{ route('rsvp.create', $event->id) }}" 
                       class="flex-1 bg-yellow-400 hover:bg-yellow-300 text-red-950 font-black text-center px-8 py-4 rounded-full transition duration-300 transform hover:-translate-y-1 shadow-xl flex items-center justify-center gap-2">
                        Ambil Tiket RSVP ➔
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection