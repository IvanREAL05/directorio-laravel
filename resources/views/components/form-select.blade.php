{{-- 
    Componente para select (dropdown) con label y manejo de errores
    Parámetros:
    - $name: nombre del campo
    - $label: texto del label
    - $options: colección o array de opciones
    - $valueField: campo que se usará como value (por defecto 'id')
    - $textField: campo que se mostrará como texto (por defecto 'nombre')
    - $selected: valor seleccionado actualmente
    - $placeholder: texto del option por defecto
--}}

@props([
    'name',
    'label',
    'options' => [],           // Array u colección de opciones
    'valueField' => 'id',      // Campo para el value del option
    'textField' => 'nombre',   // Campo para el texto visible
    'selected' => null,        // Valor seleccionado
    'placeholder' => '-- Seleccione --',
    'required' => false
])

<div class="form-group">
    <label for="{{ $name }}">
        {{ $label }}
        @if($required) <span style="color: red;">*</span> @endif
    </label>
    
    <select 
        name="{{ $name }}" 
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    >
        {{-- Option por defecto (vacío) --}}
        <option value="">{{ $placeholder }}</option>
        
        {{-- Iteramos sobre las opciones --}}
        @foreach($options as $option)
            <option 
                value="{{ $option->$valueField }}"
                {{-- 
                    Comparamos:
                    1. Si hay old() del campo (error de validación)
                    2. Si no, usamos $selected
                    Si coincide, marcamos como selected
                --}}
                {{ old($name, $selected) == $option->$valueField ? 'selected' : '' }}
            >
                {{ $option->$textField }}
            </option>
        @endforeach
    </select>
    
    @error($name)
        <small style="color: red; display: block; margin-top: 5px;">
            {{ $message }}
        </small>
    @enderror
</div>