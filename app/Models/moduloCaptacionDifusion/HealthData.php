<?php

namespace App\Models\moduloCaptacionDifusion;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HealthData
 * @package App\Models
 * @version February 18, 2020, 11:22 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection publicUsers
 * @property integer id_public_user
 * @property string chronible_deseases
 * @property string asthma
 * @property string arterial_hypertension
 * @property string diabetes
 * @property string cancer
 * @property string insurance_health
 * @property string insurance_name
 * @property string insurance_phone
 * @property string family_emergence
 * @property string family_phone
 * @property string famility_relationship
 * @property string disability
 */
class HealthData extends Model
{


    public $table = 'health_datas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_public_user',
        'chronible_deseases',
        'asthma',
        'arterial_hypertension',
        'diabetes',
        'cancer',
        'insurance_health',
        'insurance_name',
        'insurance_phone',
        'family_emergence',
        'family_phone',
        'famility_relationship',
        'disability'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_public_user' => 'integer',
        'chronible_deseases' => 'boolean',
        'asthma' => 'boolean',
        'arterial_hypertension' => 'boolean',
        'diabetes' => 'boolean',
        'cancer' => 'boolean',
        'other' => 'string',
        'insurance_health' => 'boolean',
        'insurance_name' => 'string',
        'insurance_phone' => 'string',
        'family_emergence' => 'string',
        'family_phone' => 'string',
        'famility_relationship' => 'string',
        'disability' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_public_user' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function publicUsers()
    {
        return $this->hasMany(\App\Models\public_users::class, 'id_public_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function isComplete(){

        if(($this->insurance_health && empty($this->insurance_name) && empty($this->insurance_phone))){
            return false;
        }

        if($this->chronible_deseases &&($this->chronible_deseases || $this->asthma || $this->arterial_hypertension || $this->diabetes || $this->cancer)){
            return false;
        }

        if(empty($this->family_emergence) || empty($this->insurance_phone) || empty($this->famility_relationship)){
            return false;
        }

        return true;
    }
}
