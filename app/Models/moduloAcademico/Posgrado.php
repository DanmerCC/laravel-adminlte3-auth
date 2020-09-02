<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Posgrado
 * @package App\Models
 * @version June 28, 2019, 4:24 pm UTC
 *
 * @property \App\Models\Programa programa
 * @property integer programa_id
 * @property string fecha_limite
 * @property string abreviatura
 * @property integer vacantes
 * @property integer numero_orden
 * @property float monto_total
 * @property string fecha_inicio
 * @property string fecha_final
 */
class Posgrado extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';

    public $table = 'posgrados';

    public $with = ['programa'];


    protected $dates = ['deleted_at'];


    public $fillable = [
        'programa_id',
        'fecha_limite',
        'abreviatura',
        'numero_orden',
        'fecha_inicio',
        'fecha_final',
        'tipo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'programa_id' => 'integer',
        'fecha_limite' => 'date',
        'abreviatura' => 'string',
        'numero_orden' => 'integer',
        'fecha_inicio' => 'date',
        'fecha_final' => 'date',
        'tipo_id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'programa_id' => 'required',
        'fecha_limite' => 'required',
        'abreviatura' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function programa()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Programa::class, 'programa_id', 'id');
    }
    public function tipo()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\TipoPrograma::class, 'tipo_id', 'id');
    }

    public function blocks()
    {
        return $this->hasMany(Block::class, 'posgrade_id', 'id');
    }

    /**
     * fullname
     *
     * @return void
     */
    public function fullname(){
        $result=\DB::table('posgrados')
        ->leftJoin('programas','posgrados.programa_id', '=', 'programas.id')
        ->leftJoin('tipo_programas','programas.tipo_id', '=', 'tipo_programas.id')
        ->select(\DB::raw("CONCAT(posgrados.numero_orden,' ',tipo_programas.nombre,' ',programas.nombre) as fullname"),'posgrados.id')
        ->where('posgrados.id',$this->id)
        ->get()->first();
        return $result;
    }
    public static function select(){
        $result=\DB::table('posgrados')
        ->leftJoin('programas','posgrados.programa_id', '=', 'programas.id')
        ->leftJoin('tipo_programas','programas.tipo_id', '=', 'tipo_programas.id')
        ->select(\DB::raw("CONCAT(posgrados.numero_orden,' ',tipo_programas.nombre,' ',programas.nombre) as fullname"),'posgrados.id')
        ->get();
        return $result;
    }

    public function posgradoSearch(Request $request){
        $textSearch = $request->get('search');
        $searched = Posgrado::select('posgrado.*')
        ->addSelect(\DB::raw('posgrado.o'))
        ->where('full_name','like',$textSearch.'%')
        ->join('tipo_programas','tipo_programas.id','=','programas.tipo_id')
        ->join('programas','programas.id','=','posgrado.programa_id');
    }

    private static function newQueryWithTypesAndPrograms(){
        return self::query()->select('posgrados.*')
        ->addSelect(\DB::raw('CONCAT(posgrados.numero_orden," ",tipo_programas.nombre," ",programas.nombre) as full_name'))
        ->join('programas','programas.id','=','posgrados.programa_id')
        ->join('tipo_programas','tipo_programas.id','=','programas.tipo_id');
    }

    public static function querySearch($search){
        $queryBase = self::newQueryWithTypesAndPrograms();
        return $queryBase->where(
            function($query)use(&$search){
                $query->where(\DB::raw('CONCAT(tipo_programas.nombre," ",programas.nombre)'),'like',$search.'%');
                $query->orWhere(\DB::raw('programas.nombre'),'like',$search.'%');
            }
        );
    }


    public static function search($text){
        return self::querySearch($text)->get();
    }

    public static function searchWithTypeOrProgram($text,$type_id=null,$program_id=null){

        if($text=="" || $text=="*"){

            $query = self::query();

        }else{

            $query = self::querySearch($text);

        }


        if($program_id!=null){
            $query->where('posgrados.programa_id',$program_id);
        }

        if($type_id!=null){
            $query->where('posgrados.tipo_id',$type_id);
        }
        return $query->get();
    }

    public function getFullNameAttribute(){

        if ($this->relationLoaded('programa')){
            $this->load('programa');
        }

        if ($this->relationLoaded('tipo')){
            $this->load('tipo');
        }

        return $this->romanize($this->numero_orden).' '.$this->tipo->nombre.' '.$this->programa->nombre;
    }

    private function romanize($number){

        $lookup = [
            1000 => 'M',
            900  => 'CM',
            500  => 'D',
            400  => 'CD',
            100  => 'C',
            90   => 'XC',
            50   => 'L',
            40   => 'XL',
            10   => 'X',
            9    => 'IX',
            5    => 'V',
            4    => 'IV',
            1    => 'I'
        ];

        $solution = '';

        foreach ($lookup as $limit => $glyph)
        {
            while ($number >= $limit)
            {
                $solution .= $glyph;
                $number -= $limit;
            }
        }

        return $solution;
    }

    /**
     * calculateFinalFromStartDate function
     *
     * @param Carbon $fecha_inicio
     * @param int $idTipoPrograma
     * @return Carbon
     */
    public function autocalculateFechaFinal(){

        return $this->getDefaultFechaFinal();
    }

    /**
     * getDefaultFechaFinal function
     *
     * @return Carbon
     */
    public function getDefaultFechaFinal(){

        $duration = TipoPrograma::getDuration($this->tipo_id);

        return $duration->sum($this->fecha_inicio);
    }
}
