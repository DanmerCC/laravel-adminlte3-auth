<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BellBenefitRequirement
 * @package App\Models
 * @version February 18, 2020, 11:27 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection benefits
 * @property \Illuminate\Database\Eloquent\Collection bells
 * @property integer id_benefit
 * @property integer id_bell
 */
class BellBenefitRequirement extends Model
{

    protected $connection = 'inscripcionesv2';

    public $table = 'bell_benefit_requirements';

    public $fillable = [
        'id_benefit',
        'id_bell',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_benefit' => 'integer',
        'id_bell' => 'integer',
        'state'=>'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_benefit' => 'required',
        'id_bell' => 'required',
        'state'=>'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function benefit()
    {
        return $this->hasOne(Benefit::class, 'id', 'id_benefit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bells()
    {
        return $this->hasMany(\App\InscriptionCampaign::class, 'id_bell', 'id');
    }
}
