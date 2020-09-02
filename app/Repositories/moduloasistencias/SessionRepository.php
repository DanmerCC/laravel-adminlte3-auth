<?php

namespace App\Repositories\moduloasistencias;

use App\Models\moduloasistencias\Session;
use App\Repositories\BaseAPIRepository;

class SessionRepository extends BaseAPIRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'time_start',
        'time_end',
        'enviroment_id',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Session::class;
    }

    public function setFilterUser($user_id){
        $this->addCallBack('user_id',function($query)use(&$user_id){
            $query->where('user_id',$user_id);
        });
    }

    public function setRangeDates($start,$end){
        $this->addBetweenQueryCallBack('time_start',function($query)use($start,$end){
            $query->whereBetween('time_start',[$start,$end]);
        });
    }
}
