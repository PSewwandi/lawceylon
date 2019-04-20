<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lawyer\Lawyer;
use App\User;
use Auth;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $lawyers = Lawyer::where('checked',1)->get();
        $lwyrs = count($lawyers);
        return($lawyers);
        // return view('admin.home');
        
    }
}
