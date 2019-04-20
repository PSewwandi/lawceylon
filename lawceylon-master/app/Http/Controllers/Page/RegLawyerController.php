<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Input;
use App\Model\Lawyer\Lawyer;
use App\Model\Lawyer\File;
use DB;
use Image;

// use Hash;


class RegLawyerController extends Controller
{
    public function index()
    {
        return view('main.lawyerRegistration');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        global $filename;
        $numLawyer=Lawyer::get()->count();
       
        if($numLawyer){
            $lastidarray=DB::table('lawyers')->orderBy('id','desc')->take(1)->pluck('id');
            $lastid=$lastidarray[0]+1;
        }else{
            $lastid=1;
        }
       
       
        $this->validate($request ,[

        'firstName'  =>'required|max:30',
        'lastName'=>'required|max:30',
        'gender'=>'required',
        'Email'=>'required|email',
        'NIC_passportNumber'=>'required',
        'barnumber'=>'required|min:10',
        'password'=>'required|min:5|max:30',
        'password_confirmation' => 'required_with:password|same:password',
        'Specialist_Area'=>'required',
        'Experience_Period'=>'required',
        'TP_Number'=>'required|min:10',
        'file' => 'required|image|mimes:jpeg,jpg,png|max:5120',
       
        ]);

        /*encrypting the user password*/
        $userPassword=$request->get('password');
        $encPassword= Hash::make($userPassword);

        //if new password and new password confirmation password is mismatch redirect  back
        $newpassword=$request->get('password');
        $confirmPassword=$request->get('password_confirmation');
        if($newpassword<>$confirmPassword){
            return redirect()->back();
        }
        
        /*checking whether there already exists the registering lawyer*/ 
        $user=$request->get('Email');
        $email=DB::table('lawyers')->where('email',$user)->count();
        if($email){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');
        }
        $email2=DB::table('users')->where('email',$user)->count();
        if($email2){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');
        }

        if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $filename = time().'.'.$image->getClientOriginalName();
            $location = public_path('images/lawyer/'.$filename);
            Image::make($image)->resize(200,200)->save($location);
        }

        $lawyer=new lawyer(
            ['id'=>$lastid,
            'honorific'=>$request->get('honorific'),
            'firstName' =>$request->get('firstName'),
            'lastName' =>$request->get('lastName'),
            'gender'=>$request->get('gender'),
            'Email'=>$request->get('Email'),
            'NIC_passportNumber'=>$request->get('NIC_passportNumber'),
            'barnumber'=>$request->get('barnumber'),
            'password'=>$encPassword,
            'Specialist_Area'=>$request->get('Specialist_Area'),
            'Experience_Period'=>$request->get('Experience_Period'),
            'Address'=>$request->get('Address'),
            'TP_Number'=>$request->get('TP_Number'),
            'biography'=>$request->get('biography'),
            'consultationFee'=>$request->get('consultationFee'),
            'image'=>$filename,
        ]);
        
        $lawyer->save();

        return redirect()->back()->with('message', 'Your registration is pending....We will inform you via an email!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
