<?php
namespace App\Http\Controllers\Page\Map;

use App\Http\Controllers\Controller;
use App\Model\Map\townmarker;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class MapController extends Controller
{


    public static function gmaps()
    {
    	$locations = DB::table('markers')->get();
    	return view('main.Maps.MapSearch',compact('locations'));
    }

}