<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manage Review</title>
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
                    Manage Review
                </h1>

                <p class="mt-2 text-white/90">
                    Kelola review perusahaan dari user dan balas ulasan yang masuk.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                ← Dashboard
            </a>

        </div>

    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-red-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Total Review
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $reviews->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl">
                    ⭐
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Rata-rata Rating
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ number_format($reviews->avg('rating') ?? 0, 1) }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-2xl">
                    📊
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-orange-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Sudah Dibalas
                    </h2>

                    <p class="text-4xl font-black text-orange-500 mt-2">
                        {{ $reviews->filter(fn($review) => !empty($review->balasan_perusahaan))->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-2xl">
                    💬
                </div>

            </div>
        </div>

    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white">

        <div class="px-6 py-5 border-b bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-xl font-black text-gray-800">
                    Daftar Review
                </h2>

                <p class="text-sm text-gray-500">
                    Semua review perusahaan yang dikirim oleh user.
                </p>
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1200px]">

                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Reviewer</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Perusahaan</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Rating</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Ulasan</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Balasan</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($reviews as $review)

                        <tr class="hover:bg-yellow-50 transition align-top">

                            <!-- Reviewer -->
                            <td class="p-4">

                                <div class="flex items-start gap-3">

                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center font-black text-lg shrink-0">
                                        {{ strtoupper(substr($review->nama ?? 'A', 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-black text-gray-800">
                                            {{ $review->nama }}
                                        </div>

                                        <div class="text-sm text-gray-500 mt-1">
                                            {{ $review->posisi ?? '-' }}
                                        </div>

                                        <div class="text-xs text-gray-400 mt-1">
                                            {{ $review->created_at ? $review->created_at->format('d M Y') : '-' }}
                                        </div>
                                    </div>

                                </div>

                            </td>

                            <!-- Perusahaan -->
                            <td class="p-4">

                                <span class="inline-block bg-red-50 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $review->perusahaan->nama_perusahaan
                                        ?? $review->perusahaan->nama
                                        ?? $review->perusahaan->name
                                        ?? '-' }}
                                </span>

                            </td>

                            <!-- Rating -->
                            <td class="p-4">

                                <span class="inline-flex items-center bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-black">
                                    ⭐ {{ number_format($review->rating, 1) }}
                                </span>

                                <div class="mt-3 space-y-1 text-xs text-gray-500">

                                    <div class="flex justify-between gap-4">
                                        <span>Gaji</span>
                                        <span class="font-bold text-gray-700">
                                            {{ $review->rating_gaji ?? '-' }}
                                        </span>
                                    </div>

                                    <div class="flex justify-between gap-4">
                                        <span>Kultur</span>
                                        <span class="font-bold text-gray-700">
                                            {{ $review->rating_kultur ?? '-' }}
                                        </span>
                                    </div>

                                    <div class="flex justify-between gap-4">
                                        <span>Fasilitas</span>
                                        <span class="font-bold text-gray-700">
                                            {{ $review->rating_fasilitas ?? '-' }}
                                        </span>
                                    </div>

                                </div>

                            </td>

                            <!-- Ulasan -->
                            <td class="p-4 max-w-sm">

                                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
                                    <p class="text-sm text-gray-700 leading-relaxed">
                                        {{ $review->ulasan }}
                                    </p>
                                </div>

                            </td>

                            <!-- Balasan -->
                            <td class="p-4 max-w-sm">

                                @if($review->balasan_perusahaan)
                                    <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-2xl text-sm mb-3 leading-relaxed">
                                        {{ $review->balasan_perusahaan }}
                                    </div>
                                @else
                                    <div class="bg-gray-100 text-gray-500 p-4 rounded-2xl text-sm mb-3">
                                        Belum ada balasan.
                                    </div>
                                @endif

                                <form action="{{ route('admin.review.reply', $review->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <textarea name="balasan_perusahaan"
                                              rows="3"
                                              placeholder="Tulis balasan perusahaan..."
                                              class="w-full border border-gray-200 rounded-2xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-400 resize-none">{{ old('balasan_perusahaan', $review->balasan_perusahaan) }}</textarea>

                                    <button type="submit"
                                            class="mt-2 w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                        Kirim Balasan
                                    </button>
                                </form>

                            </td>

                            <!-- Aksi -->
                            <td class="p-4">

                                <div class="flex flex-col items-center gap-2">

                                    <a href="{{ route('admin.review.edit', $review->id) }}"
                                       class="w-full text-center bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.review.destroy', $review->id) }}"
                                          method="POST"
                                          class="w-full"
                                          onsubmit="return confirm('Yakin ingin menghapus review ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="p-12 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                                        ⭐
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada data review
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Data review perusahaan dari user belum tersedia.
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