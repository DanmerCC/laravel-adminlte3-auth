<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Course;
use App\Repositories\BaseAPIRepository;
use App\Repositories\BaseRepository;

/**
 * Class CourseRepository
 * @package App\Repositories
 * @version March 11, 2020, 4:43 pm -05
*/

class CourseRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'block_id'
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
        return Course::class;
    }
}
