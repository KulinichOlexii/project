<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id', 'address_ru', 'address_ua', 'lat', 'lng', 'content_ru', 'content_ua', 'active'
    ];

    public function city()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }


   /* public function checkCity()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }*/
    public function cityConnect()
    {
        return $this->belongsTo('App\City', 'id');

    }

    public function fuels()
    {
        return $this->belongsToMany('App\Fuel', 'station_fuels');

    }
}
