@props(['active'])

@php
$classes = ($active ?? false)
            ? 'item cursor-pointer bg-gray-900 text-white flex py-3 px-2 items-center justify-center ' // active
            : 'item cursor-pointer hover:text-black hover:bg-gray-300  flex py-3 px-2 items-center justify-center'; // not active
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
