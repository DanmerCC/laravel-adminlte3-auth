<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;


/**
 * Class Institution
 * @package App\Models
 * @version February 18, 2020, 10:56 am -05
 *
 * @property string name
 */
class Institution extends Model
{


    public $table = 'institutions';

    protected $connection = 'inscripcionesv2';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
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
