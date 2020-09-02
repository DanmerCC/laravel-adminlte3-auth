<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;

/**
 * Class Topic
 * @package App\Models
 * @version March 12, 2020, 8:51 am -05
 *
 * @property \App\Models\Course course
 * @property string name
 * @property integer course_id
 */
class Topic extends Model
{

    public $table = 'course_topics';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'course_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'course_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Course::class, 'course_id', 'id');
    }
}
