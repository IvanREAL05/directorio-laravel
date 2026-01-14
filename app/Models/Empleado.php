<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;
    // Nombre de la tabla en la base de datos
    protected $table = 'empleados';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'departamento_id',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'puesto',
        'activo',
    ];

    /*
    |--------------------------------------------------------------------------
    | SCOPES (Filtros reutilizables)
    |--------------------------------------------------------------------------
    */

    // Scope para obtener solo empleados activos
    // Uso: Empleado::activos()->get()
    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    // Un empleado pertenece a un departamento
    // Uso: $empleado->departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    /*
    |--------------------------------------------------------------------------
    | MÉTODOS DE NEGOCIO
    |--------------------------------------------------------------------------
    */

    // Método para activar el empleado
    public function activar()
    {
        $this->activo = 1;
        return $this->save();
    }

    // Método para desactivar el empleado
    public function desactivar()
    {
        $this->activo = 0;
        return $this->save();
    }
}