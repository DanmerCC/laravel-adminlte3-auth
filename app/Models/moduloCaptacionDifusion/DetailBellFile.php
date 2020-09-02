<?php

namespace App\Models\moduloCaptacionDifusion;

use App\InscriptionCampaign;
use Eloquent as Model;

/**
 * Class DetailBellFile
 * @package App\Models
 * @version February 18, 2020, 11:29 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection bells
 * @property \Illuminate\Database\Eloquent\Collection fileRequirementPdfs
 * @property integer id_bell
 * @property integer id_file_requirement_pdf
 */
class DetailBellFile extends Model
{


    public $table = 'detail_bell_files';

    protected $connection = 'inscripcionesv2';

    public $fillable = [
        'id_bell',
        'id_file_requirement_pdf',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_bell' => 'integer',
        'id_file_requirement_pdf' => 'integer',
        'state'=>'boolean'
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
    public function bells()
    {
        return $this->hasMany(InscriptionCampaign::class, 'id_bell', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fileRequirementPdfs()
    {
        return $this->hasMany(FileRequirementPdf::class, 'id_file_requirement_pdf', 'id');
    }
}
