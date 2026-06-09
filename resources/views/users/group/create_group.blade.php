@extends('users.layouts.app')

@section('title', 'Buat Group')

@section('content')

<style>
    body {
        background:
            radial-gradient(circle at top left, rgba(254, 202, 202, .95) 0%, transparent 28%),
            radial-gradient(circle at top right, rgba(254, 243, 199, .95) 0%, transparent 32%),
            linear-gradient(180deg, #fff7ed 0%, #ffffff 45%, #fff1f2 100%);
        min-height: 100vh;
    }

    .page-wrapper {
        position: relative;
        overflow: hidden;
    }

    .page-wrapper::before {
        content: '';
        position: absolute;
        width: 360px;
        height: 360px;
        background: #fecaca;
        filter: blur(120px);
        top: -120px;
        right: -120px;
        opacity: .55;
        animation: floatBlob 7s ease-in-out infinite alternate;
        z-index: 0;
    }

    .page-wrapper::after {
        content: '';
        position: absolute;
        width: 330px;
        height: 330px;
        background: #fde68a;
        filter: blur(120px);
        bottom: -130px;
        left: -110px;
        opacity: .5;
        animation: floatBlob 8s ease-in-out infinite alternate-reverse;
        z-index: 0;
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

    .form-card {
        background: rgba(255, 255, 255, .82);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, .75);
        box-shadow:
            0 28px 70px rgba(15, 23, 42, .10),
            0 12px 30px rgba(220, 38, 38, .08);
        animation: fadeUp .65s ease forwards;
    }

    .form-card:hover {
        box-shadow:
            0 34px 80px rgba(15, 23, 42, .12),
            0 16px 34px rgba(220, 38, 38, .10);
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

    .input-box {
        transition: all .25s ease;
        background: #ffffff;
    }

    .input-box:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 5px rgba(220, 38, 38, .10);
        transform: translateY(-2px);
    }

    .success-alert {
        animation: slideDown .5s ease forwards;
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

    .btn-back {
        background: #f1f5f9;
        color: #334155;
        transition: all .3s ease;
    }

    .btn-back:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
    }

    .btn-submit {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        box-shadow: 0 16px 28px rgba(220, 38, 38, .28);
        transition: all .3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 22px 38px rgba(220, 38, 38, .38);
    }

    .field-icon {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: #fef2f2;
        color: #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
</style>

<div class="page-wrapper">

    @if(session('success'))
        <div class="content-layer max-w-7xl mx-auto px-6 pt-8">
            <div class="success-alert bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-2xl shadow">
                <div class="flex items-center gap-3">
                    <div>
                        <p class="font-black"> Berhasil </p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section class="content-layer max-w-3xl mx-auto px-6 py-14">

        <div class="text-center mb-10">

            <p class="hero-badge mb-4">
                Komunitas Pencari Kerja
            </p>

            <h1 class="text-5xl md:text-6xl font-black text-slate-900 leading-tight">
                Buat
                <span class="text-gradient">
                    Group Baru
                </span>
            </h1>

            <p class="text-gray-600 mt-4 leading-relaxed max-w-2xl mx-auto font-medium">
                Bangun komunitas dan berbagi informasi karir bersama anggota lainnya.
            </p>

        </div>

        <div class="form-card rounded-[34px] p-6 md:p-10">

            <form action="{{ route('groups.store') }}" method="POST">

                @csrf

                <div class="mb-6">

                    <div class="flex items-center gap-3 mb-3">
                        <label class="block font-black text-slate-900">
                            Nama Group
                        </label>
                    </div>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh : Laravel Developer Indonesia"
                        class="input-box w-full p-4 rounded-2xl border border-gray-200 focus:outline-none text-gray-800 font-semibold">

                    @error('name')
                        <p class="text-red-600 text-sm mt-2 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-8">

                    <div class="flex items-center gap-3 mb-3">
                        <label class="block font-black text-slate-900">
                            Deskripsi Group
                        </label>

                    </div>

                    <textarea
                        name="description"
                        rows="6"
                        placeholder="Jelaskan tujuan dan isi komunitas ini..."
                        class="input-box w-full p-4 rounded-2xl border border-gray-200 focus:outline-none text-gray-800 font-semibold resize-none">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-600 text-sm mt-2 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="flex flex-col sm:flex-row gap-4">

                    <a href="{{ route('groups.index') }}"
                       class="btn-back px-6 py-3 rounded-2xl font-black transition text-center no-underline">
                        ← Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn-submit text-white px-8 py-3 rounded-2xl font-black transition flex-1">
                        + Simpan Group
                    </button>

                </div>

            </form>

        </div>

    </section>

</div>

@endsection