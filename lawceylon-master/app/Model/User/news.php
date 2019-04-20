<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class news extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Model\User\tags','news_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\User\categories','category_news')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function newsearch($keyword) {

        $newsByTags = news::whereHas('tags', function($query) use ($keyword) {//get all the laws with the name of keyword== with news tag
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $newsByCategories = news::whereHas('categories', function($query) use ($keyword) {//get all the laws with the name of keyword== with news category
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $matchingNews = news::where('title', 'like', '%' . $keyword . '%')//search whether title contain equal words with keyword
        ->union(news::where('subtitle', 'like', '%' . $keyword . '%'))//search whether subtitle contain equal words with keyword
        ->union(news::where('slug', 'like', '%' . $keyword . '%'))//search whether slug contain equal words with keyword
        ->union(news::where('body', 'like', '%' . $keyword . '%'));//search whether body contain equal words with keyword

        $matchingNews = $matchingNews->union($newsByTags)->union($newsByCategories);//get all the laws with that keyword

        return $matchingNews->paginate(8);//pass all the data as a array
    }
}
