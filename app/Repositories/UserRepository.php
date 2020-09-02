<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\User;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class UserRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id'
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
        return User::class;
    }

    public function search($text){
        $this->addLike('name',function($query)use($text){
            $query->where('name','like',$text.'%');
            $query->orWhere('name','like','%'.$text.'%');
        });

    }
}
