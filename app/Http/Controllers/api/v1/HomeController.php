<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class HomeController extends Controller
{
    
    public function index()
    {
        $post = Post::orderBy('created_at', 'DESC')->paginate(4);
        $most_viewed_post =  Post::orderBy('post_view', 'DESC')->limit(3)->get();
        $category = Category::all();
        return view('pages.home')->with(compact('category', 'post', 'most_viewed_post'));
    }

    public function search(Request $request){
        $keyword = $request->key_search;
        $category = Category::all();
        $search = Post::where('post_title', 'like', '%'.$keyword.'%')->get();
        return view('pages.search')->with(compact('search', 'category'));
    
    }
}
