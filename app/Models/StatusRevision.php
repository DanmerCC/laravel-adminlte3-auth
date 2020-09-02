<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StatusRevision
 * @package App\Models
 * @version September 21, 2019, 9:42 pm -05
 *
 * @property string nombre
 */
class StatusRevision extends Model
{
    use SoftDeletes;

    public $table = 'status_revisions';


    protected $dates = ['deleted_at'];

    const ACEPTADO = 1;
    const RECHAZADO = 2;

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

    ];


}
