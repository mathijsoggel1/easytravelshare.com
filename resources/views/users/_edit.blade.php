@extends('layouts.app')

@section('content')
<div class="container"><h1>Edit {{ $user->trip_name }}</h1>

<!-- if there are creation errors, they will show here -->

<form action="{{url('users', [$user->id])}}" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
     <div class="form-group">
        <label for="name">User name</label>
        <input type="text" value="{{$user->name}}" class="form-control" id="username"  name="name"  disabled="">
      </div>

   

      <div class="form-group">
        <label for="name">Email</label>
        <input type="text" value="{{$user->email}}" class="form-control" id="usermail"  name="email" disabled="">
      </div>
      <div class="form-group">
              <label for="name">User avatar</label>
              <input type="file"  class="form-control" id=""  value="{{$user->avatar}}" name="avatar" >
      </div>
      <div class="form-group">
        <label for="name">Trip introduction</label>
        <textarea type="text"  class="form-control" id="usermail"  name="bio" rows="5" >{{$user->bio}}</textarea> 
      </div>

      <div class="form-group">
        <label for="name">Trip name</label>
        <input type="text" value="{{$user->trip_name}}" class="form-control" id="usermail"  name="trip_name" >
      </div>

      <div class="form-group">
        <label for="name">Trip Start</label>
        <input type="date" value="{{substr($user->trip_start, 0,10)}}" class="form-control" id="usermail"  name="trip_start" >
      </div>


      <div class="form-group">
        <label for="name">Trip End</label>
        <input type="date" value="{{substr($user->trip_end, 0,10)}}" class="form-control" id="usermail"  name="trip_end" >
        
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

     <button type="submit" class="btn btn-primary">Submit</button>

</form></div>

@endsection