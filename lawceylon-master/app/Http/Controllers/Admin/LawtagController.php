<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\lawtags;

class LawtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawtags = lawtags::all();//fetch all the lawtags from database
        return view('admin.lawtag.show',compact('lawtags'));//and bind them into the show blade which shows in a table
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lawtag.create');//render the create blade
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[//validate the data comming from database
            'name' => 'required',
            'slug' => 'required',
        ]);
        $lawtag = new lawtags();
        $lawtag->name = $request->name;
        $lawtag->slug = $request->slug;
        $lawtag->save();//save data in to the database

        return redirect(route('lawtag.index'));//redirect back to the previous page
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
        $lawtags = lawtags::where('id',$id)->first();//fetch relevant law detail from database
        return view('admin.lawtag.edit',compact('lawtags'));//bind that variable to edit blade
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
        $this->validate($request,[//validate again the fields
            'name' => 'required',
            'slug' => 'required',
        ]);

        $lawtags = lawtags::find($id);//find the relevant detail from the database
        $lawtags->name = $request->name;
        $lawtags->slug = $request->slug;
        $lawtags->save();//update the data in the database

        return redirect(route('lawtag.index'));//redirect back to the previous page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//pass the id of law tag as input parameter of the function
    {
        lawtags::where('id',$id)->delete();
        return redirect()->back();
    }
}
