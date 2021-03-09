@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật danh mục
                <a href="{{route('category.index')}}" class="float-right"><i class="bi-backspace-fill" style="font-size: 18px;"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{route('category.update',[$category_edit->category_id])}}" method="POST" >
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control text-center" name="title_category" id="title_category" value="{{$category_edit->category_title}}">
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-outline-success w-100 mt-2">Cập nhật</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection