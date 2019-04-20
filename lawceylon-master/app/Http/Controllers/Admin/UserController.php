<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->where(function ($q) {//fetch all the registered users from the datababse
            return $q->where('role', 'user');//get users by checking their role column=user
        })->get();
        return view('admin.user.show',compact('users'));//see them in table 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //admin cant create any users
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
    public function edit($id)//pass the id of the user as the parameter to the function
    {
        $user = User::where('id',$id)->first();//find the relevant user by the database
        return view('admin.user.edit',compact('user'));//bind that user to edit blade
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//pass the id of the user and form request as the parameter to the function
    {
        $this->validate($request,[//again validate the fields

            'honorific' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'nic' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',

        ]);

        $userPassword=$request->get('password');
        $encPassword= Hash::make($userPassword);

        $user = User::find($id);//find the relevant user from database
        $user->honorific = $request->honorific;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->nic = $request->nic;
        $user->email = $request->email;
        $user->password = $encPassword;
        $user->role = $request->role;
        $user->save();//assign new values and update it in the database

        return redirect(route('user.index'));//redirect back to the previous page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//pass the id of the user as the parameter to the function
    {
        User::where('id',$id)->delete();//find relevant user from the database and delete it
        return redirect()->back();//redirect back to the previous page
    }
}
