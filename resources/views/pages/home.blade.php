@extends('welcome')
@section('content')
	<!--banner-starts-->
	@include('pages.banner');
	<!--banner-end-->
    <div class="about">
		<div class="container">
			<div class="about-main">
			<div class="col-md-8 about-left">
				<div class="about-tre">
				 @foreach($post as $key => $post_value)
                    <div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="{{route('post.show',[$post_value->post_id, 'sl'=>Str::slug($post_value->post_title)])}}"><img src="{{URL::to('public/upload/post/'.$post_value->post_image)}}" height="250px" alt="{{Str::slug($post_value->post_title)}}"/></a>
								<h6>Find The Most</h6>
								<h3><a href="{{route('post.show',[$post_value->post_id, 'sl'=>Str::slug($post_value->post_title)])}}">{{$post_value->post_title}}</a></h3>
								<p>{{substr($post_value->post_desc, 0, 200)}}...</p>
								<label>{{$post_value->created_at}}</label>
							</div>
						</div>
                @endforeach
				</div>
				{{$post->links()}}
			</div>
			
				<div class="col-md-4 about-right heading">
					<div class="abt-2">
						<h3>BÀI VIẾT XEM NHIỀU</h3>
						@foreach($most_viewed_post as $key => $most_viewed_post)
							<div class="might-grid">
								<div class="grid-might">
									<a href="{{route('post.show',[$most_viewed_post->post_id, 'sl'=>Str::slug($most_viewed_post->post_title)])}}"><img src="{{URL::to('public/upload/post/'.$most_viewed_post->post_image)}}" height="80px" width="100px" alt="{{Str::slug($post_value->post_title)}}"></a>
								</div>
								<div class="might-top">
									<h4><a href="{{route('post.show',[$most_viewed_post->post_id, 'sl'=>Str::slug($most_viewed_post->post_title)])}}">{{$most_viewed_post->post_title}}</a></h4>
									<p>{{substr($most_viewed_post->post_desc, 0, 100)}}...</p> 
								</div>
								<div class="clearfix"></div>
							</div>
						@endforeach							
					</div>
					<div class="abt-2">
						<h3>ARCHIVES</h3>
						<ul>
							<li><a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </a></li>
							<li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
							<li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
							<li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
							<li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
							<li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
							<li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li>
						</ul>	
					</div>
					<div class="abt-2">
						<h3>NEWS LETTER</h3>
						<div class="news">
							<form>
								<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
@endsection
