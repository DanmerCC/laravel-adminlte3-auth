<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AcademicData
 * @package App\Models
 * @version February 18, 2020, 11:18 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection publicUsers
 * @property \Illuminate\Database\Eloquent\Collection academicGrades
 * @property \Illuminate\Database\Eloquent\Collection academicTitles
 * @property integer id_public_user
 * @property integer id_academic_grade
 * @property integer id_academic_title
 */
class AcademicData extends Model
{


    public $table = 'academic_datas';

    protected $connection = 'inscripcionesv2';


    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';


    public $fillable = [
        'id_public_user',
        'id_academic_grade',
        'id_academic_title',
        'university',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_public_user' => 'integer',
        'id_academic_grade' => 'integer',
        'id_academic_title' => 'integer',
        'university' => 'string',
        'year' => 'string'
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
    public function publicUsers()
    {
        return $this->hasMany(\App\Models\PublicUser::class, 'id_public_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function academicGrades()
    {
        return $this->hasMany(AcademicGrade::class, 'id_academic_grade', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function academicTitles()
    {
        return $this->hasMany(\App\Models\AcademicTitle::class, 'id_academic_title', 'id');
    }
}
