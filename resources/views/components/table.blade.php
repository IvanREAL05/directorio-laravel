{{-- 
    Componente para crear tablas
    Usa slots nombrados para header y body
--}}

@props([
    'headers' => []  // Array de encabezados (opcional)
])

<table {{ $attributes->merge(['class' => 'table']) }}>
    {{-- Si hay headers, los mostramos --}}
    @if(count($headers) > 0)
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
    @else
        {{-- Si no se pasó array, usamos slot nombrado --}}
        <thead>
            {{ $header ?? '' }}
        </thead>
    @endif
    
    <tbody>
        {{-- El contenido del tbody viene del slot principal --}}
        {{ $slot }}
    </tbody>
</table>