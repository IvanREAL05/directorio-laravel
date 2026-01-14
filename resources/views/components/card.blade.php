{{-- 
    Componente para crear tarjetas con título opcional
    Útil para agrupar contenido
--}}

@props([
    'title' => null  // Título opcional de la tarjeta
])

<div {{ $attributes->merge(['class' => 'card']) }} style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    {{-- Si hay título, lo mostramos --}}
    @if($title)
        <h2 style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 2px solid #f0f0f0;">
            {{ $title }}
        </h2>
    @endif
    
    {{-- El contenido de la tarjeta --}}
    <div>
        {{ $slot }}
    </div>
</div>