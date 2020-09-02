<?php

namespace App\Models\moduloAdministrativo;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cargo
 * @package App\Models
 * @version August 20, 2019, 2:02 pm -05
 *
 * @property string nombre
 */
class Cargo extends Model
{
    use SoftDeletes;

    public $table = 'cargos';


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
