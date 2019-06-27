@extends('layouts.app')

@section('content')

<br>



<div class="container">

	<div class="row">

		@include('users.info')

		@include('users.blogposts')

		@include('users.stops')

		@include('users.modals')

	</div>
	
</div>

@endsection