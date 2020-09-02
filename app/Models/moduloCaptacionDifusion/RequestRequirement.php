<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RequestRequirement
 *
 * @package App\Models
 * @version February 18, 2020, 11:26 am -05
 * @property \Illuminate\Database\Eloquent\Collection requirements
 * @property \Illuminate\Database\Eloquent\Collection requirements1s
 * @property integer id_requirement
 * @property integer id_public_user
 * @property-read \App\Models\moduloCaptacionDifusion\Requirement $requirement
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\RequestRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\RequestRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\RequestRequirement query()
 * @mixin \Eloquent
 */
class RequestRequirement extends Model
{


    public $table = 'request_requirements';


    protected $dates = ['deleted_at'];

    protected $connection = 'inscripcionesv2';

    public $fillable = [
        'id_requirement',
        'id_public_user'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_requirement' => 'integer',
        'id_public_user' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function requirement()
    {
        return $this->hasOne(Requirement::class, 'id_requirement', 'id');
    }

}
