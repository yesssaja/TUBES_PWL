<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Group</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-red-600">
                Monitoring Group
            </h1>

            <p class="text-gray-500 mt-1">
                Pantau aktivitas dan anggota group
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="bg-gray-800 text-white px-5 py-3 rounded-xl font-bold">
            Dashboard
        </a>
        
        <a href="{{ route('admin.groups.create') }}"
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-5 py-3 rounded-xl shadow transition">
            + Tambah Group
        </a>

    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 border border-green-300 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm">
                Total Group
            </h2>

            <p class="text-3xl font-bold text-red-600 mt-2">
                {{ $groups->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm">
                Group Aktif
            </h2>

            <p class="text-3xl font-bold text-yellow-500 mt-2">
                {{ $groups->where('is_public', true)->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-orange-500">
            <h2 class="text-gray-500 text-sm">
                Total Member
            </h2>

            <p class="text-3xl font-bold text-orange-500 mt-2">
                {{ $groups->sum('members_count') }}
            </p>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-500 text-white">
                <tr>
                    <th class="p-4 text-left">Nama Group</th>
                    <th class="p-4 text-left">Kategori</th>
                    <th class="p-4 text-left">Jumlah Anggota</th>
                    <th class="p-4 text-left">Jumlah Post</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($groups as $group)

                    <tr class="border-b hover:bg-yellow-50 transition">

                        <td class="p-4 font-semibold">
                            {{ $group->name }}
                        </td>

                        <td class="p-4">
                            {{ $group->category ?? '-' }}
                        </td>

                        <td class="p-4">
                            {{ $group->members_count }}
                        </td>

                        <td class="p-4">
                            {{ $group->posts_count }}
                        </td>

                        <td class="p-4">
                            @if($group->is_public)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Aktif
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="p-4 text-center space-x-2">

                            <a href="{{ route('admin.groups.edit', $group->slug) }}"
                               class="inline-block bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm font-semibold">
                                Edit
                            </a>

                            <form action="{{ route('admin.groups.destroy', $group->slug) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus group ini?')">

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
                            Belum ada data group.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>