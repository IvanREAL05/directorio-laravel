<?php //indicar que es en lenguaje php

namespace App\Models; //es el nombre que se ocupara para llamar lo que tiene este archivo

use Illuminate\Database\Eloquent\Model; //llama a las demas clases que se ocupan en este archivo
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;
    // Nombre de la tabla en la base de datos
    protected $table = 'departamentos';
    //¿Porque protected? ¿Cuando se ocupa?
    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];
    //son las columnas de mi tabla que suponogo se deben de cuidar

    /*
    |--------------------------------------------------------------------------
    | SCOPES (Filtros reutilizables)
    |--------------------------------------------------------------------------
    */

    // Scope para obtener solo departamentos activos
    // Uso: Departamento::activos()->get()
    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    /*Dudas:
        1. ¿De donde viene el argumento $query? 
        2. where es una palabra reservada??
        3. Cuales son los argumentos que necesita where();
        4. return $query->where('activo', 1); por lo que entendi es "regresa de la tabla departamento lo que tiene activo = 1 */

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */
    /*MAs dudas
        1. Siempre debo poner las relacion en caso de que mi DB tenga?
    */
    // Un departamento tiene muchos empleados
    // Uso: $departamento->empleados
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'departamento_id');
        //¿Que regresa esta linea? return $this->hasMany(Empleado::class, 'departamento_id');
    }

    /*
    |--------------------------------------------------------------------------
    | MÉTODOS DE NEGOCIO
    |--------------------------------------------------------------------------
    */

    // Método para activar el departamento
    public function activar()
    {
        $this->activo = 1; //U avez ¿Para que sirve this?
        return $this->save(); //this accede al metodo save() ¿No es asi?
    }

    // Método para desactivar el departamento
    public function desactivar()
    {
        $this->activo = 0;
        return $this->save();
    }
}

/*Ahora despues de construir mi modelo Departamento en el constructor ¿Como llamo a las funciones?
¿Como deberia de entender la carpeta de modelos?
¿Cual es la sintaxis de llamar alguna funcion de modelos? */