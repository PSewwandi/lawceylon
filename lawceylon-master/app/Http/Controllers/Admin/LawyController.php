<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lawyer\Lawyer;
use App\User;
use DB;

class LawyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyers = Lawyer::all();
        // $lawyers1 = Lawyer::where('checked', 1)->get();
        // $lawyers2 = Lawyer::where('checked', 1)->get();//fetch all the registered lawyers in the system
        // $lawyers = $lawyers->union($lawyers1)->union($lawyers2);
        return view('admin.lawyer.show',compact('lawyers'));//see them in a table
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lawyer.create');//admin can crate registered lawyer in to the system
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[//validate the fields

            'firstName'  =>'required|max:30',
            'lastName'=>'required|max:30',
            'gender'=>'required',
            'Email'=>'required|email',
            'NIC_passportNumber'=>'required',
            'barnumber'=>'required|min:10',
            'Address'=>'required',
            'password'=>'required|min:5|max:30',
            'password_confirmation' => 'required_with:password|same:password',//see whether the same password has entered
            'Specialist_Area'=>'required',
            'Experience_Period'=>'required',
            'TP_Number'=>'required|min:10',
           
        ]);

        /*checking whether there already exists the registered lawyer*/ 
        $user=$request->get('Email');
        $email=DB::table('lawyers')->where([ ['email', '=', $user],['checked', '=', 1],])->count();//get count of emails with same email in lawyers table
        $email2=DB::table('users')->where([ ['email', '=', $user],])->count();//get count of emails with same email in users table
        if($email){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');//if count is one or more redirect back with this message
        }
        if($email2){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');//if count is one or more redirect back with this message
        }

        $lawyer = new Lawyer();//set up all the fields with request data
        $lawyer->honorific = $request->honorific;
        $lawyer->firstName = $request->firstName;
        $lawyer->lastName = $request->lastName;
        $lawyer->gender = $request->gender;
        $lawyer->Email = $request->Email;
        $lawyer->NIC_passportNumber = $request->NIC_passportNumber;
        $lawyer->barnumber = $request->barnumber;
        $lawyer->Address = $request->Address;
        $lawyer->Specialist_Area = $request->Specialist_Area;
        $lawyer->Experience_Period = $request->Experience_Period;
        $lawyer->TP_Number = $request->TP_Number;
        $lawyer->consultationFee = $request->consultationFee;
        $lawyer->checked = 1;
        $lawyer->password = $request->password;
        $lawyer->save();//save that lawyer in the system

        return redirect(route('lawyer.index'));//redirect back to the previous page
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
    public function edit($id)//pass the id of the lawyer as input parameter of the function
    {
        $lawyer = Lawyer::where('id',$id)->first();// when editting get the relevant lawyer data from the database
        return view('admin.lawyer.edit',compact('lawyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//pass the request and id of the lawyer as input parameter of the function
    {
        $this->validate($request ,[//again validate the data 

            'firstName'  =>'required|max:30',
            'lastName'=>'required|max:30',
            'gender'=>'required',
            'Email'=>'required|email',
            'NIC_passportNumber'=>'required',
            'barnumber'=>'required|min:10',
            'Address'=>'required',
            'password'=>'required|min:5|max:30',
            'password_confirmation' => 'required_with:password|same:password',
            'Specialist_Area'=>'required',
            'Experience_Period'=>'required',
            'TP_Number'=>'required|min:10',
           
        ]);

        /*checking whether there already exists the registered lawyer*/ 
        $user=$request->get('Email');
        $email=DB::table('lawyers')->where([ ['email', '=', $user],['checked', '=', 1],])->count();//get count of emails with same email in lawyers table
        $email2=DB::table('users')->where([ ['email', '=', $user],])->count();//get count of emails with same email in users table
        if($email){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');//if count is one or more redirect back with this message
        }
        if($email2){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');//if count is one or more redirect back with this message
        }

        $lawyer = Lawyer::find($id);//set up all the fields with request data
        $lawyer->honorific = $request->honorific;
        $lawyer->firstName = $request->firstName;
        $lawyer->lastName = $request->lastName;
        $lawyer->gender = $request->gender;
        $lawyer->Email = $request->Email;
        $lawyer->NIC_passportNumber = $request->NIC_passportNumber;
        $lawyer->barnumber = $request->barnumber;
        $lawyer->Address = $request->Address;
        $lawyer->Specialist_Area = $request->Specialist_Area;
        $lawyer->Experience_Period = $request->Experience_Period;
        $lawyer->TP_Number = $request->TP_Number;
        $lawyer->consultationFee = $request->consultationFee;
        $lawyer->checked = 1;
        $lawyer->password = $request->password;
        $lawyer->save();//save that lawyer in the system

        return redirect(route('lawyer.index'));//redirect back to the previous page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//pass the id of the lawyer as input parameter of the function
    {
        Lawyer::where('id',$id)->delete();//find relevant lawyer from the database and delete it
        return redirect()->back();//redirect back to the previous page
    }
}
