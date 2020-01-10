<?php

namespace App\Http\Controllers;

use App\forum;
use Illuminate\Http\Request;
use App\theloaide;
use App\dethi;
use App\User;
use App\Tag;
use App\view;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;
session_start();
use DB;
class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

     public function __construct()
    {
        $this->middleware('auth')->except('index','show');// phai dang nhap moi duoc vao
    }
    public function index()
    {
         $theloai = theloaide::take(7)->get();
         $forums = forum::orderBy('id','desc')->paginate(5);
        return view('forum.index', compact('forums','theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=tag::all();
        $theloai = theloaide::take(7)->get();
        return view('forum.create', compact('theloai','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required|min:5',
            'description'=>'required|min:5',
            'tags'=>'required',
            
        ]);
        $forums = new forum();
        $forums->user_id = Auth::user()->id;
        $forums->title = $request->title;
        $forums->slug = Str::slug($request->title);
        $forums->description = $request->description;
        $forums->save();
        $forums->tags()->sync($request->tags);
       // Session::put('massage',' add category exam success!');
        return redirect('/forum')->withInfo(' chuc mung ban tao toppic thanh cong!');// tao sesstion ten info
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show($slug,Request $request)
    {
         $theloai = theloaide::take(7)->get();
         $user = User::all();
        $forums=forum::where('id', $slug)->orWhere('slug', $slug)->firstOrFail();
        //views($forums)->record();

      //  $sessionView = Session::get($sessionKey);
        // $post = view::findOrFail($forums->id);
        // if (!$sessionView) { //nếu chưa có session
        //     Session::put($sessionKey, 1); //set giá trị cho session
        //     $post->increment('views');
        // }
         $view=new view();
        // if(!$request->session()->has('user')){
        //    // $sessionView=$request->session()->get('user');
        //     //echo $sessionView;
           
        //     $view->visitor_id = Auth::user()->id;
        //     $view->post_id=$forums->id;
        //     $view->save();
        //     echo $request->session()->get('user');

        // }else{
        //    $sessionView= $request->session()->put('client', rand(1,1000));
          
        //     $view->visitor_id=getdate()['seconds'].rand(1000,3000);
        //     $view->post_id=$forums->id;
        //     $view->save();
        //     echo $sessionView;

        // }
         if($request->session()->get('user')!=0){
            $view->visitor_id = Auth::user()->id;
            $view->post_id=$forums->id;
            $view->save();
           // echo $request->session()->get('user');
         }else{
            $view->visitor_id=getdate()['seconds'].rand(1000,3000);
            $view->post_id=$forums->id;
            $view->save();
         }
         

         //$soview=view::groupBy('visitor_id')->having('post_id',$forums->id)->count();
         $soview =view::
                select(array('visitor_id','post_id', DB::raw('COUNT(visitor_id) as views')))
                ->where('post_id',$forums->id)
                ->groupBy('visitor_id')
                ->get();
                
                
        //echo count($soview);
         // echo "<pre>";
         // print_r($soview);
         // echo "</pre>";
        
        //echo getdate()['seconds'];
       return view('forum.show', compact('forums', 'theloai','user','soview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = tag::all();
         $theloai = theloaide::take(7)->get();
        $forum = forum::find($id);
        // echo "<pre>";
        // print_r($forum);
        // echo "</pre>";
        return view('forum.edit', ['forum'=>$forum,'theloai'=>$theloai,'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|min:5',
            'description'=>'required|min:5',
            'tags'=>'required',
            
        ]);
        $forums = forum::find($id);
        $forums->user_id = Auth::user()->id;
        $forums->title = $request->title;
        $forums->slug = Str::slug($request->title);
        $forums->description = $request->description;

        $forums->save();
        $forums->tags()->sync($request->tags);
        return redirect('/forum')->withInfo(' chuc mung ban sua toppic thanh cong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(forum $forum)
    {
        //
    }
}
