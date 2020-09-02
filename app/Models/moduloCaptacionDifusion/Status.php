<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Statu
 * @package App\Models
 * @version February 18, 2020, 11:04 am -05
 *
 * @property string name
 */
class Status extends Model
{


    protected $connection = 'inscripcionesv2';

    public $table = 'status';

    public static $PENDIENTE=1;
    public static $DESESTIMADO=2;
    public static $INSCRITO=3;

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];


}
