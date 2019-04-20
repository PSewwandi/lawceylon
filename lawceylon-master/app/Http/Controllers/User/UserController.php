<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Model\Lawyer\Event;
use App\Model\Lawyer\Lawyer;
use App\Model\Admin\AdminMessageClient;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Pusher\Pusher;
use Auth;
use Mail;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        $Client=Auth::user()->id;
        session(['client' => $Client]);
        $clients = DB::table('users')->where('id', $Client)->first();
        $dataset = Event::where('start_date', date("Y.m.d"))->where('client_id',$Client)->where('checked',1)->get();
         //start calendar 
         $colorBusy='#ff0000';
         $colorLittleBusy='#ff9000';
         $colorLessBusy='#0000FF';
         $events = [];
       //  where('name', '=', "{$lawfirm}");
         $data = Event::where('client_id',$Client)->where('checked',1)->get();
         if($data->count()) {
             foreach ($data as $key => $value) {
                 $count = Event::where('start_date', $value->start_date)->where('client_id',$Client)->where('checked',1)->count();
                 if($count<=1){
                     $color=$colorLessBusy;
                 }elseif($count<4){
                     $color=$colorLittleBusy;
                 }else{
                     $color=$colorBusy;
                 }
                 $events[] = Calendar::event(  
                     $value->title,               
                     true,
                     new \DateTime($value->start_date),
                     new \DateTime($value->end_date.' +1 day'),
                     null,          
                     // Add color and link on event
                  [
                      'color' => $color,     
                      'url' => route('lawyerViewUser',['lawyer'=>$value->lawyer_id]), //this url must connct to appointment page
                  ]
                 );            
             }
         }
         $calendar = Calendar::addEvents($events);
            //end calendar
        $date=date("Y-m-d");
        $notification=DB::table('events')->where('client_id',$Client)->where('checked',0)->where('start_date','>=',$date)->count();
        $appointments=DB::table('userlawyer')->join('events','userlawyer.lawyer_id','=','events.lawyer_id')->join('users','userlawyer.user_id','=','users.id')->where('events.client_id',$Client)->where('events.checked',0)->where('events.start_date','>=',$date)->select('events.start_date','events.time','events.title','events.id','events.lawyer_id','users.honorific','users.name','users.lastname')->get();
        return view('user.index',compact('clients','calendar','dataset','notification','appointments'));
    }

    public function payment(){
        return view('user.welcome');
        }

        /*function to message admin*/
    public function adminMessage(Request $request){
        $client = session('client');
        $cname=$request->get('name');
        $email=$request->get('email');
        $message=$request->get('message');
        if(($cname==NULL) or ($email==NULL) or ($message==NULL)){
            return redirect()->back();
    }
    
        $message=new AdminMessageClient(['c_id'=>$client,'c_name'=>$cname,'email' =>$email,'message' =>$message,]);
        $message->save();
        return redirect()->back()->with('message', 'Your message has been send to the admin....');
        
    }

      
    //edit lawyer view page
    public function editClientView()  
    { 
        $Client = session('client');
        $client = DB::table('users')->where('id', $Client)->first();  
        return view('user.editClientProfile',compact('client'));
    }


    //post method when save edit client details
    public function editClientSave(Request $request){

        $client = session('client');
        //if new password and new password confirmation password is mismatch redirect  back
        $newpassword=$request->get('password');
        $confirmPassword=$request->get('password_confirmation');
        if($newpassword<>$confirmPassword){
            return redirect()->back();
        }
        $encNewPassword=Hash::make($newpassword);
        //update lawyer data
        $honorific=$request->get('honorific');
        $firstName=$request->get('name');
        $lastName=$request->get('lastname');
        $TP_Number=$request->get('TP_Number');
        $Email=$request->get('Email');
        $Address=$request->get('Address');
        if($newpassword){
            
            DB::table('users')->where('id',$client)->update(['honorific'=>$honorific,'name'=>$firstName,'lastname'=>$lastName,'email'=>$Email,'phone'=>$TP_Number,'address'=>$Address,'password'=>$encNewPassword]);
        }else{
            
            DB::table('users')->where('id',$client)->update(['honorific'=>$honorific,'name'=>$firstName,'lastname'=>$lastName,'email'=>$Email,'phone'=>$TP_Number,'address'=>$Address]);
        }

            return redirect()->route('user');
    }


    //lawyerViewUserProfile

    public function viewLawyer($Lawyer){
        session(['lawyer'=>$Lawyer]);
        //$lawyer=DB::table('lawyers')->where('id',$Lawyer)->first();
        $ratings=DB::table('ratings')->where('rateable_id',$Lawyer)->count();
        $lawyer = Lawyer::where('id',$Lawyer)->first();
        return view('lawyer.lawyerViewUser',compact('lawyer','ratings'));
    }
    
    
    //create an appointment
    
    public function createAppointment(Request $request){
        $lawyer=session('lawyer');
        $client=session('client');
        $date=date("Y-m-d");
        $title=$request->get('appointment');
        $start_date=$request->get('start_date');
        $time=$request->get('time');
        $lawyer_id=$lawyer;
        $client_id=$client;
        $checked=0;
        if($start_date<$date){
            return redirect()->back()->with('message','enter a valid date...');
        }
        $appointment=new Event(['start_date'=>$start_date,'end_date'=>$start_date,'title'=>$title,'time'=>$time,'lawyer_id'=>$lawyer_id,'client_id'=>$client_id,'checked'=>$checked,]);
        $appointment->save();
        return redirect()->back()->with('message','Your Request is Processing....');

    }
        
    /*rating module controller part*/
            
    public function rates()
    {
        $lawyers=Lawyer::all();
        return view('lawyer.ratings',compact('lawyers'));

    }

    public function rateRatings(Request $request)
    {

        request()->validate(['rate' => 'required']);
        $lawyer=Lawyer::where('id',$request->id)->first();
        /*avoid rating the same lawyer more than once*/
        $user_id=auth()->user()->id;
        $rate=DB::table('ratings')->where('user_id',$user_id)->where('rateable_id',$request->id)->count();
        if($rate){
            DB::table('ratings')->where('user_id',$user_id)->update(['rating'=>$request->rate]);
        }else{
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rate;
            $rating->user_id = auth()->user()->id;
            $lawyer->ratings()->save($rating);
        }
        return redirect()->route("ratings");
    }

    /* appointment notifications*/
    public function notifications(Request $request){
        $remove=$request->get('remove');
        if($remove){
            DB::table('events')->where('id',$remove)->delete();
        }
        return redirect()->back();
        
    }
        
    public function vedioChat()
    {
        return view('user.vedio');
    }
    public function authenticate(Request $request)
    {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;
        // $pusher = new Pusher('App key','App Secret','App id',array with options)
        $pusher = new Pusher('d4a6d826a94befac9e6a', 'e55c2777bf88e18ecb7b', '681328', [
            'cluster' => 'ap1',
            'encrypted' => true
        ]);
        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);
        return response($key);
    }

}



