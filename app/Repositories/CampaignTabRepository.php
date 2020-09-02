<?php

namespace App\Repositories;

use App\InscriptionCampaign;
use App\Models\CampaignTab;
use Carbon\Carbon;

/**
 * Class ComiteRepository
 * @package App\Repositories
 * @version September 21, 2019, 9:43 pm -05
*/

class CampaignTabRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return CampaignTab::class;
    }

}
