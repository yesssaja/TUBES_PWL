@php
    $colorMap = [
        'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-600'],
        'yellow' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-600'],
        'orange' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-600'],
        'green' => ['bg' => 'bg-green-100', 'text' => 'text-green-600'],
        'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
        'purple' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-600'],
    ];

    $bg = $colorMap[$color]['bg'] ?? 'bg-red-100';
    $text = $colorMap[$color]['text'] ?? 'text-red-600';
@endphp

<div class="bg-white rounded-[24px] p-5 shadow-soft border border-slate-100 flex items-center gap-5 hover:-translate-y-1 hover:shadow-lg transition">

    <div class="w-14 h-14 rounded-2xl {{ $bg }} {{ $text }} flex items-center justify-center">

        @if($icon === 'user')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 21a8 8 0 0116 0" />
            </svg>
        @elseif($icon === 'calendar')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z" />
            </svg>
        @elseif($icon === 'briefcase')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6V5a2 2 0 012-2h0a2 2 0 012 2v1m-8 0h12a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z" />
            </svg>
        @elseif($icon === 'document')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
            </svg>
        @elseif($icon === 'users')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
        @elseif($icon === 'building')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 21V5a1 1 0 011-1h6v17M13 21V9h6a1 1 0 011 1v11M8 8h1m-1 4h1m-1 4h1m7-4h1m-1 4h1" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6-5.4-2.84-5.4 2.84 1.03-6-4.36-4.25 6.03-.88L12 3z" />
            </svg>
        @endif

    </div>

    <div>
        <h2 class="text-slate-500 text-sm font-semibold">
            {{ $title }}
        </h2>

        <p class="text-3xl font-black {{ $text }}">
            {{ $total }}
        </p>
    </div>

</div>