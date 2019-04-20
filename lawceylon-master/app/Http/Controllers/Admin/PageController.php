<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lawyer\Lawyer;
use App\User;
use App\Model\Admin\AdminMessageLawyer;
use App\Model\Admin\AdminMessageClient;
use App\Model\message;

class PageController extends Controller
{
    public function __construct()//add constructor for this PageController class so then without this middleware anyone cant access this controller and load the view
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $lawyers = Lawyer::where('checked',1)->get();
        $lwyrs = count($lawyers);//getting number of registered lawyers in the system
        $users = User::where('role','user')->get();
        $usrs = count($users);//getting the number of registered users in the system
        $unregistered = Lawyer::where('checked',0)->get();
        $unregistrd = count($unregistered);//getting number of unregistered lawyers in the system
        $lmessages = AdminMessageLawyer::all();
        $lmessage = count($lmessages);//getting number of messages from registered lawyers in the system
        $umessages = AdminMessageClient::all();
        $umessage = count($umessages);//getting number of messages from registered users in the system
        $cmessages = message::all();
        $cmessage = count($cmessages);//getting number of messagesfrom unregistered users in the system
        return view('admin.home',compact('lwyrs','usrs','unregistrd','lmessage','umessage','cmessage'));//bind all that variables to the blade
    }
}
