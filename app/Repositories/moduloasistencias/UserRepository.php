<?php

namespace App\Repositories\moduloasistencias;

use App\Models\moduloasistencias\User;
use App\Repositories\BaseAPIRepository;

class UserRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'nombres',
        'email',
        'password',
        'apellidos',
        'telefono',
        'dni',
        'email',
        'email_verified_at'
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
        return User::class;
    }


    public function addLikeUserName($search){
        $this->addLike('name',function($query)use($search){
            $query->where('name','like',$search.'%');
        });
    }

    public function addLikeName($search){
        $this->addLike('nombres',function($query)use($search){
            $query->where('nombres','like',$search.'%');
        });
    }
}
