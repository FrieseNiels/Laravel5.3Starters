<?php

namespace App;

use App\Traits\HasModelTrait;

class Widget extends SuperModel
{

    use HasModelTrait;

    protected $fillable = ['name', 'slug', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
