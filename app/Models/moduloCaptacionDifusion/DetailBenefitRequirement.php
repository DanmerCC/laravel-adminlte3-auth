<?php

namespace App\Models;

use App\Models\moduloCaptacionDifusion\Benefit;
use App\Models\moduloCaptacionDifusion\Requirement;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailBenefitRequirement
 *
 * @package App\Models
 * @version February 18, 2020, 11:23 am -05
 * @property \Illuminate\Database\Eloquent\Collection requirements
 * @property \Illuminate\Database\Eloquent\Collection benefits
 * @property integer id_requirement
 * @property integer id_benefit
 * @property int $id
 * @property int $id_requirement
 * @property int $id_benefit
 * @property bool|null $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\Benefit[] $benefits
 * @property-read int|null $benefits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\Requirement[] $requirements
 * @property-read int|null $requirements_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement whereIdBenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement whereIdRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailBenefitRequirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DetailBenefitRequirement extends Model
{


    public $table = 'detail_benefit_requirements';

    protected $connection = 'inscripcionesv2';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_requirement',
        'id_benefit',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_requirement' => 'integer',
        'id_benefit' => 'integer',
        'state'=>'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_requirement' => 'required',
        'id_benefit' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function requirements()
    {
        return $this->hasMany(Requirement::class, 'id_requirement', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function benefits()
    {
        return $this->hasMany(Benefit::class, 'id_benefit', 'id');
    }
}
