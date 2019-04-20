<?php

namespace App\Http\Controllers\Lawyer;

use Illuminate\Http\Request;
use App\Model\Lawyer\Lawyer;
use App\Model\Admin\AdminMessageLawyer;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Model\Lawyer\Event;
use Image;
use Auth;
use Mail;
use DB;

class LawyerController extends Controller {
   
   
    public function __construct()
    {
        $this->middleware('lawyer');
    }

    public function index(){
        $lid = Auth::user()->id;
        $lawyer_id=DB::table('userlawyer')->select('lawyer_id')->where('user_id', $lid)->pluck('lawyer_id');
        $Lawyer=$lawyer_id[0];
        session(['lawyer' => $Lawyer]);
        $lawyers = DB::table('lawyers')->where('id', $Lawyer)->get();
        $lawyerrate = Lawyer::where('id',$Lawyer)->first();
        
        $ratings=DB::table('ratings')->where('rateable_id',$Lawyer)->count();
        #date("Y.m.d")
        $dataset = Event::where('start_date', date("Y.m.d"))->where('lawyer_id',$Lawyer)->get();

        //start calendar 
       $colorBusy='#ff0000';
        $colorLittleBusy='#ff9000';
        $colorLessBusy='#0000FF';
        $events = [];
    //  where('name', '=', "{$lawfirm}");
        $data = Event::where('lawyer_id',$Lawyer)->where('checked',1)->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $count = Event::where('start_date', $value->start_date)->where('lawyer_id',$Lawyer)->where('checked',1)->count();
                if($count==1){
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
                    'url' => route('userViewLawyer',['client'=>$value->client_id]), //this url must connct to appointment page
                ]
                );            
            }
        }
        $calendar = Calendar::addEvents($events);
            //end calendar
        $date=date("Y-m-d");
        //$date = date('Y-m-d', strtotime($d . ' +1 day'));
        $notification=DB::table('events')->where('lawyer_id',$lawyer_id)->where('checked',0)->where('start_date','>=',$date)->count();
        $clients = DB::table('events')->join('users','users.id','=','events.client_id')->where('events.lawyer_id',$lawyer_id)->where('events.checked',0)->where('events.start_date','>=',$date)->select('events.id','events.title','events.start_date','events.time','users.name','users.lastname','users.email','users.id as client_id')->get();
        return view('lawyer.index',compact('lawyers','lawyerrate','calendar','dataset','ratings','notification','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //change the lawyer profile picture in lawyer profile
    public function store(Request $request)
    {     
        
        $lawyer = session('lawyer');
        if($request->hasFile('file')){
            $image=$request->file('file');
            $filename = time().'.'.$image->getClientOriginalName();
            $ex=$image->getClientOriginalExtension();
            $location=public_path('images/lawyer/'.$filename);
            if($ex=='jpeg' or $ex=='png' or $ex=='jpg'){
                DB::table('lawyers')->where('id', $lawyer)->update(['image' => $filename]);
                Image::make($image)->resize(200,200)->save($location);
                return redirect()->back();
            }
        }
        return redirect()->back();

    }
    
    
    //edit lawyer view page
    public function editLawyerView()
    
    { 
        
        $lawyer = session('lawyer');
        $lawyers = DB::table('lawyers')->where('id', $lawyer)->first();
        return view('lawyer.editLawyerProfile',compact('lawyers'));
    }



    //post method when save edit lawyer details
    public function editLawyerSave(Request $request){
        $lawyer = session('lawyer');
        $lid = Auth::user()->id;
        //if new password and new password confirmation password is mismatch redirect  back
        $newpassword=$request->get('password');
        $confirmPassword=$request->get('password_confirmation');
        if($newpassword<>$confirmPassword){
            return redirect()->back();
        }
        $encNewPassword=Hash::make($newpassword);

        //update lawyer data
        $honorific=$request->get('honorific');
        $firstName=$request->get('firstName');
        $lastName=$request->get('lastName');
        $Specialist_Area=$request->get('Specialist_Area');
        $biography=$request->get('biography');
        $Experience_Period=$request->get('Experience_Period');
        $consultationFee=$request->get('consultationFee');
        $TP_Number=$request->get('TP_Number');
        $Email=$request->get('Email');
        $Address=$request->get('Address');
        if($newpassword){
            DB::table('lawyers')->where('id', $lawyer)->update(['honorific'=>$honorific,'firstName' => $firstName,'lastName'=>$lastName,'Specialist_Area'=>$Specialist_Area,'biography'=>$biography,'Experience_Period'=>$Experience_Period,'consultationFee'=>$consultationFee,'TP_Number'=>$TP_Number,'Email'=>$Email,'Address'=>$Address,'password'=>$encNewPassword]);
            DB::table('users')->where('id',$lid)->update(['honorific'=>$honorific,'name'=>$firstName,'lastname'=>$lastName,'email'=>$Email,'phone'=>$TP_Number,'address'=>$Address,'password'=>$encNewPassword]);
        }else{
            DB::table('lawyers')->where('id', $lawyer)->update(['honorific'=>$honorific,'firstName' => $firstName,'lastName'=>$lastName,'Specialist_Area'=>$Specialist_Area,'biography'=>$biography,'Experience_Period'=>$Experience_Period,'consultationFee'=>$consultationFee,'TP_Number'=>$TP_Number,'Email'=>$Email,'Address'=>$Address]);
            DB::table('users')->where('id',$lid)->update(['honorific'=>$honorific,'name'=>$firstName,'lastname'=>$lastName,'email'=>$Email,'phone'=>$TP_Number,'address'=>$Address]);
        }
        
            return redirect()->route('lawyer');
    }




    /*rating module controller part*/
    
    public function rates()
    {
        $lawyers = Lawyer::all();
        return view('lawyer.ratings',compact('lawyers'));

    }

    /*to save data of the message to admin in the db*/
    public function adminMessage(Request $request){
       
        $lawyer = session('lawyer');
        $lname=$request->get('name');
        $email=$request->get('email');
        $message=$request->get('message');
        if(($lname==NULL) or ($email==NULL) or ($message==NULL)){
            return redirect()->back();
        }

        $message=new AdminMessageLawyer (['lawyer_id'=>$lawyer,'l_name'=>$lname,'email' =>$email,'message' =>$message,]);
        $message->save();
        return redirect()->back()->with('message','your message has been sent.....');
    }

    public function notifications(Request $request){
        $lawyer = session('lawyer');
        $accept=$request->get('accept');
        $reject=$request->get('reject');
        $emailAccept=DB::table('events')->join('users','users.id','=','events.client_id')->where('events.id',$accept)->select('users.email')->pluck('email');
        $emailReject=DB::table('events')->join('users','users.id','=','events.client_id')->where('events.id',$reject)->select('users.email')->pluck('email');
        $data1=DB::table('userlawyer')->join('events','userlawyer.lawyer_id','=','events.lawyer_id')->join('users','userlawyer.user_id','=','users.id')->where('events.id',$accept)->select('events.start_date','events.time','events.title','users.honorific','users.name','users.lastname')->get();
        $data2=DB::table('userlawyer')->join('events','userlawyer.lawyer_id','=','events.lawyer_id')->join('users','userlawyer.user_id','=','users.id')->where('events.id',$reject)->select('events.start_date','events.time','events.title','users.honorific','users.name','users.lastname')->get();
        
        if($accept){
            Mail::send(['html'=>'lawyer.mailAppointmentAccept'],['details'=>$data1[0]],function($message) use($emailAccept){
                $message->to($emailAccept[0],'To client')->subject('Appointment Accepted');
                $message->from('dilshanishara73@gmail.com','Law Ceylon');
            });
            DB::table('events')->where('id',$accept)->update(['checked'=>1]);
        }else if($reject){
            Mail::send(['html'=>'lawyer.mailAppointmentReject'],['details'=>$data2[0]],function($message) use($emailReject){
                $message->to($emailReject[0],'To client')->subject('Appointment Rejected');
                $message->from('dilshanishara73@gmail.com','Law Ceylon');
            });
            DB::table('events')->where('id',$reject)->delete();
        }
        return redirect()->back();
    }

    //userView lawyer Profile

    public function viewUser($Client){
        session(['client'=>$Client]);
        $client = DB::table('users')->where('id',$Client)->first();
        return view('user.userViewLawyer',compact('client'));
    }

    public function vedioChat()
    {
        return view('lawyer.vedio');
    }

}