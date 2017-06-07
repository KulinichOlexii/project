<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_ru', 'title_ua', 'content_ru', 'content_ua', 'image', 'year', 'background', 'active'
    ];
}
