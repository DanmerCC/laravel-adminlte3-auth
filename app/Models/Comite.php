<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comite
 * @package App\Models
 * @version September 21, 2019, 9:43 pm -05
 *
 * @property string nombre
 */
class Comite extends Model
{
    use SoftDeletes;

    public $table = 'comites';

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
        'nombre'=>'required'
    ];


}
