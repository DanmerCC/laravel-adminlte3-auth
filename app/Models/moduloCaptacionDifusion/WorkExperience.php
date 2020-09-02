<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WorkExperience
 * @package App\Models
 * @version February 18, 2020, 11:20 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection publicUsers
 * @property \Illuminate\Database\Eloquent\Collection institutions
 * @property \Illuminate\Database\Eloquent\Collection laborPositions
 * @property integer id_public_user
 * @property integer id_institution
 * @property string start_date
 * @property string end_date
 * @property string area
 * @property integer id_labor_position
 */
class WorkExperience extends Model
{


    public $table = 'work_experiences';

    protected $connection = 'inscripcionesv2';



    public $fillable = [
        'id_public_user',
        'id_institution',
        'id_direccions',
        'id_contract_type',
        'start_date',
        'end_date',
        'area',
        'id_labor_position'
    ];

    protected $appends = ['duration'];

    protected $dates = [
        'start_date',  'end_date'
    ];
    protected $dateFormat = 'Y-m-d';
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_public_user' => 'integer',
        'id_institution' => 'integer',
        'id_direccions' => 'integer',
        'id_contract_type' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'area' => 'string',
        'id_labor_position' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    public function publicUsers()
    {
        return $this->belongsTo(\App\Models\PublicUser::class, 'id_public_user', 'id');
    }
    public function institution()
    {
        return $this->belongsTo(Institution::class, 'id_institution', 'id');
    }
    public function direccion(){
        return $this->belongsTo(\App\Models\moduloAcademico\DireccionUsuario::class, 'id_direccions', 'id');
    }
    public function laborPosition()
    {
        return $this->belongsTo(LaborPosition::class, 'id_labor_position', 'id');
    }

    public static function getInstitutionsAndLabor()
    {
        //en el with mandas a llamar la relacion
        return  WorkExperience::select('id','start_date','end_date','id_institution','id_labor_position')
        ->with(['institution:id,name as entity','laborPosition:id,name'])
        ->where('id_public_user', \Auth()->id())->get();
    }

    public static function baseQueryCurrentUser()
    {
        return self::where('id_public_user', \Auth::user()->id);
    }

    public static function hasExperence()
    {
        return self::baseQueryCurrentUser()->get()->count() > 0;
    }

    public function getDurationAttribute()
    {
        return "{$this->end_date->diffInMonths($this->start_date)} MESES";
    }

    public function references()
    {
        return $this->hasMany(WorkReference::class, 'id_work_experience', 'id');
    }

}
