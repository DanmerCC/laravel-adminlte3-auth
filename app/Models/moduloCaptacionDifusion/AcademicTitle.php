<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AcademicTitle
 * @package App\Models
 * @version February 18, 2020, 10:54 am -05
 *
 * @property string name
 */
class AcademicTitle extends Model
{

    public $table = 'academic_titles';

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

    ];


}
