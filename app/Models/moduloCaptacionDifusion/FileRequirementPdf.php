<?php

namespace App\Models\moduloCaptacionDifusion;

use App\InscriptionCampaign;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FileRequirementPdf
 *
 * @package App\Models
 * @version February 18, 2020, 11:03 am -05
 * @property string name
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\InscriptionCampaign[] $bells
 * @property-read int|null $bells_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FileRequirementPdf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FileRequirementPdf newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FileRequirementPdf query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FileRequirementPdf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FileRequirementPdf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FileRequirementPdf whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\moduloCaptacionDifusion\FileRequirementPdf whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FileRequirementPdf extends Model
{

    protected $connection = 'inscripcionesv2';

    public $table = 'file_requirement_pdfs';

    public static $PATH = 'requirements';

    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function bells(){
        return $this->belongsToMany(InscriptionCampaign::class,'detail_bell_files','id_file_requirement_pdf','id_bell');

    }

}
