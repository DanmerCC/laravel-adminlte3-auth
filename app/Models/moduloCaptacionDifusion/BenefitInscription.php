<?php

namespace App\Models\moduloCaptacionDifusion;

use Illuminate\Database\Eloquent\Model;

class BenefitInscription extends Model
{
    public $table = 'benefit_inscriptions';

    protected $connection = 'inscripcionesv2';

    public $fillable = [
        'id_benefit',
        'id_inscription'

    ];

    protected $casts = [
        'id' => 'integer',
        'id_benefit' => 'integer',
        'id_inscription' => 'string'

    ];

    public static $rules = [

        'id_benefit' => 'required',
        'id_inscription' => 'required'
    ];

    public function benefit()
    {
        return $this->hasOne(Benefit::class, 'id', 'id_benefit');
    }
}
