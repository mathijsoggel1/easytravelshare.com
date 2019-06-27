<div class="col-md-5">

	@if($user->post->isEmpty())
			<br>
			<center style="color: #aaa;">No updates added yet</center>
			
	@endif
	
	@foreach($user->post->reverse() as $post)
		
			
			<div class="card" style="width: 100%;">
			  <div class="card-body">

			    <h5 class="card-title">{{$post->title}}</h5>
			    <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at->diffForHumans()}}</h6>
			  @if($post->headerimg != 'empty')
	       	<img src="/images/{{$post->headerimg}}" class="img-fluid" alt="avatar" style="border-radius: 2px;"><br><br>
	      	 @endif
       	<div class="row">
			    <div class="col" style="text-align: center; "><a data-toggle="modal" data-target="#modal{{$post->id}}read" class="btn btn-primary" style="color:#fff;">Read update</a></div>
				@auth
				@if(Auth::user()->id == $user->id)
				<div class="col">
				<a data-toggle="modal" data-target="#modal{{$post->id}}postedit" class="btn btn-outline-warning" >Edit update</a></div>
				<div class="col"><form action="{{url('posts', [$post->id])}}" method="POST">
		           <input type="hidden" name="_method" value="DELETE">
		           <input type="hidden" name="_token" value="{{ csrf_token() }}">
		           <button type="submit" class="btn btn-outline-danger" /><small><i class="fas fa-trash"></i></small></button>
		        </form></div>
		        @endif
		        @endauth

		    </div><!--row-->

			</div><!--card body-->
			
		</div><!--card-->

	
<br>
	@endforeach

	@auth
	@if(Auth::user()->id == $user->id)
	<br>
	<center><a data-toggle="modal" data-target="#modal{{$user->id}}createUpdate" class="btn btn-lg btn-outline-success"><i class="fas fa-plus"></i> Write update</a></center>
	@endif
	@endauth
</div>