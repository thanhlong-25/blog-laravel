@extends('welcome')
@section('content')
<div class="single">
		<div class="container">
				<div class="about-one">
				<h1>{{$category_title->category_title}}</h1>
				</div>
				<div class="about-tre">
                @foreach($post as $key => $post_value)
                    <div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="{{route('post.show',[$post_value->post_id, 'sl'=>Str::slug($post_value->post_title)])}}"><img src="{{URL::to('public/upload/post/'.$post_value->post_image)}}" height="350px" alt="{{Str::slug($post_value->post_title)}}"/></a>
								<h6>Find The Most</h6>
								<h3><a href="{{route('post.show',[$post_value->post_id, 'sl'=>Str::slug($post_value->post_title)])}}">{{$post_value->post_title}}</a></h3>
								<p>{{$post_value->post_desc}}</p>
								<label>{{$post_value->created_at}}</label>
							</div>
						</div>
                @endforeach
						</div>
					</div>				
	</div>
    @endsection