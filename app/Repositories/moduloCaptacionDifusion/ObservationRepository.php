<?php

namespace App\Repositories\moduloCaptacionDifusion;

use App\Models\moduloCaptacionDifusion\Observation;
use App\Repositories\BaseAPIRepository;
use App\Repositories\BaseRepository;

/**
 * Class ObservationRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class ObservationRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_inscription'
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
        return Observation::class;
    }
}
