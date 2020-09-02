<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Block
 * @package App\Models
 * @version March 11, 2020, 4:17 pm -05
 *
 * @property \App\Models\Posgrado posgrade
 * @property string name
 * @property integer posgrade_id
 */
class Block extends Model
{

    public $table = 'blocks';


    protected $dates = [];


    public $fillable = [
        'name',
        'posgrade_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'posgrade_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'posgrade_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function posgrade()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Posgrado::class, 'posgrade_id', 'id');
    }
}
