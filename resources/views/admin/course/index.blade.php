<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-50 via-orange-50 to-red-100 min-h-screen text-gray-800">

<div class="min-h-screen p-4 md:p-8">

    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-yellow-400 rounded-3xl shadow-xl p-6 md:p-8 mb-8 text-white">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div>
                <h1 class="text-3xl md:text-4xl font-black">
                    Pendaftaran Course
                </h1>

                <p class="mt-2 text-white/90">
                    Cek data peserta, bukti pembayaran, lalu setujui akses course.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                ← Dashboard
            </a>

        </div>

    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-sm font-bold">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-sm font-bold">
            {{ session('error') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm font-semibold">Total Pendaftar</h2>
            <p class="text-4xl font-black text-red-600 mt-2">
                {{ $registrations->count() }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm font-semibold">Pending</h2>
            <p class="text-4xl font-black text-yellow-500 mt-2">
                {{ $registrations->where('status', 'pending')->count() }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-green-500">
            <h2 class="text-gray-500 text-sm font-semibold">Approved</h2>
            <p class="text-4xl font-black text-green-600 mt-2">
                {{ $registrations->where('status', 'approved')->count() }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-blue-500">
            <h2 class="text-gray-500 text-sm font-semibold">Pembayaran Verified</h2>
            <p class="text-4xl font-black text-blue-600 mt-2">
                {{ $registrations->filter(fn($r) => $r->payment && $r->payment->status === 'verified')->count() }}
            </p>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white">

        <div class="px-6 py-5 border-b bg-white">
            <h2 class="text-xl font-black text-gray-800">
                Daftar Peserta Course
            </h2>

            <p class="text-sm text-gray-500">
                Semua pendaftaran course dari user.
            </p>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1400px]">

                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Peserta</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Course</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">No HP</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Alasan</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Pembayaran</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Status</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($registrations as $registration)

                        @php
                            $course = $registration->course;
                            $payment = $registration->payment;
                            $isPaidCourse = ($course->payment_required ?? false) || (($course->price ?? 0) > 0);
                        @endphp

                        <tr class="hover:bg-yellow-50 transition align-top">

                            <!-- Peserta -->
                            <td class="p-4">
                                <div class="font-black text-gray-800">
                                    {{ $registration->nama }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    {{ $registration->email }}
                                </div>

                                <div class="text-xs text-gray-400 mt-1">
                                    Daftar: {{ $registration->created_at ? $registration->created_at->format('d M Y H:i') : '-' }}
                                </div>
                            </td>

                            <!-- Course -->
                            <td class="p-4">
                                <div class="font-bold text-gray-800">
                                    {{ $course->title ?? '-' }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    Biaya:
                                    Rp {{ number_format($course->price ?? 0, 0, ',', '.') }}
                                </div>
                            </td>

                            <!-- No HP -->
                            <td class="p-4">
                                {{ $registration->no_hp }}
                            </td>

                            <!-- Alasan -->
                            <td class="p-4 max-w-sm">
                                <p class="text-sm text-gray-700 leading-relaxed">
                                    {{ $registration->alasan }}
                                </p>

                                @if($registration->catatan_admin)
                                    <div class="mt-3 bg-gray-100 text-gray-600 p-3 rounded-xl text-sm">
                                        Catatan: {{ $registration->catatan_admin }}
                                    </div>
                                @endif
                            </td>

                            <!-- Pembayaran -->
                            <td class="p-4 text-center">

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
                                            <form action="{{ route('admin.course.verifyPayment', $registration->id) }}"
                                                  method="POST"
                                                  class="mb-2">

                                                @csrf
                                                @method('PUT')

                                                <button type="submit"
                                                        onclick="return confirm('Yakin pembayaran ini valid?')"
                                                        class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-bold">
                                                    Verifikasi Bayar
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.course.rejectPayment', $registration->id) }}"
                                                  method="POST">

                                                @csrf
                                                @method('PUT')

                                                <input type="hidden"
                                                       name="note"
                                                       value="Bukti pembayaran belum valid.">

                                                <button type="submit"
                                                        onclick="return confirm('Yakin menolak bukti pembayaran ini?')"
                                                        class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold">
                                                    Tolak Bayar
                                                </button>
                                            </form>
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

                            <!-- Status -->
                            <td class="p-4 text-center">

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

                            <!-- Aksi -->
                            <td class="p-4">

                                <div class="space-y-2">

                                    @if($registration->status === 'pending')

                                        @if(!$isPaidCourse || ($payment && $payment->status === 'verified'))

                                            <form action="{{ route('admin.course.approve', $registration->id) }}"
                                                  method="POST">

                                                @csrf
                                                @method('PUT')

                                                <textarea name="catatan_admin"
                                                          rows="2"
                                                          placeholder="Catatan opsional..."
                                                          class="w-full border rounded-xl p-2 text-sm mb-2"></textarea>

                                                <button type="submit"
                                                        class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-bold">
                                                    Setujui
                                                </button>
                                            </form>

                                        @else

                                            <div class="bg-yellow-100 text-yellow-700 px-4 py-3 rounded-xl text-sm font-bold text-center">
                                                Verifikasi pembayaran dulu
                                            </div>

                                        @endif

                                        <form action="{{ route('admin.course.reject', $registration->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menolak pendaftaran ini?')">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit"
                                                    class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold">
                                                Tolak
                                            </button>
                                        </form>

                                    @else

                                        <span class="block text-center bg-gray-100 text-gray-500 px-4 py-2 rounded-xl text-sm font-bold">
                                            Sudah diproses
                                        </span>

                                    @endif

                                    <form action="{{ route('admin.course.destroy', $registration->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="w-full bg-gray-800 hover:bg-black text-white px-4 py-2 rounded-xl text-sm font-bold">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="p-12 text-center">
                                <div class="max-w-md mx-auto">
                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                                        🎓
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

</div>

</body>
</html>