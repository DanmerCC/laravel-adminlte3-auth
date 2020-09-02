<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MergePosgrado
 * @package App\Models
 * @version August 12, 2019, 1:46 pm -05
 *
 * @property \App\Models\Posgrado posgrado
 * @property integer posgrado_id
 * @property integer programa_ref_id
 */
class MergePosgrado extends Model
{
    use SoftDeletes;

    public $table = 'merge_posgrados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'posgrado_id',
        'programa_ref_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'posgrado_id' => 'integer',
        'programa_ref_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'programa_ref_id' => 'required|unique:merge_posgrados',
        'posgrado_id' => 'required|unique:merge_posgrados'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function posgrado()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Posgrado::class, 'posgrado_id', 'id');
    }
}
