<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Gassette;
use Illuminate\Support\Facades\Input;

class GassetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gassettes = Gassette::all();//fetch all the gassetes in site
        return view('admin.gassettes.index',compact('gassettes'));//bind the varible gassette with blade and render it to the page
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gassettes.create');//render the page to create gassette
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gassette = new Gassette();

        $this->validate($request,[//validate data
            'name' => 'required',
            'subject' => 'required',
            'pdf' => 'required',
        ]);

        $pdf = $request->file('pdf');
        $filename = null;

        if (Input::hasFile('pdf')) {
            
            $filename = time().'.'.$pdf->getClientOriginalName();//create unique filename to the file 

            if (Input::file('pdf')->move('gassettes/',$filename)) {
                // File successfully saved to permanent storage
            } else {
                // Failed to save file, perhaps dir isn't writable. Give the user an error.
            }
        
        }

        
        $gassette->name = $request->name;
        $gassette->subject = $request->subject;
        $gassette->file = $filename;//save that file with file name
        $gassette->save();///save data in the database
    
        return redirect(route('gassettes.index'));//redirect back to the previous page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//pass the id of the gazzete as the parameter to the function
    {
        $gassette = Gassette::where('id',$id)->first();
        return view('admin.gassettes.show',compact('gassette'));//show relevant gazzete on page
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//pass the id of the gazzete as the parameter to the function
    {
        $gassette = Gassette::where('id',$id)->first();//
        return view('admin.gassettes.edt',compact('gassette'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//pass the id of the gazzete and form request as the parameter to the function
    {
        $this->validate($request,[//again validate the fields
            'name' => 'required',
            'subject' => 'required',
        ]);

        $gassette = Gassette::find($id);
        $gassette->name = $request->name;
        $gassette->subject = $request->subject;
        $gassette->save();

        return redirect(route('gassettes.index'));//redirect back to the previous page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//pass the id of the gazzete as the parameter to the function
    {
        Gassette::where('id',$id)->delete();//find relevant gazzete from the database and delete it
        return redirect()->back();//redirect back to the previous page
    }
}
