<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_ru', 'title_ua', 'content_ru', 'content_ua', 'image', 'endData', 'status', 'active'
    ];
}
