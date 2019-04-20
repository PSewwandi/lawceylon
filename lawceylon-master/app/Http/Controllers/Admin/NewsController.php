<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\news;
use App\Model\User\tags;
use App\Model\User\categories;
use Illuminate\Support\Facades\Storage;
use Image;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::all();
        return view('admin.news.show',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tags::all();
        $categories = categories::all();
        return view('admin.news.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new news();

        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image2 = $request->file('image');

            $filename = time().'.'.$image->getClientOriginalName();
            $filename2 = time().'.'.$image2->getClientOriginalName();

            $location = public_path('images/news/'.$filename);
            $location2 = public_path('images/news/front/'.$filename2);

            Image::make($image)->resize(900,300)->save($location);
            Image::make($image2)->resize(800,800)->save($location2);

            $news->image = $filename;
            $news->image2 = $filename2;
        }

        
        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->slug = $request->slug;
        $news->body = $request->body;
        $news->status = $request->status;
        $news->save();
        $news->tags()->sync($request->tags);
        $news->categories()->sync($request->categories);

        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function edit($id)
    {
        $news = news::with('tags','categories')->where('id',$id)->first();
        $tags = tags::all();
        $categories = categories::all();
        return view('admin.news.edit',compact('tags','categories','news'));
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
        $news = news::find($id);

        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:5120',

        ]);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image2 = $request->file('image');

            $filename = time().'.'.$image->getClientOriginalName();
            $filename2 = time().'.'.$image2->getClientOriginalName();

            $location = public_path('images/news/'.$filename);
            $location2 = public_path('images/news/front/'.$filename2);

            Image::make($image)->resize(900,300)->save($location);
            Image::make($image2)->resize(800,800)->save($location2);

            $oldFilename = $news->image;
            $oldFilename2 = $news->image2;
            //Update the database
            $news->image = $filename;
            $news->image2 = $filename2;
            //Delete the old photo
            Storage::delete('images/news/'.$oldFilename);
            Storage::delete('images/news/front/'.$oldFilename2);
        }

        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->slug = $request->slug;
        $news->body = $request->body;
        $news->status = $request->status;
        $news->tags()->sync($request->tags);
        $news->categories()->sync($request->categories);
        $news->save();

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = news::find($id);
        Storage::delete('images/news/'.$news->image);
        Storage::delete('images/news/front/'.$news->image2);
        news::where('id',$id)->delete();
        return redirect()->back();
    }
}
