@extends('welcome')
@section('content')
<div class="single">
		<div class="container">
				<div class="single-top">
						<a href="#"><img class="img-responsive" src="{{URL::to('public/upload/post/'.$post->post_image)}}" width="100%" height="350px" alt=" "></a>
					<div class=" single-grid">
						<h2>{{$post->post_title}}</h2>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Super user</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i>{{$post->created_at}}</span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Views:{{$post->post_view}}</span></li>
		  					</ul>		  						
						{!!$post->post_content!!}
					</div>
					<div class="comments heading">
						<h3>Comments</h3>
						<div class="media">
					      	<div class="media-body">
						        <h4 class="media-heading">	Richard Spark</h4>
						        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
					      	</div>
					      <div class="media-right">
					        <a href="#">
								<img src="{{asset('images/si.png')}}" alt="">
					      </div>
					 </div>
					  <div class="media">
					      <div class="media-left">
					        <a href="#">
					        	<img src="{{asset('images/si.png')}}" alt="">
					        </a>
					      </div>
					      <div class="media-body">
					        <h4 class="media-heading">Joseph Goh</h4>
					        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
					      </div>
					    </div>
    				</div>
    				<div class="comment-bottom heading">
    					<h3>Leave a Comment</h3>
    					<form>	
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
						<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
						<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
							<input type="submit" value="Send">
					</form>
    				</div>
				</div>	
			</div>					
	</div>
    @endsection