@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật bài viết
                <a href="{{route('post.index')}}" class="float-right"><i class="bi-backspace-fill" style="font-size: 18px;"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{route('post.update',[$post_edit->post_id])}}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="text" class="form-control text-center mt-1" name="title_post" id="title_post" placeholder="Nhập tên bài viết" value="{{$post_edit->post_title}}">
                        <select name="category_id" class="form-control mt-1 text-center" id="selector" >
                            @foreach($category as $key => $category_value)
                                @if($category_value->category_id == $post_edit->category_id)
                                    <option selected value="{{$category_value->category_id}}" >{{$category_value->category_title}}</option>
                                @else
                                    <option value="{{$category_value->category_id}}" >{{$category_value->category_title}}</option>
                                @endif
                            @endforeach
                        </select>
                        <textarea type="text" class="form-control text-center mt-1" rows="5" name="desc_post" id="desc_post" placeholder="Nhập mô tả">{{$post_edit->post_desc}}</textarea>
                        <textarea type="text" class="form-control text-center mt-1" rows="10" name="content_post" id="content_post" placeholder="Nhập nội dung">{{$post_edit->post_content}}</textarea>
                        <input type="file" class="form-control text-center mt-1" name="image_post" id="image_post" accept="image/*" onchange="loadFile(event)">
                        <img src="{{URL::to('public/upload/post/'.$post_edit->post_image)}}" class="mt-5" id="output" height="400px" width="100%">

                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-outline-success w-100 mt-2">Cập nhật</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection