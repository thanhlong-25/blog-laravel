@extends('welcome')
@section('content')
<div class="single">
		<div class="container">
				<div class="about-one">
				<h1>Kết quả tìm kiếm</h1>
				</div>
				<div class="about-tre">
                @foreach($search as $key => $search_value)
                    <div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="{{route('post.show',[$search_value->post_id, 'sl'=>Str::slug($search_value->post_title)])}}"><img src="{{URL::to('public/upload/post/'.$search_value->post_image)}}" height="350px" alt="{{Str::slug($search_value->post_title)}}"/></a>
								<h6>Find The Most</h6>
								<h3><a href="{{route('post.show',[$search_value->post_id, 'sl'=>Str::slug($search_value->post_title)])}}">{{$search_value->post_title}}</a></h3>
								<p>{{$search_value->post_desc}}</p>
								<label>{{$search_value->created_at}}</label>
							</div>
						</div>
                @endforeach
						</div>
					</div>				
	</div>
    @endsection