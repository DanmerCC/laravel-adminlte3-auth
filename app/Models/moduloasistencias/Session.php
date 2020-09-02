<?php

namespace App\Models\moduloasistencias;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $connection = 'asistencias';

    protected $table='class_sessions';

    protected $dates = ['created_at','deleted_at'];

    protected $with = ['marks'];

    protected $casts = [
        'time_start' => 'date_format:d/m/Y H:i:s',
        'time_end' => 'date_format:d/m/Y H:i:s',
    ];

    public $fillable = [
        "nombre",
        "time_start",
        "time_end",
        "enviroment_id",
        "user_id"
    ];

    public static $rules = [
        'nombre' => 'required',
        "time_start"=> 'required',
        "time_end"=> 'required',
        "enviroment_id"=> 'required',
        "user_id"=> 'required'
    ];

    public function marks(){
        return $this->hasMany(\App\Models\moduloasistencias\Mark::class,'session_id');
    }

    public function user(){
        return $this->belongsTo(\App\Models\moduloasistencias\User::class,'user_id');
    }

    public function enviroment(){
        return $this->belongsTo(\App\Models\moduloasistencias\Enviroment::class,'enviroment_id');
    }

    public static function countByTypes($type=null,$id=null){

        $query = \DB::connection('asistencias')->table('class_sessions')->select('marks.type')
        ->addSelect(\DB::raw('COUNT(marks.id) AS cantidad'))
        ->join('marks','class_sessions.id','=','marks.session_id','left');
        if($id!=null){
            if(is_array($id)){
                $query->whereIn('class_sessions.id',$id);
            }else{
                $query->where('class_sessions.id',$id);
            }
        }

        $query->groupBy('class_sessions.id','marks.type');

        if($type!=null){
            $query->where('marks.type',$type);
        }else{
            $query->whereNotNull('marks.type');
        }

        if($type!=null){
            return $query->first();
        }else{
            return $query->get();
        }

    }


    /**
     * @var array types
     * @var array ids
     */
    public static function haveMarks($ids,$types){
        $query = \DB::connection('asistencias')->table('class_sessions')
        ->addSelect(\DB::raw('COUNT(class_sessions.id) AS cantidad'))
        ->join('marks','class_sessions.id','=','marks.session_id','left');
        if($ids!=null){
            if(is_array($ids)){
                $query->whereIn('class_sessions.id',$ids);
            }else{
                $query->where('class_sessions.id',$ids);
            }
        }
        $query->groupBy('class_sessions.id');
        if(count($types)>1){
            $query->where(function($query)use($types){
                for ($i=0; $i < count($types); $i++) {
                    if($i==0){
                        $query->where('marks.type',$types[$i]);
                    }else{
                        $query->orWhere('marks.type',$types[$i]);
                    }
                }
            });

        }

        if(count($types)==1){
            $query->where('marks.type',$types[0]);
        }


        return $query->get();
    }


    /**
     * @var array types
     */
    public static function queryWithCountByTypes($types,$onlyZeroHigh=true){

        $query=Session::select('class_sessions.*');

        for ($i=0; $i < count($types) ; $i++) {
            if($types[$i] != null){
                $partStringQuery="SUM(IF(marks.type ='$types[$i]',1,0)) AS cantidad_$types[$i]";
                $query->addSelect(\DB::raw($partStringQuery));
                if($onlyZeroHigh){
                    $query->HavingRaw("cantidad_".$types[$i]." > 0");
                }

            }else{
                $partStringQuery="SUM(IF(marks.type IS NULL,1,0)) AS cantidad_null";
                $query->addSelect(\DB::raw($partStringQuery));
                if($onlyZeroHigh){
                    $query->HavingRaw("cantidad_null > 0");
                }

            }


        }

        $query->join('marks','marks.session_id','=','class_sessions.id','left')
        ->groupBy('class_sessions.id');
        return $query;
    }
}
