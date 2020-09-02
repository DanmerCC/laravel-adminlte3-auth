<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region o Departamento
 * @package App\Models
 * @version August 2, 2019, 5:38 pm -05
 *
 * @property \App\Models\Departamento departamento
 * @property string nombre
 * @property integer departamento_id
 */
class Region extends Model
{

    protected $connection = 'mysql';

    use SoftDeletes;

    public $table = 'regions';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'departamento_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'departamento_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
		'departamento_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Departamento::class, 'departamento_id', 'id');
    }
}
