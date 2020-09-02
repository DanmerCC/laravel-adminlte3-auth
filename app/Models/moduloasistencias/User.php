<?php

namespace App\Models\moduloasistencias;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $connection = 'asistencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nombres',
        'email',
        'password',
        'apellidos',
        'telefono',
        'dni',
        'email',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'name'=>'required|unique:asistencias.users',
        'nombres'=>'required',
        'email'=>'required|email|unique:asistencias.users',
        'password'=>'required',
        'apellidos'=>'required',
        'telefono'=>'required',
        'dni'=>'required|unique:asistencias.users'
    ];

    public function findForPassport($username) {
        return $this->where('name', $username)->first();
    }

    public static function customRules(){
        return [
            'name'=>'required|unique:asistencias.users',
            'nombres'=>'required',
            'email'=>'required|email|unique:asistencias.users',
            'password'=>'required',
            'apellidos'=>'required',
            'telefono'=>'required',
            'dni'=>'required|unique:asistencias.users'
        ];
    }

    public function sessions(){
        return $this->hasMany(\App\Models\moduloasistencias\Session::class,'user_id');
    }
}
