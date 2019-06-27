<div class="col-md-4">

	 <div class="card">
	 	
            <div class="card-body">
            @if($user->avatar != 'empty')
		       <div class="col-8 offset-2"><img src="/images/{{$user->avatar}}" class="img-fluid" alt="avatar" style="border-radius: 4px; margin-bottom: 10px; margin-top: 0px;">
</div>		       		
		      	 @endif
           <center> <h2 class="card-title">
            		{{$user->trip_name}} 
            		<br>
            		<small class="text-muted" style="font-size: 16px;">By {{$user->name}}</small> 
            	</h2></center>
           
            
            	
                <p class="card-text">{!! $user->bio !!}</p>
                
			@if(!empty($user->instagram))
				<a target="_blank" href="http://www.instagram.com/{{$user->instagram}}" class="btn btn-danger">
					<i class="fab fa-instagram"></i> Go to instagram
				</a>
			@endif
            </div>
        </div>
	<div class="card" role="alert" style="margin-top: 10px;">
		<div class="card-body">
			<h4 class="card-title">Travel details</h4>
			<span style="font-size: 30px;">🛫</span> 
			Departure <strong>{{$user->trip_start->diffForHumans()}}</strong> 
			<small>on ({{$user->trip_start->toFormattedDateString()}})</small>
			<br>

			<span style="font-size: 30px;">🛬</span> 
			Return <strong>{{$user->trip_end->diffForHumans()}}</strong> 
			<small>on ({{$user->trip_end->toFormattedDateString()}})</small>
			<br>

			<?php $diff = $user->trip_end->diffInDays($user->trip_start); ?>
			<span style="font-size: 30px;">🗓</span>  Total time away: <strong>{{$diff}}</strong> days.<br>

			@include('includes.continents')

			<?php 
			$countStops = 0; 
			$countrylist = array();
			$continentlist = array();
			?>
			@foreach($user->stop as $stop)
				<?php $countStops++;
				array_push($countrylist, $stop->countrycode);
				array_push($continentlist, country_to_continent($stop->countrycode));
				?>
				
			@endforeach
			<span style="font-size: 30px;">🗺</span> 
			Visiting <strong><?php print_r(count(array_unique($countrylist)))?></strong> 
			@if($countStops != 1)
			countries
			@else
			country
			@endif
			on <strong><?php print_r(count(array_unique($continentlist)))?></strong> 
			@if(count(array_unique($continentlist))!=1)
			continents.
			@else
			continent.
			@endif
			
		</div>
	</div>
		
		
		@auth
		@if(Auth::user()->id == $user->id)
		  <br>
		  <a data-toggle="modal" data-target="#modal{{$user->id}}editUser" class="btn btn-outline-warning btn-lg"><i class="far fa-edit"></i> Edit profile</a>
		  @endif
		  @endauth
	<br>	
</div>
