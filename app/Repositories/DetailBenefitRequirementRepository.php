<?php

namespace App\Repositories;

use App\Models\DetailBenefitRequirement;
use App\Repositories\BaseRepository;

/**
 * Class DetailBenefitRequirementRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class DetailBenefitRequirementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSortable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailBenefitRequirement::class;
    }
}
