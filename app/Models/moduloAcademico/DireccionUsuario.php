<?php

namespace App\Models\moduloAcademico;

use Illuminate\Database\Eloquent\Model;

class DireccionUsuario extends Model
{

    protected $connection = 'inscripcionesv2';

    public $table = 'direccions';

    public $fillable = [
        'id_country',
        'id_departament',
        'id_region',
        'id_district',
        'name',
        'interior'
    ];

    protected $casts = [
        'id' => 'integer',
        'id_country' => 'integer',
        'id_departament' => 'integer',
        'id_region' => 'integer',
        'id_district' => 'integer',
        'name' => 'string',
        'interior' => 'string'
    ];

    public function pais(){
        return $this->belongsTo(\App\Models\moduloAcademico\Pais::class, 'id_country', 'id');
    }

    public function departamento()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Departamento::class, 'id_departament', 'id');
    }

    public function regions()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Region::class, 'id_region', 'id');
    }

    public function distrito()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Distrito::class, 'id_district', 'id');
    }

}
