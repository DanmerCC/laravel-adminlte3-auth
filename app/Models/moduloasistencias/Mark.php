<?php

namespace App\Models\moduloasistencias;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{

    const INGRESO = 'init';
    const SALIDA = 'end';

    protected $connection = 'asistencias';

    protected $dates = ['created_at','deleted_at'];

    public $fillable = [
        "session_id",
        "hostname",
        "user_id",
        "fecha",
        "type"
    ];

    public static $rules = [
        "session_id"=> 'required',
        "user_id"=> 'required',
        "hostname"=>'required'
    ];

    public function user(){
        return $this->belongsTo(\App\Models\moduloasistencias\User::class,'user_id');
    }

    public static function countTypesBySessionIds($id=null){
        $query = self::select('marks.type')
        ->addSelect(\DB::raw('COUNT(marks.id) AS cantidad'))
        ->join('class_sessions','class_sessions.id','=','marks.session_id');
        if($id!=null){
            if(is_array($id)){
                $query->whereIn('class_sessions.id',$id);
            }else{
                $query->where('class_sessions.id',$id);
            }
        }
        $query->groupBy('class_sessions.id','marks.type');

        return $query->get();
    }
}
