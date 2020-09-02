<?php

namespace App\Models\moduloCaptacionDifusion;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{

    public $fillable = [
        'document',
        'names',
        'last_names',
        'detection_count'
    ];
    protected $casts = [
        'id' => 'integer',
        'document' => 'string',
        'names' => 'string',
        'last_names' => 'string',
        'detection_count'=>'integer'
    ];

    public static $rules = [
        'document' => 'required',
    ];

    public function addCount($save=true){

        $this->detection_count ++;

        if($save){
            $this->save();
        }
    }
}
