<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Topic;
use App\Repositories\BaseAPIRepository;

/**
 * Class TopicRepository
 * @package App\Repositories
 * @version March 12, 2020, 8:51 am -05
*/

class TopicRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'course_id'
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
        return Topic::class;
    }
}
