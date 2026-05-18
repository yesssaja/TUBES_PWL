<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-red-600">
                Data User
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola data user yang terdaftar.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-5 py-3 rounded-xl shadow transition">
            ← Dashboard
        </a>

    </div>

    <!-- Success -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">
            {{ session('error') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm">
                Total User
            </h2>

            <p class="text-3xl font-bold text-red-600 mt-2">
                {{ $users->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm">
                Admin
            </h2>

            <p class="text-3xl font-bold text-yellow-500 mt-2">
                {{ $users->where('role', 'admin')->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-orange-500">
            <h2 class="text-gray-500 text-sm">
                User Biasa
            </h2>

            <p class="text-3xl font-bold text-orange-500 mt-2">
                {{ $users->where('role', 'user')->count() }}
            </p>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-500 text-white">
                <tr>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-left">Tanggal Daftar</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($users as $user)

                    <tr class="border-b hover:bg-yellow-50 transition">

                        <td class="p-4 font-semibold">
                            {{ $user->name }}
                        </td>

                        <td class="p-4">
                            {{ $user->email }}
                        </td>

                        <td class="p-4">
                            @if($user->role === 'admin')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                                    Admin
                                </span>
                            @else
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                    User
                                </span>
                            @endif
                        </td>

                        <td class="p-4">
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
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                        Hapus
                                    </button>

                                </form>
                            @else
                                <span class="text-gray-400 text-sm">
                                    Akun aktif
                                </span>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">
                            Belum ada data user.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>