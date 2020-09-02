<?php

namespace App\Repositories;

use App\Models\moduloCaptacionDifusion\Benefit;
use App\Repositories\BaseRepository;

/**
 * Class BenefitRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class BenefitRepository extends BaseRepository
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
        return Benefit::class;
    }
}
