<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\lawcategories;

class LawcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawcategories = lawcategories::all();//fetch all created law categories
        return view('admin.lawcategory.show',compact('lawcategories'));//bind that categories variable to show blade
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lawcategory.create');//render the create blade 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[//validate the data comming from request
            'name' => 'required',
            'slug' => 'required',
        ]);
        $lawcategory = new lawcategories();//create new model lawcategories
        $lawcategory->name = $request->name;
        $lawcategory->slug = $request->slug;
        $lawcategory->save();//save it  in the database

        return redirect(route('lawcategory.index'));//redirect back to the previous page
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
    public function edit($id)//pass the id as the parameter to the function
    {
        //php artisan make:controller PhotoController --resource
        // function valid_email($email) {
        //     return !!filter_var($email, FILTER_VALIDATE_EMAIL);
        // }
        // 'title' => 'required|unique:posts|max:255'
        // DB::enableQueryLog();
        // $users = User::all();
        // dd(DB::getQueryLog());
        //use this with importing use DB to see the relevant query
        //validate nic in with v
        // 'nic'=>'required|regex:/^\d{9}[Vv]$/'
        //use this to validate nic
        $lawcategories = lawcategories::where('id',$id)->first();//find the relevant law category by the database
        return view('admin.lawcategory.edit',compact('lawcategories'));//bind that law category to edit blade
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
        $this->validate($request,[//again validate fields
            'name' => 'required',
            'slug' => 'required',
        ]);

        $lawcategories = lawcategories::find($id);//find the relevant law category from database
        $lawcategories->name = $request->name;
        $lawcategories->slug = $request->slug;
        $lawcategories->save();//assign new values and update it in the database

        return redirect(route('lawcategory.index'));//redirect back to the previous page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//pass the id of law category as input parameter of the function
    {
        lawcategories::where('id',$id)->delete();//find relevant law cactegory from the database and delete it
        return redirect()->back();//redirect back to the previous page
    }
}
