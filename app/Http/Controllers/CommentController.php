<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

   

    // public function stores(Request $request)
    // {
       
    //     $comment = new Comment;
    //     $comment->body = $request->get('comment_body');
    //     $comment->user_id = Auth::user()->id;
    //     $posts = Post::find($request->get('post_id'));
    //     $posts->comments()->save($comment);

    //     return view('show', compact('post'));
    // }
    public function store(Request $request)
    {
       
        $data = array();
        $data["body"] = $request->comment_body;
        $data["user_id"] = Auth::user()->id;
        $data["commentable_id"] = $request->post_id;
        $data["created_at"] = Carbon::now();
        $data["updated_at"] = Carbon::now();

        DB::table("comments")->insert($data);

        
        return redirect()->back()->with('success',"คอมเมนต์สำเร็จ");
    }

}
