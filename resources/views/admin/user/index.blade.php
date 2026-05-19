<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
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
                    Data User
                </h1>

                <p class="mt-2 text-white/90">
                    Kelola data user yang terdaftar di LOKER SEEKER.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                ← Dashboard
            </a>

        </div>

    </div>

    <!-- Success -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-red-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Total User
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $users->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl">
                    🧑
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Admin
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $users->where('role', 'admin')->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-2xl">
                    🛡️
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-orange-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        User Biasa
                    </h2>

                    <p class="text-4xl font-black text-orange-500 mt-2">
                        {{ $users->where('role', 'user')->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-2xl">
                    👤
                </div>

            </div>
        </div>

    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white">

        <div class="px-6 py-5 border-b bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-xl font-black text-gray-800">
                    Daftar User
                </h2>

                <p class="text-sm text-gray-500">
                    Semua akun user yang tersimpan di database.
                </p>
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[850px]">

                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Nama</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Email</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Role</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Tanggal Daftar</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($users as $user)

                        <tr class="hover:bg-yellow-50 transition align-middle">

                            <td class="p-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center font-black text-lg">
                                        {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-black text-gray-800">
                                            {{ $user->name }}
                                        </div>

                                        @if(auth()->id() === $user->id)
                                            <div class="text-xs text-gray-400 mt-1">
                                                Akun sedang digunakan
                                            </div>
                                        @endif
                                    </div>

                                </div>

                            </td>

                            <td class="p-4 text-gray-700">
                                {{ $user->email }}
                            </td>

                            <td class="p-4 text-center">
                                @if($user->role === 'admin')
                                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        User
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-gray-700">
                                {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                            </td>

                            <td class="p-4 text-center">

                                @if(auth()->id() !== $user->id)

                                    <form action="{{ route('admin.user.destroy', $user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                            Hapus
                                        </button>

                                    </form>

                                @else

                                    <span class="inline-block bg-gray-100 text-gray-500 px-4 py-2 rounded-full text-sm font-bold">
                                        Akun aktif
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="p-12 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                                        🧑
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada data user
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Data user belum tersedia di database.
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