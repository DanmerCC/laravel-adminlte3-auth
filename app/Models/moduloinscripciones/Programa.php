<?php

namespace App\Models\moduloinscripciones;

use Eloquent as Model;

/**
 * Class Programa
 * @package App\Models
 * @version September 21, 2019, 9:43 pm -05
 *
 * @property string nombre
 */
class Programa extends Model
{

    protected $connection = 'inscripciones';

    public $table = 'curso';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre'=>'required'
    ];

    public static function listWithInscripcions(){
        $query = self::select('curso.*')
        ->addSelect(\DB::raw('COUNT(inscripcion.id_inscripcion) as inscritos_count'))
        ->addSelect(\DB::raw('CONCAT(curso.numeracion," ",tipo_curso.nombre," ",curso.nombre) as fullname'))
        ->join('solicitud','solicitud.programa','=','curso.id_curso')
        ->join('inscripcion','inscripcion.solicitud_id','=','solicitud.idSolicitud')
        ->join('tipo_curso','tipo_curso.idTipo_curso','=','curso.idTipo_curso')
        ->groupBy('curso.id_curso');

        return $query->get();
    }


}
