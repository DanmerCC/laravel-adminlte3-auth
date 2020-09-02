<?php

namespace App\Models;

use App\Models\moduloCaptacionDifusion\Inscription;
use Eloquent as Model;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tab
 * @package App\Models
 * @version March 18, 2020, 1:44 pm -05
 *
 * @property string name
 */
class CampaignTab extends Model
{

    public static $PERSONALES_ID=1;
    public static $LABORALES_ID=2;
    public static $ACADEMICOS_ID=3;
    public static $SALUD_ID=4;
    public static $DOCUMENTOS_ID=5;
    public static $FORMATOS_ID=6;
    public static $DESCUENTOS_ID=7;

    public $table = 'tabs';


    protected $dates = ['deleted_at'];

    protected $connection = 'inscripcionesv2';

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public static function getByBellsId($ids){

        $prefix  = config("database.connections.".(new self)->connection.".prefix");
        $table = (new self)->table;
        $baseQuery = self::select($table.'.*')
        ->from($table)
        ->join('config_tabs','id_tab','=',$table.'.id','left');

        if(is_array($ids)){
            $baseQuery->addSelect(\DB::raw("SUM(IF(".$prefix."config_tabs.id_bell IN (".join(',',$ids)."),1,0)) as state"));
        }

        if(is_numeric($ids)){
            $baseQuery->addSelect(\DB::raw("SUM(IF(".$prefix."config_tabs.id_bell IN (".$ids."),1,0)) as state"));
        }

        $baseQuery->groupBy($table.'.id');

        return $baseQuery->get();

    }


    public function isComplete(Inscription $inscription){

        if($this->id == self::$PERSONALES_ID){
            return $inscription->personal_complete;
        }

        if($this->id == self::$LABORALES_ID){
            return $inscription->laboral_complete;
        }

        if($this->id == self::$ACADEMICOS_ID){
            return $inscription->academic_complete;
        }

        if($this->id == self::$DOCUMENTOS_ID){

            $idsrequireds = $inscription->filesRequireds->pluck('id')->toArray();
            $idshave = $inscription->filesUploaded->pluck('id')->toArray();

            return count(array_diff($idsrequireds,$idshave))==0;

        }

        throw new Exception("No existe este id");

    }

}
