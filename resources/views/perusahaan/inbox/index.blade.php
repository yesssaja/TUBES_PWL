@extends('perusahaan.layouts.app')

@section('title', 'Inbox Perusahaan')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Inbox Perusahaan
            </h1>

            <p class="text-gray-500 mt-2">
                Lihat pemberitahuan lamaran, RSVP, event, course, dan aktivitas perusahaan.
            </p>
        </div>

        <a href="{{ route('perusahaan.dashboard') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-semibold">
            ← Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($inboxes->count() > 0)
        <div class="mb-6 flex justify-end">
            <form action="{{ route('perusahaan.inbox.readAll') }}" method="POST">
                @csrf
                @method('PUT')

                <button type="submit"
                        class="bg-gray-800 hover:bg-black text-white px-5 py-3 rounded-2xl font-bold">
                    Tandai Semua Dibaca
                </button>
            </form>
        </div>
    @endif

    <div class="space-y-5">

        @forelse($inboxes as $inbox)

            <div class="bg-white rounded-3xl shadow border {{ $inbox->is_read ? 'border-gray-100' : 'border-yellow-300' }} p-6">

                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5">

                    <div class="flex-1 min-w-0">

                        <div class="flex flex-wrap items-center gap-3 mb-3">

                           @if(in_array($inbox->type, ['lamaran', 'lamaran_masuk']))
    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">
        Lamaran Masuk
    </span>

@elseif(in_array($inbox->type, ['rsvp', 'rsvp_masuk']))
    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold">
        RSVP Masuk
    </span>

@elseif(in_array($inbox->type, ['event', 'event_info']))
    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-bold">
        Event
    </span>

@elseif(in_array($inbox->type, ['event_daftar', 'pendaftaran_event']))
    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-bold">
        Pendaftaran Event
    </span>

@elseif(in_array($inbox->type, ['course', 'course_info']))
    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
        Course
    </span>

@elseif(in_array($inbox->type, ['course_daftar', 'pendaftaran_course']))
    <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">
        Pendaftaran Course
    </span>

@elseif($inbox->type === 'admin_message')
    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
        Pesan Admin
    </span>

@else
    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">
        Info
    </span>
@endif

                            @if(!$inbox->is_read)
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                    Baru
                                </span>
                            @endif

                        </div>

                        <h2 class="text-2xl font-black text-gray-900 break-words">
                            {{ $inbox->title ?? 'Tanpa Judul' }}
                        </h2>

                        <p class="text-gray-600 mt-3 leading-relaxed break-words">
                            {{ $inbox->message ?? 'Tidak ada isi pesan.' }}
                        </p>

                        @if(!empty($inbox->action_url) && !empty($inbox->action_text))
                            <a href="{{ $inbox->action_url }}"
                               class="inline-block mt-5 bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl text-sm font-bold">
                                {{ $inbox->action_text }}
                            </a>
                        @endif

                        <p class="text-sm text-gray-400 mt-4">
                            {{ $inbox->created_at ? $inbox->created_at->format('d M Y H:i') : '-' }}
                        </p>

                    </div>

                    <div class="md:w-44 flex md:justify-end">

                        @if(!$inbox->is_read)
                            <form action="{{ route('perusahaan.inbox.read', $inbox->id) }}"
                                  method="POST"
                                  class="w-full md:w-auto">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="w-full md:w-auto bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl text-sm font-bold">
                                    Tandai Dibaca
                                </button>
                            </form>
                        @else
                            <span class="w-full md:w-auto text-center bg-gray-100 text-gray-500 px-5 py-3 rounded-2xl text-sm font-bold">
                                Dibaca
                            </span>
                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-3xl shadow p-12 text-center">
                <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                    📬
                </div>

                <h3 class="text-2xl font-black text-gray-800">
                    Inbox masih kosong
                </h3>

                <p class="text-gray-500 mt-2">
                    Belum ada pemberitahuan untuk perusahaan.
                </p>
            </div>

        @endforelse

    </div>

</div>

@endsection