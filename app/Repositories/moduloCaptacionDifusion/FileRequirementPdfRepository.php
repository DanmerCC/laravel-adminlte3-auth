<?php

namespace App\Repositories\moduloCaptacionDifusion;

use App\Models\moduloCaptacionDifusion\FileRequirementPdf;
use App\Repositories\BaseAPIRepository;

/**
 * Class FileRequirementPdfRepository
 * @package App\Repositories
 * @version February 18, 2020, 11:03 am -05
*/

class FileRequirementPdfRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return FileRequirementPdf::class;
    }
}
