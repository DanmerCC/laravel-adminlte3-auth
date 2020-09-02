<?php

namespace App\Repositories;

use App\Models\moduloCaptacionDifusion\BellBenefitRequirement;
use App\Repositories\BaseRepository;

/**
 * Class BellBenefitRequirementRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class BellBenefitRequirementRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_benefit',
        'id_bell',
        'state'
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
        return BellBenefitRequirement::class;
    }

    public function whereInBenefits($array){
        $this->addCallBackWhereIn('id_benefit',function($query)use($array){
            $query->whereIn('id_benefit',$array);
        });
    }
}
