{{-- 
    Componente de botón reutilizable
    Parámetros:
    - $type: tipo/color del botón (primary, success, danger, warning, submit)
    - $href: URL (si es enlace)
    - $slot: contenido del botón
--}}

@props([
    'type' => 'primary',
    'href' => null
])

{{-- Si tiene href, es un enlace --}}
@if($href)
    <a 
        href="{{ $href }}" 
        {{ $attributes->merge(['class' => "btn btn-{$type}"]) }}
    >
        {{ $slot }}
    </a>
@else
    {{-- 
        Si NO tiene href, es un botón
        Si type="submit", ponemos type="submit" en HTML
        Si no, ponemos type="button"
    --}}
    <button 
        type="{{ $type === 'submit' ? 'submit' : 'button' }}"
        {{ $attributes->merge(['class' => "btn btn-" . ($type === 'submit' ? 'danger' : $type)]) }}
    >
        {{ $slot }}
    </button>
@endif