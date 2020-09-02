<?php

namespace App\Repositories;

use App\InscriptionCampaign;
use Carbon\Carbon;

/**
 * Class ComiteRepository
 * @package App\Repositories
 * @version September 21, 2019, 9:43 pm -05
*/

class InscriptionCampaignRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nombre',
        'id_postgraduate',
        'id_program_type',

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
     * return fiedls likeable with string
     *
     * @return void
     */
    public function getFieldsLikeable()
    {
        return [
            'complet_name'
        ];
    }


    /**
     * Return sortable fields
     *
     * @return array
     */
    public function getFieldsSortable(){
        return [];
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InscriptionCampaign::class;
    }


    public function oldFirst(){
        $this->setOrders([
            'id'=>'DESC'
        ]);
    }

    public function setFilterYear($year){
        $current = Carbon::createFromDate($year, 1, 1);
        $this->addBetweenQueryCallBack('created_at',function($query)use($year){
            $query->whereBetween('created_at',[Carbon::createFromDate($year, 1, 1)->firstOfYear(),Carbon::createFromDate($year, 1, 1)->endOfYear()]);
        });
    }

    public function withBell(){
        return $this->addWith('bell');
    }

    public  function setFilterByPosgraduate($value){
        $this->setGlobalFilterByColumn('id_postgraduate',$value);
    }

    public function search($text){
        $this->setFilterLike($text);
    }
}
