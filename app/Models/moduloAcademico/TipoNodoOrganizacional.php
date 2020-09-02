<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoNodoOrganizacional
 * @package App\Models
 * @version July 22, 2019, 9:18 am -05
 *
 * @property string nombre
 */
class TipoNodoOrganizacional extends Model
{
    use SoftDeletes;

    public $table = 'tipo_nodo_organizacionals';


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
        'nombre' => 'required',
    ];


}
