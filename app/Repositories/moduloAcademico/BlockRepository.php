<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Block;
use App\Repositories\BaseAPIRepository;
use App\Repositories\BaseRepository;

/**
 * Class BlockRepository
 * @package App\Repositories
 * @version March 11, 2020, 4:17 pm -05
*/

class BlockRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'posgrade_id'
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
        return Block::class;
    }
}
