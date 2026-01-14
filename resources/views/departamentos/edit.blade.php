@extends('layouts.app')

@section('title', 'Editar Departamento')

@section('content')
    <x-card title="Editar Departamento">
        
        {{-- 
            Formulario que se envía a la ruta 'departamentos.update'
            route('departamentos.update', $departamento) genera la URL con el ID
            Ejemplo: /departamentos/5
            $departamento viene del controller: compact('departamento')
        --}}
        <form action="{{ route('departamentos.update', $departamento) }}" method="POST">
            @csrf
            
            {{-- 
                @method('PUT') simula una petición PUT
                Laravel route resource usa PUT para actualizar
                HTML solo soporta GET y POST, por eso necesitamos simularlo
            --}}
            @method('PUT')

            {{-- 
                Campo de nombre con valor actual
                :value="$departamento->nombre" prellenará el input con el valor actual
                old('nombre', $departamento->nombre) funciona así:
                1. Si hay error de validación, muestra lo que el usuario escribió (old)
                2. Si no hay error, muestra el valor actual de la base de datos
            --}}
            <x-form-input 
                name="nombre" 
                label="Nombre del Departamento" 
                :required="true"
                :value="$departamento->nombre"
            />

            {{-- Campo de descripción con valor actual --}}
            <x-form-textarea 
                name="descripcion" 
                label="Descripción"
                rows="4"
                :value="$departamento->descripcion"
            />

            <div style="margin-top: 20px; display: flex; gap: 10px;">
                {{-- Botón para actualizar --}}
                <x-button type="submit">
                    Actualizar Departamento
                </x-button>
                
                {{-- Botón para volver sin guardar cambios --}}
                <x-button type="warning" :href="route('departamentos.index')">
                    Cancelar
                </x-button>
            </div>
        </form>
        
    </x-card>
@endsection