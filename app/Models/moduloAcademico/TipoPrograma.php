<?php

namespace App\Models\moduloAcademico;

use App\Core\Duration;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoPrograma
 * @package App\Models
 * @version June 27, 2019, 4:39 pm UTC
 *
 * @property string nombre
 * @property string titulo
 */
class TipoPrograma extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';

    public static $DOCTORADO_ID = 1;
    public static $MAESTRIA_ID = 2;
    public static $DIPLOMADO_ID = 3;
    public static $CURSO_ID = 3;
    public static $CURSO_ESPECIAL_ID = 4;

    public $table = 'tipo_programas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'titulo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'titulo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        //'titulo' => 'required',
    ];


    /**
     * getDuration function
     *
     * @param int $idType
     * @return Duration
     */
    public static function getDuration($idType){

        if(self::$DOCTORADO_ID == $idType){
            return new Duration(0,0,0,24,0);
        }

        if(self::$DIPLOMADO_ID == $idType){
            return new Duration(0,0,0,24,0);
        }

        if(self::$CURSO_ID == $idType){
            return new Duration(0,0,0,24,0);
        }

        if(self::$CURSO_ESPECIAL_ID == $idType){
            return new Duration(0,0,0,24,0);
        }
    }
}
