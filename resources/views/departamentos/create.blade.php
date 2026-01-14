{{-- Usa el layout base --}}
@extends('layouts.app')

{{-- Define el título de la página --}}
@section('title', 'Crear Departamento')

{{-- Comienza el contenido principal --}}
@section('content')
    {{-- 
        <x-card> con parámetro title
        El componente card mostrará este título en un <h2>
    --}}
    <x-card title="Crear Nuevo Departamento">
        
        {{-- 
            Formulario que se enviará a la ruta 'departamentos.store'
            route('departamentos.store') genera algo como: /departamentos
            method="POST" indica que es una petición POST
        --}}
        <form action="{{ route('departamentos.store') }}" method="POST">
            {{-- Token de seguridad CSRF (obligatorio) --}}
            @csrf

            {{-- 
                <x-form-input> llama al componente form-input.blade.php
                name="nombre" define el atributo name del input
                label="Nombre del Departamento" es el texto del label
                :required="true" indica que el campo es obligatorio
                Los dos puntos (:) indican que true es código PHP, no el string "true"
            --}}
            <x-form-input 
                name="nombre" 
                label="Nombre del Departamento" 
                :required="true"
            />

            {{-- 
                <x-form-textarea> llama al componente form-textarea.blade.php
                name="descripcion" define el nombre del campo
                label es el texto que aparece arriba
                rows="4" define cuántas líneas de alto tiene el textarea
            --}}
            <x-form-textarea 
                name="descripcion" 
                label="Descripción"
                rows="4"
            />

            {{-- Contenedor para los botones --}}
            <div style="margin-top: 20px; display: flex; gap: 10px;">
                {{-- 
                    Botón de enviar formulario
                    type="success" define el color (verde)
                    ::type="'submit'" pone el atributo HTML type="submit"
                    El doble dos puntos (::) es para atributos HTML
                --}}
                <x-button type="submit">
                    Guardar Departamento
                </x-button>
                
                {{-- 
                    Botón de cancelar (en realidad es un enlace)
                    type="warning" define el color (amarillo/naranja)
                    :href es la URL a donde redirige
                    route('departamentos.index') genera la URL de la lista de departamentos
                --}}
                <x-button type="warning" :href="route('departamentos.index')">
                    Cancelar
                </x-button>
            </div>
        </form>
        
    </x-card>
@endsection