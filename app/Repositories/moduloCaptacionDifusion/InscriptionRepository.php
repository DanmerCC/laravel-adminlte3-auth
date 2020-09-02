<?php

namespace App\Repositories\moduloCaptacionDifusion;

use App\Models\moduloCaptacionDifusion\Inscription as AppInscription;
use App\Repositories\BaseAPIRepository;


/**
 * Class InscriptionRepository
 * @package App\Repositories\moduloCaptacionDifusion
 * @version February 18, 2020, 11:29 am -05
*/

class InscriptionRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_bell',
        'id_state'
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
        return AppInscription::class;
    }

    public function basicQuery(){
        return $this->model->newQuery();
    }

    public function addJoins($query){
        return $query;
    }


    public function inBells($array_ids){
        $this->addCallBackWhereIn('id_bell',function($query)use($array_ids){
            $query->whereIn('id_bell',$array_ids);
        });
    }

    public function inStates($array_ids){
        $this->addCallBackWhereIn('id_state',function($query)use($array_ids){
            $query->whereIn('id_state',$array_ids);
        });
    }

    public function withBells(){
        $this->addWith('bell');
    }


    public function getStates(){
        $query = $this->allQuery();
        $query->join('status','status.id','=','id_state');
        $query->select('status.*');
        $query->groupBy('id_state');
        return $query->get();
    }

    public function preloadWithRelation($relation){
        $this->addWith($relation);
    }

    public function orderAscId(){
        $this->setOrders(['id'=>'asc']);
    }

    public function orderDescId(){
        $this->setOrders(['id'=>'desc']);
    }

    public function orderByState(){
        $this->setOrders(['id_state'=>'desc']);
    }

}
