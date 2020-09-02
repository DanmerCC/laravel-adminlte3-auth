<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;

/**
 * Class LaborPosition
 *
 * @package App\Models
 * @version February 18, 2020, 10:56 am -05
 * @property string name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\LaborPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\LaborPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\LaborPosition query()
 * @mixin \Eloquent
 */
class LaborPosition extends Model
{


    public $table = 'labor_positions';


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
