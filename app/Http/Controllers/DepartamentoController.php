<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; //Se llaman los modelos *Departamento*


class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::activos()->get();
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable'
        ]);

        Departamento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => 1
        ]);

        return redirect()->route('departamentos.index');
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable'
        ]);

        $departamento->update($request->only('nombre', 'descripcion'));

        return redirect()->route('departamentos.index');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamentos.index');
    }


    public function toggle($id)
    {
        $departamento = Departamento::findOrFail($id);

        if ($departamento->trashed()) {
            return redirect()->back()
                ->with('error', 'No se puede cambiar el estado de un departamento eliminado');
        }

        $departamento->activo
            ? $departamento->desactivar()
            : $departamento->activar();

        return redirect()->back()
            ->with('success', 'Estado del departamento actualizado');
    }
}
