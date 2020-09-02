<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;

/**
 * Class Course
 * @package App\Models
 * @version March 11, 2020, 4:43 pm -05
 *
 * @property \App\Models\Block block
 * @property string name
 * @property integer block_id
 */
class Course extends Model
{

    public $table = 'courses';


    protected $dates = [];


    public $fillable = [
        'name',
        'block_id',
        'hours',
        'credits',
        'required_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'block_id' => 'integer',
        'credits'=>'integer',
        'required_id'=>'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'block_id' => 'required',
        'credits'=>'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function block()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Block::class, 'block_id', 'id');
    }
}
