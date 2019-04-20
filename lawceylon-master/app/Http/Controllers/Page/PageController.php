<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User\laws;
use App\Model\User\lawtags;
use App\Model\User\lawcategories;
use App\Model\User\news;
use App\Model\User\like;
use App\Model\User\categories;
use App\Model\User\tags;
use App\Model\User\Gassette;
use App\Model\Lawyer\Lawyer;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\contactUs;
use App\Model\message;
use App\User;

class PageController extends Controller
{
    public function index()
    {
        $lawyr = Lawyer::where('checked', 1 );
        $lawyers = $lawyr->whereHas('ratings', function($query) {
            $query->selectRaw('AVG(rating) rt, rateable_id')->groupBy('rateable_id')->orderBy('rt','desc');
        })->take(10)->get();//fetch top rated lawyers from database to show in homepage
        $categories = lawcategories::all();//fetch law categories to them in home page
        $newsrecents = news::orderBy('created_at','DESC')->paginate(8);//show all laws in the front end as 8 laws in one page
        return view('main.home',compact('newsrecents','categories','lawyers'));//bind all the variables to home page
    }

    public function laws()
    {
        $laws = laws::orderBy('created_at','DESC')->paginate(8);//show all laws in the front end as 8 laws in one page
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        return view('main.staticlaws',compact('laws','lawtags','lawcategories'));
    }

    public function news(news $news)//render the relevant news to the front end
    {
        $recents = news::orderBy('updated_at','desc')->limit(5)->get();//to show recent news on the side bar
        $categories = categories::all();
        $tags = tags::all();
        return view('main.newspage',compact('news','categories','tags','recents'));
    }

    public function lawcontent(laws $laws)//render the relevant law to the front end
    {
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        return view('main.lawpage',compact('laws','lawtags','lawcategories'));
    }

    public function tag(tags $tags)//render all the news with same tags to the front end
    {
        $category = categories::all();
        $tag = tags::all();
        $news = $tags->news();
        return view('main.cattags',compact('news','category','tag'));
    }

    public function category(categories $categories)//render all the news with same category to the front end
    {
        $category = categories::all();
        $tag = tags::all();
        $news = $categories->news();
        return view('main.cattags',compact('news','category','tag'));
    }

    public function lawtag(lawtags $lawtgs)//render all the laws with same tags to the front end
    {
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        $laws = $lawtgs->laws();
        return view('main.lawcattags',compact('laws','lawcategories','lawtags'));
    }

    public function lawcategory(lawcategories $lawcategry)//render all the laws with same category to the front end
    {
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        $laws = $lawcategry->laws();
        return view('main.lawcattags',compact('laws','lawcategories','lawtags'));
    }

    public function lawsearch(Request $request)
    {
        $lawcategories = lawcategories::all();//get all law categories to pass to the blade
        $lawtags = lawtags::all();//get all lawtags to pass to the blade
        $laws = laws::lawsearch($request->keyword);//call to the lawsearch function in laws model with keyword in the request
        return view('main.lawcattags',compact('laws','lawcategories','lawtags'));//bind all the variables with blade
    }

    public function newsearch(Request $request)
    {
        $category = categories::all();//get all news categories to pass to the blade
        $tag = tags::all();//get all news tags to pass to the blade(here tags means sub categories)
        $news = news::newsearch($request->keyword);//call to the newsearch function in news model with keyword in the request
        return view('main.cattags',compact('news','category','tag'));//bind all the variables with blade
    }

    public static function getLawyers()//render search page
    {
    	$lawyers = DB::table('lawyers')->where('checked',1)->get();
        return view('main.search',['lawyers'=>$lawyers]);
    
    }

    public static function reg()//render register page
    {
        return view('main.register');
    
    }

    public function contactUs(){//render contact us page
        return view('main.contactus');
    }

    public static function getaboutUs()//render about us page
    {
        return view('main.aboutUs');
    }
    
    public function contactUsSave(Request $request){//contact us page form details are saved from here
        $name=$request->get('name');
        $email=$request->get('email');
        $subject=$request->get('subject');
        $message=$request->get('message');
        $txt=new contactUs(['name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message]);
        $txt->save();
        return redirect()->back()->with('message','your message has been sent.....');
    }

    public static function getdownloads()//function for render the form download page
    {
        return view('main.downld');
    }

    public function get()//function for chat messages not finished yet
    {
        $lawyr = Lawyer::where('checked', 1 );
        $contacts = $lawyr->whereHas('ratings', function($query) {
            $query->selectRaw('AVG(rating) rt, rateable_id')->groupBy('rateable_id')->orderBy('rt','desc')->limit(8);
        })->get();
        return response()->json($contacts);
    }

    public function chat()//function for chat messages not finished yet
    {
        return view('main.chat');
    }
    public function vediochat()//function for vedio chat not finished yet
    {
        return view('main.vediochat');
    }

    public function getMessagesFor($id)//function for chat messages not finished yet
    {
        $messages = message::where('from',$id)->orWhere('to',$id)->get();
        return response()->json($messages);
    }

    public function send(Request $request)//function for chat messages not finished yet
    {
        $message = message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        return response()->json($message);
    }

    public function gassette()
    {
        $gassettes = Gassette::orderBy('created_at','DESC')->paginate(12);//gazzetes render to a page as the newly created on is first and 12 gazzetes per one page
        return view('main.gassette',compact('gassettes'));
    }

    public function gassetteView($id)//pass the gazzetes' id as the parameter to the function
    {
        $gassette = Gassette::where('id',$id)->first();//fetch the relevant gazzete from database and return it to the blade
        return view('main.gassetteView',compact('gassette'));//render the blade file to see the gazzete in detail
    }

}