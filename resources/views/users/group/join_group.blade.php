@extends('users.layouts.app')

@section('title', 'Halaman Join Group')

@section('content')

<style>
    body {
        background:
            radial-gradient(circle at top left, rgba(254, 202, 202, .9) 0%, transparent 28%),
            radial-gradient(circle at top right, rgba(254, 243, 199, .9) 0%, transparent 32%),
            linear-gradient(180deg, #fff7ed 0%, #ffffff 45%, #fff1f2 100%);
        min-height: 100vh;
    }

    .group-page {
        position: relative;
        overflow: hidden;
    }

    .group-page::before {
        content: '';
        position: absolute;
        width: 340px;
        height: 340px;
        background: #fecaca;
        filter: blur(120px);
        top: -120px;
        right: -120px;
        opacity: .5;
        z-index: 0;
        animation: floatBlob 7s ease-in-out infinite alternate;
    }

    .group-page::after {
        content: '';
        position: absolute;
        width: 320px;
        height: 320px;
        background: #fde68a;
        filter: blur(120px);
        bottom: -130px;
        left: -120px;
        opacity: .45;
        z-index: 0;
        animation: floatBlob 8s ease-in-out infinite alternate-reverse;
    }

    @keyframes floatBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(24px) scale(1.08);
        }
    }

    .content-layer {
        position: relative;
        z-index: 2;
    }

    .group-hero-card {
        background: rgba(255, 255, 255, .84);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, .78);
        box-shadow:
            0 28px 70px rgba(15, 23, 42, .10),
            0 12px 30px rgba(220, 38, 38, .08);
        animation: fadeUp .65s ease forwards;
    }

    .cover-box {
        position: relative;
        background: linear-gradient(135deg, #dc2626, #f97316, #facc15);
    }

    .cover-box::after {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top left, rgba(255, 255, 255, .45), transparent 32%),
            linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, .18) 100%);
    }

    .group-avatar {
        box-shadow:
            0 18px 34px rgba(15, 23, 42, .14),
            0 10px 22px rgba(220, 38, 38, .18);
        transition: all .35s ease;
    }

    .group-hero-card:hover .group-avatar {
        transform: translateY(-4px) rotate(-5deg) scale(1.04);
    }

    .group-icon-inner {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 999px;
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
        font-size: 12px;
        font-weight: 900;
    }

    .member-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 999px;
        background: #fffbeb;
        color: #d97706;
        border: 1px solid #fde68a;
        font-size: 12px;
        font-weight: 900;
    }

    .btn-red {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        box-shadow: 0 14px 26px rgba(220, 38, 38, .26);
        transition: all .3s ease;
    }

    .btn-red:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 20px 36px rgba(220, 38, 38, .36);
    }

    .btn-joined {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #64748b;
        transition: all .3s ease;
    }

    .btn-joined:hover {
        background: #fee2e2;
        border-color: #fecaca;
        color: #dc2626;
        transform: translateY(-2px);
    }

    .alert-success {
        animation: slideDown .45s ease forwards;
        background: #ecfdf5;
        color: #047857;
        border: 1px solid #a7f3d0;
    }

    .alert-error {
        animation: slideDown .45s ease forwards;
        background: #fef2f2;
        color: #b91c1c;
        border: 1px solid #fecaca;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .post-card {
        background: rgba(255, 255, 255, .86);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(226, 232, 240, .8);
        box-shadow: 0 16px 34px rgba(15, 23, 42, .06);
        transition: all .3s ease;
        animation: fadeUp .65s ease forwards;
    }

    .post-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 24px 46px rgba(15, 23, 42, .09);
    }

    .comment-input {
        transition: all .25s ease;
        background: #f8fafc;
    }

    .comment-input:focus {
        background: #ffffff;
        border-color: #dc2626;
        box-shadow: 0 0 0 5px rgba(220, 38, 38, .10);
    }

    .user-avatar {
        background: linear-gradient(135deg, #facc15, #f59e0b);
        color: #dc2626;
        box-shadow: 0 10px 20px rgba(245, 158, 11, .20);
    }

    .comment-card {
        background: rgba(255, 255, 255, .88);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(226, 232, 240, .82);
        box-shadow: 0 14px 30px rgba(15, 23, 42, .05);
        transition: all .3s ease;
        animation: fadeUp .65s ease forwards;
    }

    .comment-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 42px rgba(15, 23, 42, .08);
        border-color: rgba(220, 38, 38, .16);
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .empty-state {
        background: rgba(255, 255, 255, .86);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(226, 232, 240, .82);
    }
</style>

<div class="group-page">

    <main class="content-layer w-full max-w-5xl mx-auto px-4 sm:px-6 pb-20 flex-grow">

        <div class="group-hero-card rounded-b-[34px] overflow-hidden">

            <div class="h-52 cover-box overflow-hidden">
                <img src="{{ $group->cover_image ?? 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80' }}"
                     class="w-full h-full object-cover opacity-35 mix-blend-multiply"
                     alt="{{ $group->name }}">
            </div>

            <div class="px-6 md:px-8 pb-7">

                <div class="-mt-16 mb-5 relative z-10">
                    <div class="group-avatar w-28 h-28 bg-white p-1.5 rounded-[26px] inline-block border border-gray-100">
                        <div class="group-icon-inner w-full h-full rounded-[20px] flex items-center justify-center text-white text-4xl font-black">
                            {{ $group->icon_letter ?? strtoupper(substr($group->name, 0, 1)) }}
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert-success px-5 py-4 rounded-2xl mb-5 font-bold">
                    {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert-error px-5 py-4 rounded-2xl mb-5 font-bold">
                     {{ session('error') }}
                    </div>
                @endif

                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">

                    <div>
                        <h1 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight">
                            {{ $group->name }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-3">
                            <span class="status-badge">
                                {{ $group->is_public ? '🌐 Public Group' : '🔒 Private Group' }}
                            </span>

                            <span class="member-badge">
                                👥 {{ $group->members_count }} Members
                            </span>
                        </div>

                        @if($group->description)
                            <p class="text-gray-600 mt-4 max-w-2xl leading-relaxed font-medium">
                                {{ $group->description }}
                            </p>
                        @endif
                    </div>

                    <div class="shrink-0">
                        @auth
                            @if($joined)
                                <form action="{{ route('groups.leave', $group->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-joined px-8 py-3 rounded-2xl font-black text-xs uppercase tracking-wider">
                                        ✓ Joined
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('groups.join', $group->slug) }}" method="POST">
                                    @csrf

                                    <button type="submit"
                                            class="btn-red text-white px-8 py-3 rounded-2xl font-black text-xs uppercase tracking-wider">
                                        Join Group
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                               class="inline-block btn-red text-white px-8 py-3 rounded-2xl font-black text-xs uppercase tracking-wider no-underline">
                                Login untuk Join
                            </a>
                        @endauth
                    </div>

                </div>

            </div>

        </div>

        <div class="max-w-3xl mx-auto mt-8 space-y-5">

            @auth
                @if($joined)

                    <form action="{{ route('groups.comment.store', $group->slug) }}"
                          method="POST"
                          class="post-card p-4 md:p-5 rounded-[28px]">

                        @csrf

                        <div class="flex flex-col sm:flex-row gap-3 sm:items-center">

                            <div class="user-avatar w-11 h-11 rounded-2xl flex-shrink-0 flex items-center justify-center font-black text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <input type="text"
                                   name="content"
                                   value="{{ old('content') }}"
                                   placeholder="Bagikan info loker atau tanya sesuatu..."
                                   class="comment-input w-full rounded-2xl px-4 py-3 text-sm text-gray-900 focus:outline-none border border-transparent transition"
                                   required>

                            <button type="submit"
                                    class="btn-red text-white px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-wider">
                                Post
                            </button>

                        </div>

                        @error('content')
                            <p class="text-red-600 text-sm mt-3 font-semibold">
                                {{ $message }}
                            </p>
                        @enderror

                    </form>

                @else

                    <div class="empty-state p-5 rounded-[26px] shadow-sm text-center font-bold text-gray-600">
                        Join group terlebih dahulu untuk membuat postingan.
                    </div>

                @endif
            @else

                <div class="empty-state p-5 rounded-[26px] shadow-sm text-center font-bold text-gray-600">
                    Login terlebih dahulu untuk membuat postingan.
                </div>

            @endauth

            @forelse($comments as $comment)

                <div class="comment-card rounded-[28px] p-5 relative"
                     style="animation-delay: {{ $loop->index * 0.08 }}s">

                    <div class="flex items-center gap-3 mb-4">

                        <div class="user-avatar w-11 h-11 rounded-2xl font-black flex items-center justify-center text-sm">
                            {{ strtoupper(substr($comment->pelamar->name ?? 'U', 0, 1)) }}
                        </div>

                        <div>
                            <h4 class="font-black text-gray-900 text-sm leading-tight">
                                {{ $comment->pelamar->name ?? 'User' }}
                            </h4>

                            <p class="text-[11px] text-gray-400 font-bold tracking-wide uppercase mt-0.5">
                                {{ $comment->created_at ? $comment->created_at->diffForHumans() : '-' }}
                            </p>
                        </div>

                    </div>

                    <p class="text-gray-800 text-sm leading-relaxed mb-1 whitespace-pre-line">
                        {{ $comment->content }}
                    </p>

                </div>

            @empty

                <div class="empty-state rounded-[28px] p-8 shadow-sm text-center text-gray-500 font-bold">
                    Belum ada postingan di group ini.
                </div>

            @endforelse

        </div>

    </main>

</div>

@endsection