<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lawyer\Lawyer;
use App\User;
use DB;
use Carbon\Carbon;
use Mail;

class UnregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyers = Lawyer::where('checked', 0)->get();//get all the unregistered lawyers in the system(unregistered means system doesnt verify that the account is belongs to true lawyer)
        return view('admin.unregister.show',compact('lawyers'));//bind all the unregistered lawyers with the blade
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//pass the id of unregistered lawyer as input parameter of the function
    //functions to accept this unnregistered lawyer as registered one in the system
    {
        $lawyer = Lawyer::where('id',$id)->first();//fetch all the data of the relevant unregistered lawyer
        $data = array('name'=>$lawyer->firstName);
        Mail::send(['text'=>'mail'], $data, function($message) use ($lawyer) {//mail refers to a blade which stored in the resources->views folder
            $message->to($lawyer->Email, 'From Lawceylon')->subject
               ('Lawceylon Lawyer Registration Accept Mail');//mail subject
            $message->from('dilshanishara73@gmail.com','Lawceylon');//this function triggered when admin accepts as a true lawyer
        });
        DB::table('users')->insert(//insert data to the users table
            array(
                'honorific'=>$lawyer->honorific,
                'name' =>$lawyer->firstName,
                'lastname' =>$lawyer->lastName,
                'phone'=>$lawyer->TP_Number,
                'address'=>$lawyer->Address,
                'nic'=>$lawyer->NIC_passportNumber,
                'email'=>$lawyer->Email,
                'role'=>'lawyer',//set role as lawyer to all 
                'password'=>$lawyer->password,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            )
        );

        $user = User::where('email',$lawyer->Email)->first();
        $lawyer->checked = 1;
        $lawyer->save();
        DB::table('userlawyer')->insert(//insert lawyer id and user id to the user_lawyer table to map
            array(
                'user_id'=>$user->id,
                'lawyer_id' =>$lawyer->id
            )
        );
        
        return redirect()->route('lawyer.index');//redirect back to the previous page
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//pass the id of unregister lawyer as input parameter of the function
    {
        $lawyer = Lawyer::where('id',$id)->first();//fetch the relevant lawyer from the database
        return view('admin.unregister.view',compact('lawyer'));//return data to the view blade
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
    public function destroy($id)//pass the id of unregister lawyer as input parameter of the function
    {
        Lawyer::where('id',$id)->delete();//delete the relevant lawyer from the database
        return redirect()->back();//redirect back to the previous page
    }
}
