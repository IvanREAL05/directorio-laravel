@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <x-card title="Editar Empleado">
        
        <form action="{{ route('empleados.update', $empleado) }}" method="POST">
            @csrf
            @method('PUT')

            <x-form-select 
                name="departamento_id" 
                label="Departamento" 
                :options="$departamentos"
                :selected="$empleado->departamento_id"
                :required="true"
            />

            <x-form-input 
                name="nombre" 
                label="Nombre" 
                :required="true"
                :value="$empleado->nombre"
            />

            <x-form-input 
                name="apellido" 
                label="Apellido" 
                :required="true"
                :value="$empleado->apellido"
            />

            <x-form-input 
                name="email" 
                label="Email" 
                type="email"
                :required="true"
                :value="$empleado->email"
            />

            <x-form-input 
                name="telefono" 
                label="Teléfono"
                :value="$empleado->telefono"
            />

            <x-form-input 
                name="puesto" 
                label="Puesto"
                :value="$empleado->puesto"
            />

            <div style="margin-top: 20px; display: flex; gap: 10px;">
                {{-- type="submit" hará que el botón envíe el formulario --}}
                <x-button type="submit">
                    Actualizar Empleado
                </x-button>
                
                <x-button type="warning" :href="route('empleados.index')">
                    Cancelar
                </x-button>
            </div>
        </form>
        
    </x-card>
@endsection