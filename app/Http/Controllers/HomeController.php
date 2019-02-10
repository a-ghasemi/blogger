<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function onePost(){
        dd(__FUNCTION__);
    }

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

}

