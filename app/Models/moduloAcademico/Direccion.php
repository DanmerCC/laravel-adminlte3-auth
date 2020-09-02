<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Direccion
 * @package App\Models
 * @version August 2, 2019, 5:45 pm -05
 *
 * @property \App\Models\Pais pais
 * @property \App\Models\Departamento departamento
 * @property \App\Models\Departamento regions
 * @property \App\Models\Departamento distrito
 * @property integer pais_id
 * @property integer departamento_id
 * @property integer regions_id
 * @property integer distrito_id
 */
class Direccion extends Model
{

    protected $connection = 'mysql';

    use SoftDeletes;

    public $table = 'direccions';

    public $with=['pais','departamento','regions','distrito'];


    protected $dates = ['deleted_at'];


    public $fillable = [
        'pais_id',
        'departamento_id',
        'regions_id',
        'distrito_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pais_id' => 'integer',
        'departamento_id' => 'integer',
        'regions_id' => 'integer',
        'distrito_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pais_id' => 'required',
        'departamento_id' => 'required',
        'regions_id' => 'required',
        'distrito_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pais()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Pais::class, 'pais_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Departamento::class, 'departamento_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function regions()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Region::class, 'regions_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function distrito()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Distrito::class, 'distrito_id', 'id');
    }
}
