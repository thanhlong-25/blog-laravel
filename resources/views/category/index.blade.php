@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button data-toggle="modal" data-target="#add_Modal" class="btn btn-outline-primary btn-sm">Thêm danh mục</button>
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
                                <th style="width: 80%">Title</th>
                                <th style="width: 15%" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $key => $category_value)
                            <tr>
                                <th>{{$category_value->category_id}}</th>
                                <td>{{$category_value->category_title}}</td>
                                <td><a href="{{route('category.edit',[$category_value->category_id])}}" class="btn btn-sm btn-outline-warning">Edit</a></td>
                                <td>
                                    <form action="{{route('category.destroy',[$category_value->category_id])}}" method="POST">
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
                   <form action="{{route('category.store')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control text-center" name="title_category" id="title_category" placeholder="Nhập tên danh mục">
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-outline-success w-100 mt-2">Thêm</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
