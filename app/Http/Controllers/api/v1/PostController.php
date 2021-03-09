<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Post;
use App\Models\Category;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class PostController extends Controller
{
    // API

    public function index()
    {
        $post = Post::with('category')->orderBy('post_id', 'DESC')->simplePaginate(2);
        $category = Category::all();
        return view('post.index')->with(compact('post', 'category'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        
        $path_post_image = 'public/upload/post/';

        $post = new Post();
        $post->post_title = $data['title_post'];
        $post->category_id = $data['category_id'];
        $post->post_desc = $data['desc_post'];
        $post->post_content = $data['content_post'];
        $data['created_at'] = new DateTime();
        $get_image = $request->File('image_post');     
        $check_image = $request->hasFile('image_post');  

        if($check_image > 0){
            $today = Carbon::today();  
            $month = $today->monthName;      
            $day = $today->day;

            $get_name_image = $get_image->getClientOriginalName(); //Get name của image tải lên
            $name_image = current(explode('.', $get_name_image)); // tách chuỗi theo dấu chấm nếu không file ảnh sẽ là Gallery.jpg.12.png là ăn
            //$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $new_image = $name_image.'-'.$month.'-'.$day. '-' .mt_rand(). '.' .$get_image->getClientOriginalExtension(); // tên ảnh cuối cùng
            $get_image->move($path_post_image, $new_image);

            $post->post_image  = $new_image;
            $post->save();

            return redirect()->route('post.index')->with('success', "Thêm thành công");
        }else{
            $post->post_image  = "none_image.png";
            $post->save();
            return redirect()->route('post.index')->with('success', "Thêm thành công");
        }
    }

   
    public function show($post)
    {
        $post = Post::find($post);
        $post->post_view += 1;
        $post->save();
        $category = Category::all();
        return view('pages.post')->with(compact('post', 'category'));
    }

    
    public function edit($post)
    {
        $post_edit = Post::find($post);
        $category = Category::all();
        return view('post.edit')->with(compact('post_edit', 'category'));
    }

   
    public function update(Request $request, $post_id)
    {
        $data = $request->all();
        
        $path_post_image = 'public/upload/post/';

        $post = Post::find($post_id);
        $post->post_title = $data['title_post'];
        $post->category_id = $data['category_id'];
        $post->post_desc = $data['desc_post'];
        $post->post_content = $data['content_post'];
        $data['created_at'] = new DateTime();
        $get_image = $request->File('image_post');     
        if($get_image){
            $today = Carbon::today();  
            $month = $today->monthName;      
            $day = $today->day;

            $get_name_image = $get_image->getClientOriginalName(); //Get name của image tải lên
            $name_image = current(explode('.', $get_name_image)); // tách chuỗi theo dấu chấm nếu không file ảnh sẽ là Gallery.jpg.12.png là ăn
            //$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $new_image = $name_image.'-'.$month.'-'.$day. '-' .mt_rand(). '.' .$get_image->getClientOriginalExtension(); // tên ảnh cuối cùng
            $get_image->move($path_post_image, $new_image);

            $post->post_image  = $new_image;
            $post->save();
            return redirect()->route('post.index')->with('success', "Thêm thành công");
        }else{
            $post->save();
            return redirect()->route('post.index')->with('success', "Thêm thành công");
        }
    }

    public function destroy($post)
    {
        $post = Post::find($post);
        $post_image = $post->post_image;
        unlink('public/upload/post/'.$post_image);
        $post->delete();
        return redirect()->back();
    }

}
