<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailInscriptionFile
 *
 * @package App\Models
 * @version February 18, 2020, 11:30 am -05
 * @property \Illuminate\Database\Eloquent\Collection fileRequirementPdfs
 * @property \Illuminate\Database\Eloquent\Collection inscriptions
 * @property integer id_file_requirement_pdf
 * @property integer id_inscription
 * @property int $id
 * @property int $id_file_requirement_pdf
 * @property int $id_inscription
 * @property string $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\moduloCaptacionDifusion\FileRequirementPdf $fileRequirementPdf
 * @property-read \App\InscriptionCampaign $inscriptions
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile whereIdFileRequirementPdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile whereIdInscription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DetailInscriptionFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DetailInscriptionFile extends Model
{

    protected $connection = 'inscripcionesv2';

    public $table = 'detail_inscription_files';

    public $fillable = [
        'id_file_requirement_pdf',
        'id_inscription',
        'filename'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_file_requirement_pdf' => 'integer',
        'id_inscription' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fileRequirementPdf()
    {
        return $this->hasOne(\App\Models\moduloCaptacionDifusion\FileRequirementPdf::class,'id','id_file_requirement_pdf');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inscriptions()
    {
        return $this->hasOne(\App\InscriptionCampaign::class, 'id', 'id_inscription');
    }
}
