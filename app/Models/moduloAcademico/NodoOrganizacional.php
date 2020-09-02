<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NodoOrganizacional
 * @package App\Models
 * @version July 22, 2019, 9:25 am -05
 *
 * @property \App\Models\TipoNodoOrganizacional tipo
 * @property integer parent_id
 * @property string nombre
 * @property integer tipo_id
 */
class NodoOrganizacional extends Model
{
    use SoftDeletes;

    public $table = 'nodo_organizacionals';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'parent_id',
        'nombre',
        'tipo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'nombre' => 'string',
        'tipo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'tipo_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\TipoNodoOrganizacional::class, 'tipo_id', 'id');
    }
}
