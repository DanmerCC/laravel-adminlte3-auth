<?php

namespace App\Models\moduloAcademico;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Programa
 * @package App\Models
 * @version June 27, 2019, 4:46 pm UTC
 *
 * @property \App\Models\TipoPrograma tipo
 * @property string nombre
 * @property integer tipo_id
 * @property integer ultimo
 * @property string abreviatura
 */
class Programa extends Model
{
    use SoftDeletes;

    public $table = 'programas';

    public $with = 'tipo';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'tipo_id',
        'ultimo',
        'abreviatura'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipo_id' => 'integer',
        'ultimo' => 'integer',
        'abreviatura' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
		'tipo_id' => 'required',
		'abreviatura' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\TipoPrograma::class, 'tipo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function posgrados()
    {
        return $this->hasMany(Posgrado::class, 'programa_id', 'id');
    }

    public function nextUltimo(){
        $this->ultimo++;
        $this->save();
    }



}
