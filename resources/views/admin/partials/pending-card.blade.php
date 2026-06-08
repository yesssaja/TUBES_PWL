@php
    $colorClass = [
        'red' => 'bg-red-50 hover:bg-red-100 border-red-100 text-red-600 bg-red-100',
        'yellow' => 'bg-yellow-50 hover:bg-yellow-100 border-yellow-100 text-yellow-600 bg-yellow-100',
        'orange' => 'bg-orange-50 hover:bg-orange-100 border-orange-100 text-orange-600 bg-orange-100',
        'blue' => 'bg-blue-50 hover:bg-blue-100 border-blue-100 text-blue-600 bg-blue-100',
        'purple' => 'bg-purple-50 hover:bg-purple-100 border-purple-100 text-purple-600 bg-purple-100',
    ][$color] ?? 'bg-red-50 hover:bg-red-100 border-red-100 text-red-600 bg-red-100';

    $parts = explode(' ', $colorClass);
    $cardBg = $parts[0] . ' ' . $parts[1];
    $border = $parts[2];
    $textColor = $parts[3];
    $iconBg = $parts[4];
@endphp

<a href="{{ $route }}"
    class="{{ $cardBg }} rounded-[22px] p-5 border {{ $border }} transition hover:-translate-y-1 hover:shadow-lg block">

    <div class="w-12 h-12 rounded-2xl {{ $iconBg }} {{ $textColor }} flex items-center justify-center mb-4">
        @if($icon === 'mail')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
            </svg>
        @elseif($icon === 'document')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
            </svg>
        @elseif($icon === 'academic')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.42A12 12 0 0119 15c0 2-3.13 4-7 4s-7-2-7-4c0-1.5.46-2.95.84-4.42L12 14z" />
            </svg>
        @elseif($icon === 'wallet')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a3 3 0 00-3-3H7a3 3 0 00-3 3v10a3 3 0 003 3h10a3 3 0 003-3v-2m-5-3h6m-3-3v6" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6-5.4-2.84-5.4 2.84 1.03-6-4.36-4.25 6.03-.88L12 3z" />
            </svg>
        @endif
    </div>

    <p class="text-slate-500 font-bold">
        {{ $title }}
    </p>

    <h3 class="text-4xl font-black {{ $textColor }} mt-2">
        {{ $total }}
    </h3>

    <p class="text-sm text-slate-500 mt-3">
        {{ $desc }}
    </p>
</a>