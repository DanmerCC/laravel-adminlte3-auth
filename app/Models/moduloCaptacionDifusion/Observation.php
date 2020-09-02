<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Observation
 * @package App\Models
 * @version February 18, 2020, 11:30 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection inscriptions
 * @property integer id_inscription
 * @property string description
 */
class Observation extends Model
{

    protected $connection = 'inscripcionesv2';

    public $table = 'observations';

    public $fillable = [
        'id_inscription',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_inscription' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'id_inscription', 'id');
    }
}
