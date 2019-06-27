<div class="col-md-3">

			<ul class="list-ic vertical">
			<?php $i = 1; ?>
			@if($user->stop->isEmpty())
			<br>
			<center style="color: #aaa;">
				No stops added yet
				
			</center>
			@endif
			@foreach($user->stop as $stop)
			
			<?php 
				$current_date = date("Y-m-d");
				$stop_date = substr($stop->arrival, 0,10)
				
			?>
			
	
			
			<li 
			
			@if($stop_date <= $current_date )
				class="activecity"
			@endif
			>
			
			<div class="row"> 
				<div class="col-md"> <span>{{$i}}</span> <strong style="font-size: 16px;">{{$stop->name}} 
					
					<i class="flag-icon flag-icon-{{strtolower($stop->countrycode)}}"></i> 
					
					</strong>
									
					<br> 

					<b style="padding-left: 40px; font-size: 12px; font-weight: lighter;">
						{{$stop->arrival->toFormattedDateString()}} - {{$stop->arrival->diffForHumans()}}
					</b>
				</div>
				  @auth
				  @if(Auth::user()->id == $user->id)
				<div class="col-md-1"> 
					<a style="margin-top:10px;" data-toggle="modal" data-target="#modal{{$stop->id}}editstop" class="btn btn-sm btn-outline-warning" style="color:#000;"><small><i class="far fa-edit"></i></small></a>
				
					<br>
					<form action="{{url('stops', [$stop->id])}}" method="POST">
		           <input type="hidden" name="_method" value="DELETE">
		           <input type="hidden" name="_token" value="{{ csrf_token() }}">
		           <button type="submit" class="btn btn-outline-danger btn-sm" style="margin-top:10px;" /><small><i class="fas fa-trash"></i></small></button>
		        </form></div>
		        @endif
		        @endauth
		    </div><br>
			</li>
			<?php $i++;  ?>
			
			@endforeach<br>
		</ul>
			@auth
			@if(Auth::user()->id == $user->id)
			<center><a data-toggle="modal" data-target="#modal{{$user->id}}addStop" class="btn btn-outline-success btn-lg"><i class="fas fa-plus"></i> Add stop</a></center>
			@endif
		@endauth

		
			</div>