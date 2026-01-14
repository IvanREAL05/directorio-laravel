<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Listar empleados activos
     */
    public function index()
    {
        $empleados = Empleado::activos()
            ->with('departamento')
            ->orderBy('apellido')
            ->orderBy('nombre')
            ->get();

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        $departamentos = Departamento::activos()
            ->orderBy('nombre')
            ->get();

        return view('empleados.create', compact('departamentos'));
    }

    /**
     * Guardar nuevo empleado
     */
    public function store(Request $request)
    {
        $request->validate([
            'departamento_id' => 'required|exists:departamentos,id',
            'nombre'          => 'required|string|max:100',
            'apellido'        => 'required|string|max:100',
            'email'           => 'required|email|unique:empleados,email',
            'telefono'        => 'nullable|string|max:20',
            'puesto'          => 'nullable|string|max:100',
        ]);

        Empleado::create([
            'departamento_id' => $request->departamento_id,
            'nombre'          => $request->nombre,
            'apellido'        => $request->apellido,
            'email'           => $request->email,
            'telefono'        => $request->telefono,
            'puesto'          => $request->puesto,
            'activo'          => 1,
        ]);

        return redirect()
            ->route('empleados.index')
            ->with('success', 'Empleado creado correctamente');
    }

    /**
     * Mostrar empleado (opcional si lo necesitas)
     */
    public function show(Empleado $empleado)
    {
        $empleado->load('departamento');
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Formulario de edición
     */
    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::activos()
            ->orderBy('nombre')
            ->get();

        return view('empleados.edit', compact('empleado', 'departamentos'));
    }

    /**
     * Actualizar empleado
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'departamento_id' => 'required|exists:departamentos,id',
            'nombre'          => 'required|string|max:100',
            'apellido'        => 'required|string|max:100',
            'email'           => 'required|email|unique:empleados,email,' . $empleado->id,
            'telefono'        => 'nullable|string|max:20',
            'puesto'          => 'nullable|string|max:100',
        ]);

        $empleado->update($request->only([
            'departamento_id',
            'nombre',
            'apellido',
            'email',
            'telefono',
            'puesto'
        ]));

        return redirect()
            ->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente');
    }

    /**
     * Desactivar empleado (NO eliminar)
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete(); //se usa softdeletes 

        return redirect()
            ->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente');
    }

    /**
     * Cambiar estado activo/inactivo (toggle)
     */
    public function toggle($id)
    {
        $empleado = Empleado::whereNull('deleted_at')->findOrFail($id);

        $empleado->activo
            ? $empleado->desactivar()
            : $empleado->activar();

        return redirect()
            ->back()
            ->with('success', 'Estado del empleado actualizado');
    }
}