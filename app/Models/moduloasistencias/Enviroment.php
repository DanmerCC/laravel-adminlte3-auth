<?php

namespace App\Models\moduloasistencias;

use Illuminate\Database\Eloquent\Model;

class Enviroment extends Model
{
    protected $connection = 'asistencias';

    protected $dates = ['created_at','deleted_at'];

    public $fillable = [
        'nombre',
        'color'
    ];

    public static $rules = [
        'nombre' => 'required|unique:asistencias.enviroments,nombre',
        'color' => 'required|unique:asistencias.enviroments,color'
    ];

    public static function customRules(){
        return [
            'nombre' => 'required|unique:asistencias.enviroments,nombre',
            'color' => 'required|unique:asistencias.enviroments,color'
        ];
    }
}
