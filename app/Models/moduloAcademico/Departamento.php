<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departamento
 * @package App\Models
 * @version August 2, 2019, 5:32 pm -05
 *
 * @property \App\Models\Pais pais
 * @property string nombre
 * @property integer pais_id
 */
class Departamento extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';

    public $table = 'departamentos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'nombre',
        'pais_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pais_id'=>'integer',
        'nombre' => 'string',
        'codigo'=>'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'pais_id'=>'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pais()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Pais::class, 'pais_id', 'id');
    }
}
