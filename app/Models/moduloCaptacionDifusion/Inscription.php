<?php

namespace App\Models\moduloCaptacionDifusion;

use App\Core\CaptacionDifusion\NotIsEmpty;
use App\InscriptionCampaign;
use App\Models\CampaignTab;
use App\Models\DetailBenefitRequirement;
use App\Models\DetailInscriptionFile;
use App\Repositories\moduloCaptacionDifusion\FileRequirementPdfRepository;
use App\Schedulable;
use Illuminate\Support\Facades\Auth;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

/**
 * Class Inscription
 *
 * @package App\Models
 * @version February 18, 2020, 11:29 am -05
 * @property \Illuminate\Database\Eloquent\Collection publicUsers
 * @property \Illuminate\Database\Eloquent\Collection bells
 * @property \Illuminate\Database\Eloquent\Collection statuses
 * @property \Illuminate\Database\Eloquent\Collection finances
 * @property integer id_public_user
 * @property integer id_bell
 * @property integer id_state
 * @property integer id_finance
 * @property int $id
 * @property int $id_public_user
 * @property int $id_bell
 * @property int $id_state
 * @property int $id_finance
 * @property int $id_finance_type
 * @property int $cache_count_req_total
 * @property int $cache_count_req_complete
 * @property \Illuminate\Support\Carbon $cache_updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\InscriptionCampaign $bell
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\moduloCaptacionDifusion\Benefit[] $benefits
 * @property-read int|null $benefits_count
 * @property-read \App\Models\moduloCaptacionDifusion\FinanceType $financeTypes
 * @property-read \App\Models\moduloCaptacionDifusion\Finance $finances
 * @property-read \App\Models\moduloCaptacionDifusion\Statu $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CampaignTab[] $tabs
 * @property-read int|null $tabs_count
 * @property-read \App\Models\moduloCaptacionDifusion\PublicUser $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereCacheCountReqComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereCacheCountReqTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereCacheUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereIdBell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereIdFinance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereIdFinanceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereIdPublicUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereIdState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\Inscription whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inscription extends Model
{
    protected $connection = 'inscripcionesv2';

    public static $PENDIENTE = 1;
    public static $SUCCESS = 3;
    public static $DESESTIMADO = 2;

    public $table = 'inscriptions';

    protected $appends = ['generate_ficha_url'];

    public $fillable = [
        'id_public_user',
        'id_bell',
        'id_state',//
        'id_finance',
        'id_finance_type',
        'cache_count_req_total',
        'cache_count_req_complete',
        'cache_updated_at',
        'interview_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_public_user' => 'integer',
        'id_bell' => 'integer',
        'id_state' => 'integer',
        'id_finance' => 'integer',
        'id_finance_type' => 'integer',
        'cache_count_req_total' => 'integer',
        'cache_count_req_total' => 'integer',
        'cache_updated_at' => 'datetime',
        'laboral_complete'=>'boolean',
        'personal_complete'=>'boolean',
        'academic_complete'=>'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_public_user' => 'required',
        'id_bell' => 'required',
        'id_state' => 'required',
        'id_finance' => 'required',
        'id_finance_type' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    public function user()
    {
        return $this->hasOne(\App\Models\moduloCaptacionDifusion\PublicUser::class, 'id', 'id_public_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    public function bell()
    {
        return $this->hasOne(InscriptionCampaign::class, 'id', 'id_bell');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function statuses()
    {
        return $this->hasOne(\App\Models\moduloCaptacionDifusion\Statu::class, 'id','id_state');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function finances()
    {
        return $this->hasOne(\App\Models\moduloCaptacionDifusion\Finance::class, 'id', 'id_finance');
    }

    public function financeTypes()
    {
        return $this->hasOne(\App\Models\moduloCaptacionDifusion\FinanceType::class,'id','id_finance_type' );
    }

    public function tabs()
    {
        return $this->belongsToMany(CampaignTab::class, 'config_tabs', 'id_bell', 'id_tab');
    }

    public function interviews()
    {
        return $this->belongsToMany(Schedulable::class, 'interviews', 'inscription_id', 'schedulable_id')->withPivot(['id']);
    }

    public static function getWithCapaigneAndStatusByCurrentUser(){

        return DB::table('inscriptions as i')
        ->join('bells as b','i.id_bell','=','b.id')
        ->join('public_users as p' ,'i.id_public_user','=','p.id')
        ->join('status as s','i.id_state','=','s.id')
        ->where('i.id_public_user','=',Auth::user()->id)

        ->select('b.id as id_bell','s.id as id_estate','s.name as estado','p.name','b.complet_name','b.image')
        ->get();


    }

    public static function getStates(){
        return [
            'PENDIENTE'=>self::$PENDIENTE,
            'SUCCESS'=>self::$SUCCESS,
            'DESESTIMADO'=>self::$DESESTIMADO
        ];
    }

    public static function datatable(){

        return \DB::table('posgrados')->join('inscripcionesv2.bells as bells_ins','bells_ins.id_postgraduate','=','posgrados.id');
    }

    public static function joinQueryBase(){

        $inscription_database = config("database.connections.inscripcionesv2.database");
        $inscripcion_prefix = config("database.connections.inscripcionesv2.prefix");
        $intranet_database = config("database.connections.mysql.database");
        $intranet_prefix = config("database.connections.mysql.prefix");

        return \DB::select("SELECT $inscription_database.{$inscripcion_prefix}inscriptions.* FROM $inscription_database.{$inscripcion_prefix}inscriptions
        JOIN  $inscription_database.{$inscripcion_prefix}bells ON $inscription_database.{$inscripcion_prefix}inscriptions.id_bell = $inscription_database.{$inscripcion_prefix}bells.id
        JOIN $intranet_database.{$intranet_prefix}posgrados ON $intranet_database.{$intranet_prefix}posgrados.id = $inscription_database.{$inscripcion_prefix}bells.id_postgraduate");

        return "SELECT $inscription_database.{$inscripcion_prefix}inscriptions.* FROM $inscription_database.{$inscripcion_prefix}inscriptions
        JOIN  $inscription_database.{$inscripcion_prefix}bells ON $inscription_database.{$inscripcion_prefix}inscriptions.id_bell = $inscription_database.{$inscripcion_prefix}bells.id
        JOIN $intranet_database.{$intranet_prefix}posgrados ON $intranet_database.{$intranet_prefix}posgrados.id = $inscription_database.{$inscripcion_prefix}bells.id_postgraduate";
    }

    public function tabIsLoaded(){
        return isset($this->relations['tabs']);
    }

    /**
     * Benefit
     *
     * @return Collection
     */
    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'benefit_inscriptions', 'id_inscription', 'id_benefit');
    }

    public function getGenerateFichaUrlAttribute(){
        return route('moduloacademico.inscriptions.ficha',['id'=>$this->id]);
    }

    public function filesRequireds()
    {
        return $this->belongsToMany(FileRequirementPdf::class, 'detail_bell_files', 'id_bell', 'id_file_requirement_pdf','id_bell')->wherePivot('state','=',true);
    }

    public function filesUploaded()
    {
        return $this->belongsToMany(FileRequirementPdf::class,'detail_inscription_files','id_inscription','id_file_requirement_pdf')->withPivot(['filename','id']);
    }

    public function observation()
    {
        return $this->hasOne(Observation::class, 'id_inscription', 'id');
    }

    public function observationHistory()
    {
        return $this->hasMany(Observation::class, 'id_inscription', 'id');
    }

    public function unionTotalRequireds(){

        $benefitInscriptionTable = (new BenefitInscription)->getTable();
        $requiredsFromBenefits = DetailBenefitRequirement::
            select('id_requirement')->join(
                $benefitInscriptionTable,$benefitInscriptionTable.'.id_benefit','=',$benefitInscriptionTable.'.id_benefit'
            )->where('state','=',true)
            ->where($benefitInscriptionTable.'.id_inscription','=',$this->id)
            ->get()
            ->pluck('id_requirement')->toArray();

        $requirementsFromCampaign=DetailBellFile::
            select('id_file_requirement_pdf')
            ->groupBy('id_file_requirement_pdf')
            ->where('id_bell','=',$this->id_bell)
            ->where('state','=',true)
            ->get()
            ->pluck('id_file_requirement_pdf')->toArray();

        $ids = array_values(array_unique(array_merge($requiredsFromBenefits,$requirementsFromCampaign)));

        $filesRequireds = FileRequirementPdf::whereIn('id',$ids)->get();

        return $filesRequireds;

    }

    public function hasUpload(FileRequirementPdf $requirement){
        $result = false;
        $this->filesUploaded->each(function($req)use($result,&$requirement){
            if($req->id == $requirement->id){
                $result = true;
            }
        });
        return $result;
    }

}
