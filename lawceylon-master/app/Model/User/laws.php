<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class laws extends Model
{
    public function lawtags()
    {
        return $this->belongsToMany('App\Model\User\lawtags','laws_tags')->withTimestamps();//to get all the news with same law tag
    }

    public function lawcategories()
    {
        return $this->belongsToMany('App\Model\User\lawcategories','lawcategory_laws')->withTimestamps();//to get all the news with same law category
    }

    public function getRouteKeyName()//to set up the url by slug
    {
        return 'slug';
    }

    public static function lawsearch($keyword) {//function for search laws

        $lawsByTags = laws::whereHas('lawtags', function($query) use ($keyword) {//get all the laws with the name of keyword== with law tag
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $lawsByCategories = laws::whereHas('lawcategories', function($query) use ($keyword) {//get all the laws with the name of keyword== with law category
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $matchingLaws = laws::where('title', 'like', '%' . $keyword . '%')//search whether title contain equal words with keyword
        ->union(laws::where('subtitle', 'like', '%' . $keyword . '%'))//search whether subtitle contain equal words with keyword
        ->union(laws::where('slug', 'like', '%' . $keyword . '%'))//search whether slug contain equal words with keyword
        ->union(laws::where('body', 'like', '%' . $keyword . '%'))//search whether body contain equal words with keyword
        ->union(laws::where('exp', 'like', '%' . $keyword . '%'))//search whether exp contain equal words with keyword
        ->union(laws::where('subcategory1', 'like', '%' . $keyword . '%'))//search whether subcategory1 contain equal words with keyword
        ->union(laws::where('subcategory2', 'like', '%' . $keyword . '%'));//search whether subcategory2 contain equal words with keyword


        $matchingLaws = $matchingLaws->union($lawsByTags)->union($lawsByCategories);//get all the laws with that keyword

        return $matchingLaws->get();//pass all the data as a array
    }
}
