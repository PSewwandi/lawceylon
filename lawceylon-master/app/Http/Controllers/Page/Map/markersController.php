<?php

namespace App\Http\Controllers\Page\Map;

use App\Http\Controllers\Controller;
use App\Model\Map\marker;
use App\Model\Lawyer\Lawyer;
use App\Model\Lawyer\lawyers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class markersController extends Controller
{
    public static function index()
    {
      $markers=marker::all();
      return view('main.markers.index',compact('markers'));
    }


    public function show($lawfirm)
    {
      $nameresult = marker::where('name', '=', "{$lawfirm}");
      $lawyersIn= lawyers::where('Address','like',"%{$lawfirm}%")->where('checked',1)->get();
      return view('main.markers.show',compact('nameresult','lawyersIn'));
    }

}