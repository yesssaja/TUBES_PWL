@php
    $title = 'Monitoring Course';

    $verifiedPaymentCount = 0;

    foreach ($registrations as $registrationItem) {
        if ($registrationItem->payment && $registrationItem->payment->status === 'verified') {
            $verifiedPaymentCount++;
        }
    }
@endphp

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-red-700 rounded-[30px] shadow-glow p-7 md:p-8 mb-7 text-white">

        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l6.16-3.42A12 12 0 0119 15c0 2-3.13 4-7 4s-7-2-7-4c0-1.5.46-2.95.84-4.42L12 14z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-wide">
                        Monitoring Course
                    </h1>

                    <p class="mt-2 text-white/90 font-medium">
                        Pantau data peserta course dan status pembayaran yang diproses oleh perusahaan.
                    </p>
                </div>
            </div>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-soft font-bold flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-soft font-bold flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                </svg>
            </div>

            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-7">

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-red-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Total Pendaftar
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $registrations->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-yellow-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Pending
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $registrations->where('status', 'pending')->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-green-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Approved
                    </h2>

                    <p class="text-4xl font-black text-green-600 mt-2">
                        {{ $registrations->where('status', 'approved')->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-blue-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Pembayaran Verified
                    </h2>

                    <p class="text-4xl font-black text-blue-600 mt-2">
                        {{ $verifiedPaymentCount }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-[30px] shadow-soft overflow-hidden border border-slate-100 max-w-full">

        <div class="px-7 py-6 border-b border-slate-100 bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div>
                <h2 class="text-2xl font-black text-gray-800">
                    Daftar Peserta Course
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Semua pendaftaran course dari user. Admin hanya memantau data.
                </p>
            </div>

            <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-2 rounded-2xl text-sm font-black">
                {{ $registrations->count() }} Data Course
            </div>
        </div>

        <div class="w-full max-w-full overflow-x-auto overflow-y-hidden">

            <table class="w-full min-w-[1450px]">

                <thead class="bg-red-50 text-red-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Peserta</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Course</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">No HP</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Alasan</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wide font-black">Pembayaran</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wide font-black">Status</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wide font-black">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($registrations as $registration)

                        @php
                            $course = $registration->course;
                            $payment = $registration->payment;
                            $isPaidCourse = ($course->payment_required ?? false) || (($course->price ?? 0) > 0);
                        @endphp

                        <tr class="hover:bg-red-50/40 transition align-top">

                            <td class="px-6 py-5">
                                <div class="flex items-start gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center font-black shrink-0">
                                        {{ strtoupper(substr($registration->nama ?? 'P', 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-black text-gray-800">
                                            {{ $registration->nama }}
                                        </div>

                                        <div class="text-sm text-gray-500 mt-1">
                                            {{ $registration->email }}
                                        </div>

                                        <div class="text-xs text-gray-400 mt-1">
                                            Daftar: {{ $registration->created_at ? $registration->created_at->format('d M Y H:i') : '-' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="font-bold text-gray-800">
                                    {{ $course->title ?? '-' }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    Biaya:
                                    Rp {{ number_format($course->price ?? 0, 0, ',', '.') }}
                                </div>
                            </td>

                            <td class="px-6 py-5 text-gray-700">
                                {{ $registration->no_hp }}
                            </td>

                            <td class="px-6 py-5 max-w-sm">
                                <p class="text-sm text-gray-700 leading-relaxed">
                                    {{ $registration->alasan }}
                                </p>

                                @if($registration->catatan_admin)
                                    <div class="mt-3 bg-gray-100 text-gray-600 p-3 rounded-xl text-sm">
                                        Catatan: {{ $registration->catatan_admin }}
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-center">

                                @if($isPaidCourse)

                                    @if($payment)

                                        @if($payment->status === 'verified')
                                            <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold mb-3">
                                                Verified
                                            </span>
                                        @elseif($payment->status === 'rejected')
                                            <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold mb-3">
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="inline-block bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold mb-3">
                                                Pending
                                            </span>
                                        @endif

                                        <div class="text-sm text-gray-600 mb-3">
                                            {{ $payment->payment_method }}
                                        </div>

                                        @if($payment->proof_image)
                                            <a href="{{ asset('storage/' . $payment->proof_image) }}"
                                               target="_blank"
                                               class="inline-block bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-xl text-sm font-bold mb-3">
                                                Lihat Bukti
                                            </a>
                                        @endif

                                        @if($payment->status !== 'verified')
                                            <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 px-4 py-3 rounded-xl text-sm font-bold">
                                                Menunggu verifikasi perusahaan.
                                            </div>
                                        @endif

                                    @else

                                        <span class="inline-block bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-bold">
                                            Belum Upload Bukti
                                        </span>

                                    @endif

                                @else

                                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Gratis
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-5 text-center">

                                @if($registration->status === 'approved')
                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Approved
                                    </span>
                                @elseif($registration->status === 'rejected')
                                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Rejected
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Pending
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="space-y-2 min-w-[180px]">

                                    <span class="block text-center bg-gray-100 text-gray-600 px-4 py-2 rounded-xl text-sm font-bold">
                                        Hanya Monitoring
                                    </span>

                                    <form action="{{ route('admin.course.destroy', $registration->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="w-full bg-gray-800 hover:bg-black text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="max-w-md mx-auto">
                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 14l6.16-3.42A12 12 0 0119 15c0 2-3.13 4-7 4s-7-2-7-4c0-1.5.46-2.95.84-4.42L12 14z" />
                                        </svg>
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada pendaftaran course
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Data pendaftaran course belum tersedia.
                                    </p>
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection