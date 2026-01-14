@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
    <x-card title="Crear Nuevo Empleado">
        
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <x-form-select 
                name="departamento_id" 
                label="Departamento" 
                :options="$departamentos"
                :required="true"
            />

            <x-form-input 
                name="nombre" 
                label="Nombre" 
                :required="true"
            />

            <x-form-input 
                name="apellido" 
                label="Apellido" 
                :required="true"
            />

            <x-form-input 
                name="email" 
                label="Email" 
                type="email"
                :required="true"
            />

            <x-form-input 
                name="telefono" 
                label="Teléfono"
                placeholder="Ej: 555-1234"
            />

            <x-form-input 
                name="puesto" 
                label="Puesto"
                placeholder="Ej: Desarrollador"
            />

            <div style="margin-top: 20px; display: flex; gap: 10px;">
                {{-- type="submit" hará que el botón envíe el formulario --}}
                <x-button type="submit">
                    Guardar Empleado
                </x-button>
                
                <x-button type="warning" :href="route('empleados.index')">
                    Cancelar
                </x-button>
            </div>
        </form>
        
    </x-card>
@endsection