<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
    $posts = Post::all();
    $posts = DB::table('posts')
        ->leftjoin('users', 'posts.user_id' , '=', 'users.id')
        ->select('posts.*', 'users.name')
        ->get();
        return view('\posts\post', compact('posts'));
    }

    public function userindex(){
        $posts = Post::where('user_id', Auth::user()->id)
        ->leftjoin('users', 'posts.user_id' , '=', 'users.id')
        ->select('posts.*', 'users.name')
        ->get();
        return view('\posts\userpost', compact('posts'));
    }

    // public function stores(Request $request){

    //     $data = array();
    //     $data["body"] = $request->name_body;
    //     $data["user_id"] = Auth::user()->id;

    //     DB::table("posts")->insert($data);

    //     return redirect()->route('index');
    // }

    public function store(Request $request)
    {
        $posts =  new Post;
        $posts->user_id = Auth::user()->id;
        $posts->body = $request->get('body');
        
        $posts->save();

        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");
    }
    

        public function show($id)
    {
        $posts = Post::find($id);
        
        return view('\posts\show', compact('posts'));
    }

    public function delete($id){
        $delete = Post::find($id)->delete();
        return redirect()->route('delete')->with('success',"ลบโพสต์สำเร็จ");
    }
}