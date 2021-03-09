@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href="{{route('category.index')}}" class="btn btn-success w-100 mb-2">CATEGORIES</a>
                   <a href="{{route('post.index')}}" class="btn btn-warning w-100 mb-2">POSTS</a>
                   <a href="" class="btn btn-danger w-100 mb-2">Add Category Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
