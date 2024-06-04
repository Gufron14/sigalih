@props(['active' => false])

@php
    $classes = $active ?? false ? 'menu-item active' : 'menu-item';
@endphp

<li class="menu-item">
    <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}> {{ $slot }} </a>
</li>