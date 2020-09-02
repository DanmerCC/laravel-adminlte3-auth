<?php

namespace App\Repositories\moduloasistencias;

use App\Models\moduloasistencias\Mark;
use App\Repositories\BaseAPIRepository;

class MarkRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        "session_id",
        "user_id"
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
        return Mark::class;
    }
}
