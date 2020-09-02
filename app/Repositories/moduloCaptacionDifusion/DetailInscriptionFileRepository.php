<?php

namespace App\Repositories\moduloCaptacionDifusion;

use App\Models\DetailInscriptionFile;
use App\Repositories\BaseAPIRepository;

/**
 * Class DetailInscriptionFileRepository
 * @package App\Repositories\moduloCaptacionDifusion
 * @version February 24, 2020, 3:21 am UTC
*/

class DetailInscriptionFileRepository extends BaseAPIRepository
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
        return DetailInscriptionFile::class;
    }
}
