@extends('users.layouts.app')

@section('title', 'Halaman Join Group')

@section('content')

<main class="w-full max-w-4xl mx-auto pb-16 flex-grow">

    <div class="bg-white rounded-b-3xl shadow-sm overflow-hidden border border-gray-200/60">

        <div class="h-48 bg-gradient-to-r from-yellow-500 to-yellow-400 relative overflow-hidden">
            <img src="{{ $group->cover_image ?? 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80' }}"
                 class="w-full h-full object-cover opacity-30 mix-blend-multiply">
        </div>

        <div class="px-8 pb-6">

            <div class="-mt-16 mb-4 relative z-10">
                <div class="w-28 h-28 bg-white p-1.5 rounded-2xl shadow-sm inline-block border border-gray-100">
                    <div class="w-full h-full bg-red-600 rounded-xl flex items-center justify-center text-white text-3xl font-extrabold">
                        {{ $group->icon_letter ?? strtoupper(substr($group->name, 0, 1)) }}
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 border border-green-300 px-4 py-3 rounded-xl mb-5">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded-xl mb-5">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">

                <div>
                    <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">
                        {{ $group->name }}
                    </h1>

                    <div class="flex items-center gap-2 mt-2 text-xs font-semibold text-gray-500 tracking-wide">
                        <span>
                            {{ $group->is_public ? 'Public group' : 'Private group' }}
                        </span>

                        <span>•</span>

                        <span class="text-gray-700">
                            {{ $group->members_count }} members
                        </span>
                    </div>

                    @if($group->description)
                        <p class="text-sm text-gray-600 mt-3 max-w-xl">
                            {{ $group->description }}
                        </p>
                    @endif
                </div>

                <div>
                    @auth
                        @if($joined)
                            <form action="{{ route('groups.leave', $group->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-gray-100 text-gray-500 border border-gray-200 px-8 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider">
                                    ✓ Joined
                                </button>
                            </form>
                        @else
                            <form action="{{ route('groups.join', $group->slug) }}" method="POST">
                                @csrf

                                <button type="submit"
                                        class="bg-red-600 text-white hover:bg-red-700 px-8 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider">
                                    Join Group
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-block bg-red-600 text-white hover:bg-red-700 px-8 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider">
                            Login untuk Join
                        </a>
                    @endauth
                </div>

            </div>

        </div>
    </div>

    <div class="max-w-2xl mx-auto mt-8 space-y-4 px-4 sm:px-0">

        @auth
            @if($joined)

                <form action="{{ route('groups.comment.store', $group->slug) }}"
                      method="POST"
                      class="bg-white p-4 rounded-2xl border border-gray-200/60 shadow-sm">

                    @csrf

                    <div class="flex gap-3 items-center">

                        <div class="w-10 h-10 rounded-xl bg-yellow-400 flex-shrink-0 flex items-center justify-center font-extrabold text-red-600 text-xs shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <input type="text"
                               name="content"
                               value="{{ old('content') }}"
                               placeholder="Bagikan info loker atau tanya sesuatu..."
                               class="w-full bg-gray-50 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none border border-transparent focus:border-gray-200 focus:bg-white transition"
                               required>

                        <button type="submit"
                                class="bg-red-600 text-white px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider hover:bg-red-700 transition">
                            Post
                        </button>

                    </div>

                    @error('content')
                        <p class="text-red-600 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </form>

            @else

                <div class="bg-white p-5 rounded-2xl shadow-sm text-center font-bold text-gray-600">
                    Join group terlebih dahulu untuk membuat postingan.
                </div>

            @endif
        @else

            <div class="bg-white p-5 rounded-2xl shadow-sm text-center font-bold text-gray-600">
                Login terlebih dahulu untuk membuat postingan.
            </div>

        @endauth

        @forelse($comments as $comment)

            <div class="bg-white rounded-2xl border border-gray-200/60 p-5 shadow-sm relative">

                <div class="flex items-center gap-3 mb-4">

                    <div class="w-11 h-11 rounded-xl bg-yellow-400 text-red-600 font-extrabold flex items-center justify-center text-xs shadow-sm">
                        {{ strtoupper(substr($comment->pelamar->name ?? 'U', 0, 1)) }}
                    </div>

                    <div>
                        <h4 class="font-bold text-gray-900 text-sm leading-tight">
                            {{ $comment->pelamar->name ?? 'User' }}
                        </h4>

                        <p class="text-[11px] text-gray-400 font-medium tracking-wide uppercase mt-0.5">
                            {{ $comment->created_at ? $comment->created_at->diffForHumans() : '-' }}
                        </p>
                    </div>

                </div>

                <p class="text-gray-800 text-sm leading-relaxed mb-4 whitespace-pre-line">
                    {{ $comment->content }}
                </p>

            </div>

        @empty

            <div class="bg-white rounded-2xl border border-gray-200/60 p-6 shadow-sm text-center text-gray-500 font-bold">
                Belum ada postingan di group ini.
            </div>

        @endforelse

    </div>

</main>

@endsection