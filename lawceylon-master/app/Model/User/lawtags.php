<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class lawtags extends Model
{
    public function laws()
    {
        return $this->belongsToMany('App\Model\User\laws','laws_tags')->paginate(8);//set up the relationship between law and lawcategory
    }

    public function getRouteKeyName()//set up the route by slug
    {
        return 'slug';
    }
    
}
