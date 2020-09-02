<?php

namespace App\Repositories\moduloCaptacionDifusion;

use App\Models\moduloCaptacionDifusion\RequestRequirement;
use App\Repositories\BaseRepository;

/**
 * Class RequestRequirementRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class RequestRequirementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = ['id','id_public_user','id_requirement'];

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
     * Return sortable fields
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
        return RequestRequirement::class;
    }
}
