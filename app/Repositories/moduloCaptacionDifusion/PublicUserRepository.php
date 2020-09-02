<?php

namespace App\Repositories\moduloCaptacionDifusion;

use App\Models\moduloCaptacionDifusion\PublicUser;
use App\Repositories\BaseRepository;

/**
 * Class PublicUserRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class PublicUserRepository extends BaseRepository
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
        return PublicUser::class;
    }
}
