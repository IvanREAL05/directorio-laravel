{{-- 
    Componente para mostrar alertas (success, error, warning, info)
    Parámetros:
    - $type: tipo de alerta (success, danger, warning, info)
    - $message: mensaje a mostrar (opcional, puede usar $slot)
--}}

@props([
    'type' => 'success',
    'message' => null
])

{{-- Solo se muestra si hay mensaje o contenido en $slot --}}
@if($message || $slot->isNotEmpty())
    <div {{ $attributes->merge(['class' => "alert alert-{$type}"]) }}>
        {{-- Si se pasó $message, lo usamos, si no, usamos $slot --}}
        {{ $message ?? $slot }}
    </div>
@endif