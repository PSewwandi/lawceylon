<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\news;

class categories extends Model
{
    public function news()
    {
        return $this->belongsToMany('App\Model\User\news','category_news')->paginate(8);//set up the relationship between news and newscategory
    }

    public function getRouteKeyName()//set up the route by slug
    {
        return 'slug';
    }
}
