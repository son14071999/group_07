<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Binhluan;
use App\forum;
use App\User;
use Auth;
use Validator;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');// phai dang nhap moi duoc vao
    }
    public function addComment(Request $request, Forum $forum){// comment
    	 $validatedData = $request->validate([
        'content' => 'required|min:5',
        
    	]);
    	 
    	 $comment=new Binhluan();
	    $comment->user_id = Auth::user()->id;
	    $comment->content=$request->content;

	    $forum->comments()->save($comment);// 
	    
   		 return back()->withInfo('comment success!');
    }

    public function replyComment(Request $request, Binhluan $comment ){// tra loi comment
    	 $validatedData = $request->validate([
        'content' => 'required|min:5',
        
    	]);

    	 $reply=new Binhluan();
	    $reply->user_id = Auth::user()->id;
	    $reply->content=$request->content;

	    $comment->comments()->save($reply);// 

   		 return back()->withInfo('reply success!');
    }
}
