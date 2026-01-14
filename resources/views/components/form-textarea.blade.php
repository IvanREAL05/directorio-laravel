{{-- 
    Componente para textarea con label y manejo de errores
    Similar al form-input pero para textos largos
--}}

@props([
    'name',
    'label',
    'required' => false,
    'value' => '',
    'rows' => 3          // Número de líneas visibles
])

<div class="form-group">
    <label for="{{ $name }}">
        {{ $label }}
        @if($required) <span style="color: red;">*</span> @endif
    </label>
    
    {{-- 
        En textarea, el valor va ENTRE las etiquetas, no en un atributo value
    --}}
    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}" 
        rows="{{ $rows }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>
    
    @error($name)
        <small style="color: red; display: block; margin-top: 5px;">
            {{ $message }}
        </small>
    @enderror
</div>