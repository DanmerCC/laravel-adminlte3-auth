<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AcademicGrade
 * @package App\Models
 * @version February 18, 2020, 10:54 am -05
 *
 * @property string name
 */
class AcademicGrade extends Model
{


    public static $MASGISTER_ID = 3;
    public static $DOCTORADO_ID = 4;

    public $table = 'academic_grades';

    protected $connection = 'inscripcionesv2';


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
