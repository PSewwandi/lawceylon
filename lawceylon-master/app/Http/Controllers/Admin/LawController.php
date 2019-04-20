<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\laws;
use App\Model\User\lawtags;
use App\Model\User\lawcategories;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laws = laws::all();//fetch all laws details published to front end side 
        return view('admin.laws.show',compact('laws'));//show them in a table
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lawtags = lawtags::all();//
        $lawcategories = lawcategories::all();
        return view('admin.laws.create',compact('lawtags','lawcategories'));//load the blade to create new law detail
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',//validate fields
            'subtitle' => 'required',
            'slug' => 'required',
            'subcategory1' => 'required',
            'subcategory2' => 'required',
            'body' => 'required',
            'exp' => 'required',
        ]);

        $laws = new laws();
        $laws->title = $request->title;
        $laws->subtitle = $request->subtitle;
        $laws->slug = $request->slug;
        $laws->subcategory1 = $request->subcategory1;
        $laws->subcategory2 = $request->subcategory2;
        $laws->exp = $request->exp;
        $laws->body = $request->body;
        $laws->save();//save form data after submitting the form create new law detail

        return redirect(route('laws.index'));//redirect back to previous page
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
    public function edit($id)//If want to edit law detail pass its id ass the input parameter
    {
        $law = laws::where('id',$id)->first();//get the relevent law detail from database
        $lawtags = lawtags::all();
        $lawcategories = lawcategories::all();
        return view('admin.laws.edit',compact('lawtags','lawcategories','law'));//pass that law  detail to another blade for edit purpose
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
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'subcategory1' => 'required',
            'subcategory2' => 'required',
            'body' => 'required',
            'exp' => 'required',

        ]);

        $laws = laws::find($id);//find the relevant law detail from data base and assign modified data to it
        $laws->title = $request->title;
        $laws->subtitle = $request->subtitle;
        $laws->slug = $request->slug;
        $laws->subcategory1 = $request->subcategory1;
        $laws->subcategory2 = $request->subcategory2;
        $laws->exp = $request->exp;
        $laws->body = $request->body;
        $laws->lawtags()->sync($request->lawtags);
        $laws->lawcategories()->sync($request->lawcategories);
        $laws->save();//save data after submitting the form in update view

        return redirect(route('laws.index'));//redirect back to the previous page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)///pass the id of law detail to the function
    {
        laws::where('id',$id)->delete();///search relevant law detail by its id and delete
        return redirect()->back();
    }
}
