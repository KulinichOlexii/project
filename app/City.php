<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ua', 'name_ru'
    ];

    public function stations()
    {
        return $this->hasMany('App\Station', 'city_id', 'id');
    }


}
