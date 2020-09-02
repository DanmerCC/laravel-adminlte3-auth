<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoCivil
 * @package App\Models
 * @version August 2, 2019, 4:25 pm -05
 *
 * @property string nombre
 */
class EstadoCivil extends Model
{
    use SoftDeletes;

    public $table = 'estado_civils';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];


}
