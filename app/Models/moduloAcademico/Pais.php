<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pais
 * @package App\Models
 * @version August 2, 2019, 5:21 pm -05
 *
 * @property string nombre
 */
class Pais extends Model
{
    use SoftDeletes;

    public $table = 'pais';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre','codigo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'codigo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
		'codigo' => 'required|min:2',
    ];


}
