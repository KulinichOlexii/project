<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name_ru', 'name_ua', 'title_ru', 'title_ua', 'text_ru', 'text_ua', 'price', 'image', 'active'

    ];

    public function stations()
    {
        return $this->belongsToMany('App\Station', 'station_fuels');
    }

    /*protected $casts = [
        'active' => 'boolean',
    ];

    public function setActiveAttribute()
    {
        if ($this->attributes['active'] == 0){
            $this->attributes['active'] = 1;
        }
        else $this->attributes['active'] = 0;

    }*/

}
