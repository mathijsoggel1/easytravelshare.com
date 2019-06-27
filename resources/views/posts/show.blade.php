@extends('layouts.app')

@section('content')
<br>
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-body">
                	 <h3>{{$post->title}}<br><small style="font-size: 15px;"> by {{$post->user->name}}</small></h3>
                	@if($post->headerimg != 'empty')
                	<img src="/images/{{$post->headerimg}}" class="img-fluid" alt="avatar" style="border-radius: 2px;">
                	@endif
					<p style="text-align: justify;">
					{!! $post->content !!}
					</p>

					<div class="row">
						<div class="col">
							<a href="/users/{{$post->user_id}}" class="btn btn-outline-secondary btn-sm">Back to profile</a>
						</div>
						<div class="col text-muted"><center>Published: <strong>{{$post->created_at->diffForHumans()}}</strong></center></div>
						<div class="col" style="text-align: right;">
							
							<!-- AddToAny BEGIN -->
								<div class="a2a_kit a2a_kit_size_23 a2a_default_style">
									<a class="a2a_button_facebook"></a>
									<a class="a2a_button_twitter"></a>
									<a class="a2a_button_whatsapp"></a>
									<a class="a2a_button_telegram"></a>
								</div>
								<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->


						</div>
					</div>
				</div>
			</div><br>

			
			@guest
		  @else<a href="/posts/{{$post->id}}/edit" class="btn btn-outline-warning btn-sm"><i class="far fa-edit"></i> Edit post</a>
		  @endguest
		  @guest
				@else<br><br>
			    <form action="{{url('posts', [$post->id])}}" method="POST">
		           <input type="hidden" name="_method" value="DELETE">
		           <input type="hidden" name="_token" value="{{ csrf_token() }}">
		           <button type="submit" class="btn btn-outline-danger btn-sm" /><small><i class="fas fa-trash"></i> Delete post</small></button>
		        </form>
		        @endguest
		</div>
	</div>
</div>

@endsection