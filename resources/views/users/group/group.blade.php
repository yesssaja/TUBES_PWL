@extends('users.layouts.app')

@section('title', 'Halaman Group')

@section('content')

<style>
    body {
        background:
            radial-gradient(circle at top left, rgba(254, 202, 202, .95) 0%, transparent 28%),
            radial-gradient(circle at top right, rgba(254, 243, 199, .95) 0%, transparent 32%),
            linear-gradient(180deg, #fff7ed 0%, #ffffff 45%, #fff1f2 100%);
        min-height: 100vh;
    }

    .hero-bg {
        position: relative;
        overflow: hidden;
        background: rgba(255, 255, 255, .68);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, .7);
        box-shadow: 0 24px 60px rgba(15, 23, 42, .08);
    }

    .hero-bg::before {
        content: '';
        position: absolute;
        width: 360px;
        height: 360px;
        background: #fecaca;
        filter: blur(110px);
        top: -120px;
        right: -120px;
        opacity: .65;
        animation: floatBlob 6s ease-in-out infinite alternate;
    }

    .hero-bg::after {
        content: '';
        position: absolute;
        width: 330px;
        height: 330px;
        background: #fde68a;
        filter: blur(120px);
        bottom: -130px;
        left: -110px;
        opacity: .55;
        animation: floatBlob 7s ease-in-out infinite alternate-reverse;
    }

    @keyframes floatBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(24px) scale(1.08);
        }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
        border-radius: 999px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 900;
        letter-spacing: 4px;
        text-transform: uppercase;
    }

    .text-gradient {
        background: linear-gradient(90deg, #dc2626, #f97316, #facc15, #dc2626);
        background-size: 220% auto;
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        animation: shineText 5s linear infinite;
    }

    @keyframes shineText {
        to {
            background-position: 220% center;
        }
    }

    .create-btn {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        box-shadow: 0 16px 30px rgba(220, 38, 38, .28);
        transition: all .3s ease;
    }

    .create-btn:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 22px 40px rgba(220, 38, 38, .38);
    }

    .group-card {
        position: relative;
        overflow: hidden;
        transition: all .35s cubic-bezier(.22, 1, .36, 1);
        border: 1px solid #f1f5f9;
        isolation: isolate;
    }

    .group-card::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(254, 202, 202, .55);
        border-radius: 999px;
        right: -70px;
        top: -70px;
        z-index: -1;
        transition: all .35s ease;
    }

    .group-card:hover {
        transform: translateY(-12px);
        border-color: rgba(220, 38, 38, .18);
        box-shadow:
            0 28px 60px rgba(15, 23, 42, .12),
            0 12px 24px rgba(220, 38, 38, .12);
    }

    .group-card:hover::after {
        transform: scale(1.25);
        background: rgba(253, 230, 138, .65);
    }

    .group-icon {
        transition: all .4s ease;
        box-shadow: 0 16px 28px rgba(220, 38, 38, .28);
    }

    .group-card:hover .group-icon {
        transform: rotate(-8deg) scale(1.08);
    }

    .member-badge {
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
        border-radius: 999px;
        padding: 8px 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 800;
        font-size: 13px;
    }

    .join-btn {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        transition: all .3s ease;
    }

    .group-card:hover .join-btn {
        transform: translateY(-3px);
        box-shadow: 0 16px 28px rgba(220, 38, 38, .35);
    }

    .animate-card {
        animation: fadeUp .65s ease forwards;
        opacity: 0;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(34px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .empty-card {
        background: rgba(255, 255, 255, .8);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, .75);
    }
</style>

<section class="max-w-7xl mx-auto px-6 pt-10 pb-10">

    <div class="hero-bg rounded-[38px] px-6 md:px-12 py-14 md:py-16">

        <div class="hero-content">

            <p class="hero-badge mb-5">
                Komunitas Pencari Kerja
            </p>

            <h1 class="text-5xl md:text-7xl font-black text-slate-900 leading-tight tracking-tight">
                Temukan
                <span class="text-gradient">
                    Group
                </span>
                <br>
                Sesuai Minatmu
            </h1>

            <p class="text-gray-600 mt-6 text-base md:text-lg max-w-2xl leading-relaxed font-medium">
                Bergabung dengan komunitas pencari kerja terbaik untuk berbagi informasi,
                pengalaman, networking, dan peluang karir terbaru.
            </p>

            <div class="mt-8">
                <a href="{{ route('groups.create') }}"
                   class="create-btn text-white font-black px-7 py-4 rounded-2xl inline-flex items-center gap-2 no-underline">
                    <span>🚀</span>
                    <span>Buat Group</span>
                </a>
            </div>

        </div>

    </div>

</section>

<section class="max-w-7xl mx-auto px-6 pb-20">

    <div class="flex items-center justify-between gap-4 mb-8">

        <div>
            <h2 class="text-3xl font-black text-slate-900">
                Daftar Group
            </h2>

            <p class="text-gray-500 font-semibold mt-1">
                Pilih komunitas yang sesuai dengan minat karirmu.
            </p>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @forelse($groups as $group)

            <a href="{{ route('join_group', $group->slug) }}"
               class="group-card bg-white rounded-[32px] p-8 shadow-lg block animate-card no-underline"
               style="animation-delay: {{ $loop->index * 0.1 }}s">

                <div class="group-icon bg-gradient-to-br from-red-600 to-red-500 text-white w-20 h-20 rounded-3xl flex items-center justify-center text-4xl font-black">
                    {{ $group->icon_letter ?? strtoupper(substr($group->name, 0, 1)) }}
                </div>

                <h2 class="text-3xl font-black text-slate-900 mt-6 line-clamp-2">
                    {{ $group->name }}
                </h2>

                <p class="text-gray-600 mt-3 leading-relaxed line-clamp-3 min-h-[78px]">
                    {{ $group->description }}
                </p>

                <div class="mt-5">
                    <span class="member-badge">
                        👥 {{ $group->members_count ?? 0 }} Member
                    </span>
                </div>

                <div class="mt-6 join-btn text-white font-black px-6 py-3 rounded-2xl shadow-lg inline-flex items-center gap-2">
                    <span>Join Group</span>
                    <span>→</span>
                </div>

            </a>

        @empty

            <div class="md:col-span-2 xl:col-span-3 empty-card rounded-[32px] p-12 text-center shadow-xl">

                <div class="w-20 h-20 mx-auto rounded-3xl bg-red-50 text-red-600 flex items-center justify-center text-4xl mb-5">
                    👥
                </div>

                <h2 class="text-3xl font-black text-slate-900">
                    Belum ada group
                </h2>

                <p class="text-gray-600 mt-3 max-w-xl mx-auto">
                    Data group belum tersedia. Silakan jalankan seeder atau tambahkan group dari admin.
                </p>

            </div>

        @endforelse

    </div>

</section>

@endsection