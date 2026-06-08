@extends('perusahaan.layouts.app')

@section('title', 'Detail Course')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Detail Course
            </h1>

            <p class="text-gray-500 mt-2">
                Informasi lengkap course.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <a href="{{ route('perusahaan.course.edit', $course->id) }}"
               class="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-2xl font-bold transition">
                Edit
            </a>

            <a href="{{ route('perusahaan.course.index') }}"
               class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-bold transition">
                ← Kembali
            </a>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <div class="bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 p-8 text-white">
            <p class="inline-flex bg-white/20 px-4 py-2 rounded-full text-sm font-bold mb-4">
                🎓 Course
            </p>

            <h2 class="text-4xl font-black leading-tight">
                {{ $course->title }}
            </h2>

            <p class="mt-4 text-white/90">
                {{ $course->is_active ? 'Course aktif dan dapat dilihat oleh pelamar.' : 'Course sedang nonaktif.' }}
            </p>
        </div>

        <div class="p-6 md:p-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-red-50 rounded-3xl p-5">
                    <p class="text-xs text-red-400 font-black uppercase tracking-wide">
                        Harga
                    </p>

                    <p class="text-gray-900 font-black mt-2">
                        @if((float)($course->price ?? 0) > 0)
                            Rp {{ number_format($course->price, 0, ',', '.') }}
                        @else
                            Gratis
                        @endif
                    </p>
                </div>

                <div class="bg-yellow-50 rounded-3xl p-5">
                    <p class="text-xs text-yellow-600 font-black uppercase tracking-wide">
                        Pembayaran
                    </p>

                    <p class="text-gray-900 font-black mt-2">
                        {{ $course->payment_required ? 'Wajib' : 'Tidak Wajib' }}
                    </p>
                </div>

                <div class="bg-gray-50 rounded-3xl p-5">
                    <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                        Status
                    </p>

                    <p class="text-gray-900 font-black mt-2">
                        {{ $course->is_active ? 'Aktif' : 'Nonaktif' }}
                    </p>
                </div>
            </div>

            <div class="space-y-6">

                <div>
                    <h3 class="text-xl font-black text-gray-800 mb-2">
                        Deskripsi
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        {{ $course->description }}
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-black text-gray-800 mb-2">
                        Benefit
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        {{ $course->benefit ?? '-' }}
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-black text-gray-800 mb-2">
                        Catatan Pembayaran
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        {{ $course->payment_note ?? '-' }}
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-black text-gray-800 mb-3">
                        Link Course
                    </h3>

                    @forelse($course->links as $link)
                        <a href="{{ $link->url }}"
                           target="_blank"
                           class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl font-bold shadow transition">
                            {{ $link->title }}
                        </a>
                    @empty
                        <p class="text-gray-500">
                            Belum ada link course.
                        </p>
                    @endforelse
                </div>

            </div>

        </div>

    </div>

</div>

@endsection