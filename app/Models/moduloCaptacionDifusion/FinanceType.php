<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;


/**
 * Class FinanceType
 *
 * @package App\Models
 * @version February 28, 2020, 11:07 am -05
 * @property string name
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FinanceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FinanceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FinanceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FinanceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FinanceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FinanceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FinanceType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FinanceType extends Model
{

    public $table = 'finance_types';

    protected $connection = 'inscripcionesv2';

    protected $dates = ['deleted_at'];

    public static $CUOTAS_ID = 1;
    public static $CONTADO_ID = 2;


    public $fillable = [
       'id','name'
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
