<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Group</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-red-600">
            Tambah Group
        </h1>

        <p class="text-gray-500 mt-1">
            Buat group baru
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6 max-w-3xl">

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.groups.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Nama Group
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400"
                       required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Kategori
                </label>

                <input type="text"
                       name="category"
                       value="{{ old('category') }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Icon Letter
                </label>

                <input type="text"
                       name="icon_letter"
                       value="{{ old('icon_letter') }}"
                       maxlength="5"
                       placeholder="Contoh: W"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Cover Image URL
                </label>

                <input type="text"
                       name="cover_image"
                       value="{{ old('cover_image') }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea name="description"
                          rows="5"
                          class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">{{ old('description') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="flex items-center gap-2 font-semibold">
                    <input type="checkbox"
                           name="is_public"
                           value="1"
                           checked>
                    Group Aktif / Public
                </label>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold">
                    Simpan
                </button>

                <a href="{{ route('admin.groups.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-6 py-3 rounded-xl font-semibold">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>