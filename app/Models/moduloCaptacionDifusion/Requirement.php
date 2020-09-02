<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Requirement
 *
 * @package App\Models
 * @version February 18, 2020, 10:57 am -05
 * @property string name
 * @property string description
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Requirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Requirement extends Model
{


    protected $connection = 'inscripcionesv2';

    public $table = 'requirements';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];


}
