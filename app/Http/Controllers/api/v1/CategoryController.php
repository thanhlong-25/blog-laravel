<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

class CategoryPostsController extends Controller
{
   
    public function index()
    {
        $category = Category::all();
        return view('category.index')->with(compact('category'));
    }
    
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_title = $request->title_category;
        $category->save();
        return redirect()->route('category.index')->with('success', "Thêm thành công");
        
    }

   
    public function show($category_id)
    {
        $post = Post::where('category_id', $category_id)->get();
        $category = Category::all();
        $category_title = Category::where('category_id', $category_id)->select('category_title')->first();
        return view('pages.category')->with(compact('post','category', 'category_title'));
    }

    
    public function edit($categoryPosts)
    {
        $category_edit = Category::find($categoryPosts);
        return view('category.edit')->with(compact('category_edit'));
    }

   
    public function update(Request $request,$categoryPosts)
    {
        $data = $request->all();
        $category = Category::find($categoryPosts);
        $category->category_title = $data['title_category'];
        $category->save();
        return redirect()->route('category.index')->with('success', "Cập nhật thành công");
    }

    public function destroy($categoryPosts)
    {
        $category = Category::find($categoryPosts);
        $category->delete();
        return redirect()->back();
    }
}
