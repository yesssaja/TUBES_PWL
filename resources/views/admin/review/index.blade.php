<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manage Review</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-red-600">
                Manage Review
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola review perusahaan dari user
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-5 py-3 rounded-xl shadow transition">
            ← Kembali
        </a>

    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm">
                Total Review
            </h2>

            <p class="text-3xl font-bold text-red-600 mt-2">
                {{ $reviews->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm">
                Rata-rata Rating
            </h2>

            <p class="text-3xl font-bold text-yellow-500 mt-2">
                {{ number_format($reviews->avg('rating') ?? 0, 1) }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-orange-500">
            <h2 class="text-gray-500 text-sm">
                Sudah Dibalas
            </h2>

            <p class="text-3xl font-bold text-orange-500 mt-2">
                {{ $reviews->filter(fn($review) => !empty($review->balasan_perusahaan))->count() }}
            </p>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-500 text-white">
                <tr>
                    <th class="p-4 text-left">Reviewer</th>
                    <th class="p-4 text-left">Perusahaan</th>
                    <th class="p-4 text-left">Rating</th>
                    <th class="p-4 text-left">Ulasan</th>
                    <th class="p-4 text-left">Balasan</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($reviews as $review)

                    <tr class="border-b hover:bg-yellow-50 transition align-top">

                        <td class="p-4">
                            <div class="font-semibold text-gray-800">
                                {{ $review->nama }}
                            </div>

                            <div class="text-sm text-gray-500">
                                {{ $review->posisi ?? '-' }}
                            </div>

                            <div class="text-xs text-gray-400 mt-1">
                                {{ $review->created_at ? $review->created_at->format('d M Y') : '-' }}
                            </div>
                        </td>

                        <td class="p-4">
                            {{ $review->perusahaan->nama_perusahaan
                                ?? $review->perusahaan->nama
                                ?? $review->perusahaan->name
                                ?? '-' }}
                        </td>

                        <td class="p-4">
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-bold">
                                ⭐ {{ number_format($review->rating, 1) }}
                            </span>

                            <div class="text-xs text-gray-500 mt-2">
                                Gaji: {{ $review->rating_gaji ?? '-' }} <br>
                                Kultur: {{ $review->rating_kultur ?? '-' }} <br>
                                Fasilitas: {{ $review->rating_fasilitas ?? '-' }}
                            </div>
                        </td>

                        <td class="p-4 max-w-xs">
                            <p class="text-sm text-gray-700 leading-relaxed">
                                {{ $review->ulasan }}
                            </p>
                        </td>

                        <td class="p-4 max-w-xs">

                            @if($review->balasan_perusahaan)
                                <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-xl text-sm mb-3">
                                    {{ $review->balasan_perusahaan }}
                                </div>
                            @else
                                <div class="bg-gray-100 text-gray-500 p-3 rounded-xl text-sm mb-3">
                                    Belum ada balasan.
                                </div>
                            @endif

                            <form action="{{ route('admin.review.reply', $review->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <textarea name="balasan_perusahaan"
                                          rows="3"
                                          placeholder="Tulis balasan perusahaan..."
                                          class="w-full border rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-400">{{ old('balasan_perusahaan', $review->balasan_perusahaan) }}</textarea>

                                <button type="submit"
                                        class="mt-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                    Kirim Balasan
                                </button>
                            </form>

                        </td>

                        <td class="p-4 text-center space-y-2">

                            <a href="{{ route('admin.review.edit', $review->id) }}"
                               class="inline-block bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm font-semibold">
                                Edit
                            </a>

                            <form action="{{ route('admin.review.destroy', $review->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus review ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">
                            Belum ada data review.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>