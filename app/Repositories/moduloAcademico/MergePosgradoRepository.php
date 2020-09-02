<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\MergePosgrado;
use App\Repositories\BaseRepository;

/**
 * Class MergePosgradoRepository
 * @package App\Repositories
 * @version August 12, 2019, 1:46 pm -05
*/

class MergePosgradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

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
    public function getFieldsSortable(){
        return [];
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MergePosgrado::class;
    }
}
