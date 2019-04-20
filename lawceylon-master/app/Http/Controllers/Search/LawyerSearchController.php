<?php

namespace App\Http\Controllers\Search;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LawyerSearchController extends Controller
{
    public static function getAllLawyers()
    {
    	$lawyers = DB::table('lawyers')->get();
        return view('pages.LawyerSearch',['lawyers'=>$lawyers]);
    
    }
}
