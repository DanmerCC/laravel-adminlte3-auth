<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WorkReference
 *
 * @package App\Models
 * @version February 18, 2020, 11:21 am -05
 * @property \Illuminate\Database\Eloquent\Collection workExperiences
 * @property string name
 * @property integer id_work_experience
 * @property int $id
 * @property string|null $phone
 * @property string|null $annexed
 * @property string|null $name
 * @property int $id_work_experience
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\WorkExperience[] $workExperiences
 * @property-read int|null $work_experiences_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference whereAnnexed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference whereIdWorkExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\WorkReference whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WorkReference extends Model
{

    public $table = 'work_references';

    protected $connection = 'inscripcionesv2';

    public $fillable = [
        'phone',
        'annexed',
        'name',
        'id_work_experience'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phone' => 'string',
        'annexed' => 'string',
        'name' => 'string',
        'id_work_experience' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function workExperiences()
    {
        return $this->hasMany(\App\Models\moduloCaptacionDifusion\WorkExperience::class, 'id_work_experience', 'id');
    }
}
