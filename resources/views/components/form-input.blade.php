{{-- 
    Componente para input de formulario con label y manejo de errores
    Parámetros:
    - $name: nombre del campo (obligatorio)
    - $label: texto del label (obligatorio)
    - $type: tipo de input (text, email, number, etc.)
    - $required: si es obligatorio o no
    - $value: valor por defecto
--}}

@props([
    'name',                    // Obligatorio
    'label',                   // Obligatorio
    'type' => 'text',         // Por defecto es texto
    'required' => false,      // Por defecto no es obligatorio
    'value' => ''            // Valor vacío por defecto
])

<div class="form-group">
    {{-- for="" conecta el label con el input por el id --}}
    <label for="{{ $name }}">
        {{ $label }} 
        {{-- Si es required, mostramos un asterisco --}}
        @if($required) <span style="color: red;">*</span> @endif
    </label>
    
    {{-- 
        old($name, $value) busca primero si hay un valor anterior (después de error de validación)
        Si no lo hay, usa $value
    --}}
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        value="{{ old($name, $value) }}"
        {{-- Si es required, agrega el atributo HTML required --}}
        {{ $required ? 'required' : '' }}
        {{-- $attributes permite pasar más atributos como placeholder, maxlength, etc. --}}
        {{ $attributes }}
    >
    
    {{-- Mostrar error si existe para este campo --}}
    @error($name)
        <small style="color: red; display: block; margin-top: 5px;">
            {{ $message }}
        </small>
    @enderror
</div>