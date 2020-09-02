<?php
namespace App\Models\moduloCaptacionDifusion;

use App\Models\moduloAcademico\Direccion;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\moduloAcademico\DireccionUsuario;

use Illuminate\Support\Facades\Storage;

/**
 * Class PublicUser
 *
 * @package App\Models
 * @version February 18, 2020, 11:17 am -05
 * @property \Illuminate\Database\Eloquent\Collection documentTypes
 * @property string profession_grade
 * @property string first_name
 * @property string last_name
 * @property string name
 * @property integer id_document_type
 * @property string document_number
 * @property string civil_state
 * @property string nationality
 * @property string gender
 * @property string birth_date
 * @property string is_military
 * @property string home_phone
 * @property string mobile
 * @property string email_contact
 * @property string home_adress
 * @property string caen_course
 * @property string indicate1
 * @property string mastersdegree_course
 * @property string indicate2
 * @property int $id
 * @property string|null $profession_grade
 * @property string $first_name
 * @property string $last_name
 * @property string $name
 * @property int $id_document_type
 * @property string $document_number
 * @property string|null $civil_state
 * @property string|null $id_direccion
 * @property string|null $id_birth_direccion
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property string|null $is_military
 * @property string|null $home_phone
 * @property string $mobile
 * @property string|null $email_contact
 * @property string|null $home_adress
 * @property string|null $caen_course
 * @property string|null $indicate1
 * @property string|null $mastersdegree_course
 * @property string|null $indicate2
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\moduloAcademico\Direccion $directionBirth
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\AcademicGrade[] $grades
 * @property-read int|null $grades_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\Inscription[] $inscriptions
 * @property-read int|null $inscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\Requirement[] $requirements
 * @property-read int|null $requirements_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\AcademicGrade[] $titles
 * @property-read int|null $titles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\WorkExperience[] $work
 * @property-read int|null $work_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\WorkExperience[] $workExperiences
 * @property-read int|null $work_experiences_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereCaenCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereCivilState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereEmailContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereHomeAdress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereHomePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereIdBirthDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereIdDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereIdDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereIndicate1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereIndicate2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereIsMilitary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereMastersdegreeCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereProfessionGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\PublicUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PublicUser extends Authenticatable
{

    public $table = 'public_users';

    protected $connection = 'inscripcionesv2';

    public $fillable = [
        'profession_grade',
        'first_name',
        'last_name',
        'name',
        'id_document_type',
        'document_number',
        'civil_state',
        'id_direccion',
        'id_country',
        'id_birth_direccion',
        'gender',
        'birth_date',
        'is_military',
        'home_phone',
        'mobile',
        'email_contact',
        'caen_course',
        'indicate1',
        'mastersdegree_course',
        'indicate2',
        'password',
        'type_financing',
        'student_id',
        'photo'
    ];


    protected $hidden= ['password'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'profession_grade' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'name' => 'string',
        'id_document_type' => 'integer',
        'document_number' => 'string',
        'civil_state' => 'string',
        'id_direccion' => 'string',
        'id_country' => 'string',
        'id_birth_direccion' => 'string',
        'gender' => 'string',
        'birth_date' => 'datetime',
        'is_military' => 'string',
        'home_phone' => 'string',
        'mobile' => 'string',
        'email_contact' => 'string',
        'caen_course' => 'boolean',
        'indicate1' => 'string',
        'mastersdegree_course' => 'boolean',
        'indicate2' => 'string',
        'password' => 'string',
        'type_financing' => 'integer',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'first_name' => 'required',
        'last_name' => 'required',
        'name' => 'required',
        'id_document_type' => 'required',
        'document_number' => 'required|unique:public_users',
        'mobile' => 'required',
        'password' => 'required'


    ];

    // public function directionBirth(){
    //     return $this->hasOne(Direccion::class,'id','id_birth_direccion');
    // }

    public function directionBirth(){
        return $this->hasOne(DireccionUsuario::class,'id','id_direccion');
        // id_direccion en la tabla guarda la direccion de nacimiento
    }

    // public function direccion(){
    //     return $this->hasOne(Direccion::class,'id','id_direccion');
    // }

    public function direccion(){
        return $this->hasOne(DireccionUsuario::class,'id','id_birth_direccion');
        // id_birth_direccion en la tabla guara la direccion con el domocilio y el interior
    }

    public function inscriptions()
    {
        return $this->hasMany(\App\Models\moduloCaptacionDifusion\Inscription::class, 'id_bell', 'id');
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class, 'id_public_user', 'id');
    }

    public function work()
    {
        return $this->hasMany(WorkExperience::class, 'id_public_user', 'id')->where('end_date','=',NULL);
    }


    public function grades(){
        return $this->belongsToMany(AcademicGrade::class,'academic_datas', 'id_public_user', 'id_academic_grade')
        ->wherePivot('id_academic_grade','!=',NULL)->withPivot(['university','year']);
    }

    public function titles(){
        return $this->belongsToMany(AcademicTitle::class,'academic_datas', 'id_public_user', 'id_academic_title')
        ->wherePivot('id_academic_title','!=',NULL)->withPivot(['university','year']);
    }

    public function titulos(){
        return $this->belongsToMany(AcademicTitle::class, 'academic_datas', 'id_public_user', 'id_academic_title');
    }


    /**
     * requiremts that the user has met (only completes)
     *
     * @return Collection
     */
    public function requirements()
    {
        return $this->belongsToMany(FileRequirementPdf::class, 'request_requirements', 'id_public_user', 'id_requirement')->withPivot(['id']);
    }

    public function typefinancing()
    {
        return $this->belongsTo(FinanceType::class, 'type_financing', 'id');
    }

    public function healthdata()
    {
        return $this->hasOne(HealthData::class, 'id_public_user', 'id');
    }

}
