@props(['active', 'icon'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2.5 text-sm font-medium rounded-lg bg-blue-600 text-white shadow-md mb-1'
            : 'flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-all duration-200 mb-1';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <svg class="w-5 h-5 mr-3 {{ ($active ?? false) ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
    </svg>
    {{ $slot }}
</a>
