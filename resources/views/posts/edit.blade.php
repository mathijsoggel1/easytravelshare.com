@extends('layouts.app')

@section('content')
<div class="container"><h1>Edit {{ $post->title }}</h1>

<!-- if there are creation errors, they will show here -->

<form action="{{url('posts', [$post->id])}}" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
     <div class="form-group">
        <label for="name">Post title</label>
        <input type="text" value="{{$post->title}}" class="form-control" id=""  name="title" >
      </div>

      <div class="form-group">
        <label for="name">Post header image</label>
        <input type="file"  class="form-control" id=""  value="{{$post->headerimg}}" name="headerimg" >
      </div>

      <div class="form-group">
        <label for="name">Content</label>
        <textarea rows="5" type="text" class="form-control" id=""  name="content" >{{$post->content}}</textarea>
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