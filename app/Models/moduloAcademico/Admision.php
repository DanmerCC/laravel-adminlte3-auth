<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admision
 * @package App\Models
 * @version August 11, 2019, 11:44 pm -05
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\Persona persona
 * @property integer persona_id
 * @property integer inscripcion_id
 */
class Admision extends Model
{
    use SoftDeletes;

    public $table = 'admisions';

    //protected $with = ['persona','actaAdmision'];

    protected $dates = ['deleted_at'];


    public $fillable = [
        'persona_id',
        'inscripcion_id',
        'posgrado_id',
        'acta_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'persona_id' => 'integer',
        'inscripcion_id' => 'integer',
        'posgrado_id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'inscripcion_id' => 'required|unique:admisions'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'persona_id', 'id');
    }

    public function actaAdmision()
    {
        return $this->belongsTo(ActaAdmision::class, 'acta_id', 'id');
    }
}
