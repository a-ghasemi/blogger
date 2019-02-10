<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Cache;

class HomeController extends Controller
{
    public function Posts(){
        $posts = Post::orderBy('id','asc')->paginate(10);
        return view('posts')->with('posts',$posts);
    }

    public function FetchPosts(){
        Artisan::call('fetch:posts');
        return back();
    }

    public function FetchComments(){
        Artisan::call('fetch:comments');
        return back();
    }

    public function onePost($id){
        $post = Cache::has("post_{$id}") ? Cache::get("post_{$id}"): Post::findOrFail($id);
        Cache::put("post_{$id}",$post);

        return view('one_post',['post'=>$post]);
    }

    public function addComment(Request $request){
        Comment::create($request->all());
        return back();
    }

}

