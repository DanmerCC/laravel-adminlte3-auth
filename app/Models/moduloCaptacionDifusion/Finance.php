<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Finance
 *
 * @package App\Models
 * @version February 18, 2020, 11:04 am -05
 * @property string name
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Finance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Finance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Finance query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Finance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Finance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Finance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Finance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Finance extends Model
{

    protected $connection = 'inscripcionesv2';

    public $table = 'finances';

    public static $NOT_REVIEW = 1;
    public static $VALIDATED = 2;
    public static $OBSERBED = 3;
    public static $BOT_OBSERVATED =4;

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


    public function defautlState(){
        return self::$NOT_REVIEW;
    }

    public function getStates(){
        return [
            "NOT_REVIEW"=>self::$NOT_REVIEW,
            "VALIDATED"=>self::$VALIDATED,
            "OBSERBED"=>self::$OBSERBED,
            "BOT_OBSERVATED"=>self::$BOT_OBSERVATED,
        ];
    }

}
