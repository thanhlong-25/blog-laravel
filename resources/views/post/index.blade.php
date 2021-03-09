@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button data-toggle="modal" data-target="#add_Modal" class="btn btn-outline-primary btn-sm">Thêm bài viết</button>
                    <a href="{{url('/dashboard')}}" class="float-right"><i class="bi-backspace-fill" style="font-size: 18px;"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session() -> get('success')}}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session() -> get('error')}}
                    </div>
                    @endif

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 10%">Title</th>
                                <th style="width: 10%">Category</th>
                                <th style="width: 15%">Image</th>
                                <th style="width: 10%">Description</th>
                                {{-- <th style="width: 40%">Content</th> --}}
                                <th style="width: 5%">View</th>
                                <th style="width: 10%" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $key => $post_value)
                            <tr>
                                <th>{{$post_value->post_id}}</th>
                                <td>{{$post_value->post_title}}</td>
                                <td>{{$post_value->category->category_title}}</td>
                                <td><img src="{{URL::to('public/upload/post/'.$post_value->post_image)}}" height="100px" width="150px"></td>
                                <td>{{$post_value->post_desc}}</td>
                                {{-- <td>{!!$post_value->post_content!!}</td> --}}
                                <td>{{$post_value->post_view}}</td>
                                <td><a href="{{route('post.edit',[$post_value->post_id])}}" class="btn btn-sm btn-outline-warning">Edit</a></td>
                                <td>
                                    <form action="{{route('post.destroy',[$post_value->post_id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$post->links()}}
    </div>
    

    <!-- Modal Add-->
    <div class="modal fade" id="add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control text-center mt-1" name="title_post" id="title_post" placeholder="Nhập tên bài viết">
                        <select name="category_id" class="form-control mt-1 text-center" id="selector" >
                            @foreach($category as $key => $category_value)
                                <option value="{{$category_value->category_id}}" >{{$category_value->category_title}}</option>
                            @endforeach
                        </select>
                        <textarea type="text" class="form-control text-center mt-1" rows="5" name="desc_post" id="desc_post" placeholder="Nhập mô tả"></textarea>
                        <textarea type="text" class="form-control text-center mt-1" rows="10" name="content_post" id="content_post" placeholder="Nhập nội dung"></textarea>
                        <input type="file" class="form-control text-center mt-1" name="image_post" id="image_post" accept="image/*" onchange="loadFile(event)">
                        <img src="{{URL::to('public/images/none_image.png')}}" class="mt-5" id="output" height="350px" width="100%">
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-outline-success w-100 mt-2">Thêm</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
