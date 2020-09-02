<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;

/**
 * Class Benefit
 * @package App\Models
 * @version February 18, 2020, 10:57 am -05
 *
 * @property string name
 */
class Benefit extends Model
{


    public $table = 'benefits';
    protected $primaryKey = 'id';

    protected $connection = 'inscripcionesv2';
    //protected $dates = ['deleted_at'];



    public $fillable = [
        'name','description','percentaje'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'percentaje' => 'float'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'percentaje' => 'required'

    ];

    public function requeriments(){
        return $this->belongsToMany(FileRequirementPdf::class,'detail_benefit_requirements','id_benefit','id_requirement')->withPivot(['id','state']);
    }

    public function requireds(){
        return $this->requeriments()->where('detail_benefit_requirements.state','=',true);
    }


}
