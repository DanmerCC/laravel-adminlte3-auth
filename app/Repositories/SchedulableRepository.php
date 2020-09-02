<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Schedulable;

/**
 * Class SchedulableRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class SchedulableRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_id',
        'enviroment_id',
        'id',
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
        return Schedulable::class;
    }

    public function whereInTypes($array){
        $this->addCallBackWhereIn('type_id',function($query)use($array){
            $query->whereIn('type_id',$array);
        });
    }
}
