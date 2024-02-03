@props(['route'])

<a href="{{ $route }}" {{ $attributes->merge([
    'class' => ''
]) }}>
    {{ $slot }}
</a>
