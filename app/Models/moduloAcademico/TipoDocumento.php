<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoDocumento
 * @package App\Models
 * @version August 1, 2019, 5:07 pm -05
 *
 * @property string nombre
 */
class TipoDocumento extends Model
{
    use SoftDeletes;

    public $table = 'tipo_documentos';


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
        'nombre' => 'required'
    ];


}
