<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $guarded=['id'];
    public function Group()
        {
            return $this->belongsTo('App\Group');
        }
}
