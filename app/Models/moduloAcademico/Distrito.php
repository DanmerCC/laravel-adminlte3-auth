<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Distrito
 * @package App\Models
 * @version August 2, 2019, 5:40 pm -05
 *
 * @property \App\Models\Region regions
 * @property string nombre
 * @property integer regions_id
 */
class Distrito extends Model
{
    protected $connection = 'mysql';

    use SoftDeletes;

    public $table = 'distritos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'regions_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'regions_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'regions_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function regions()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Region::class, 'regions_id', 'id');
    }
}
