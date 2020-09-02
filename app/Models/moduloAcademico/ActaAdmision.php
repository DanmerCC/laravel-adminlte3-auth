<?php

namespace App\Models\moduloAcademico;

use App\Core\Document\Templates\ActaTemplate;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ActaAdmision
 * @package App\Models
 * @version September 19, 2019, 10:21 pm -05
 *
 * @property \App\Models\EstadoActaAdmision estado
 * @property integer estado_id
 * @property string filepath
 */
class ActaAdmision extends Model
{
    use SoftDeletes;

    public $table = 'acta_admisions';

    public static $FOLDER_FILE = 'actas';


    protected $dates = ['deleted_at'];

    protected $appends = ['url_file'];


    public $fillable = [
        'estado_id',
        'filepath',
        'upload'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado_id' => 'integer',
        'filepath' => 'string',
        'upload'=> 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estado_id' => 'required',
        'filepath' => 'required',
        'upload'=> 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(EstadoActaAdmision::class, 'estado_id', 'id');
    }


    public function getUrlFileAttribute(){

        $filename = explode("/",$this->filepath)[1];
        return route('files.acta',['filename'=>$filename]);
    }

}
