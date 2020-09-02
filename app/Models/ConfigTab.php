<?php

namespace App\Models;

use App\InscriptionCampaign;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConfigTab
 * @package App\Models
 * @version March 18, 2020, 1:45 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection bells
 * @property \Illuminate\Database\Eloquent\Collection tabs
 * @property integer id_bell
 * @property integer id_tab
 */
class ConfigTab extends Model
{
    protected $connection = 'inscripcionesv2';

    public $table = 'config_tabs';

    public $fillable = [
        'id_bell',
        'id_tab'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_bell' => 'integer',
        'id_tab' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bells()
    {
        return $this->hasMany(InscriptionCampaign::class, 'id_bell', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tabs()
    {
        return $this->hasMany(\App\Models\Tab::class, 'id_tab', 'id');
    }
}
