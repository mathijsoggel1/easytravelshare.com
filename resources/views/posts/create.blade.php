@extends('layouts.app')

@section('content')
<div class="container"><h1>Create update</h1>

<!-- if there are creation errors, they will show here -->

 <form action="/posts" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
     
     <div class="form-group">
        <label for="name">Post title</label>
        <input type="text"  class="form-control" id=""  name="title" >
      </div>
        <div class="form-group">
        <label for="name">Post header image</label>
        <input type="file"  class="form-control" id="" name="headerimg" >
      </div>

      

      

      <div class="form-group">
        <label for="name">Content</label>
        <textarea rows="5" type="text"  class="form-control" id=""  name="content" ></textarea>
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
    </form>
</div>

@endsection