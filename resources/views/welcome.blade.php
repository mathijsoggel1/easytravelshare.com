@extends('layouts.app')
<style>
.row{width: 100% !important; padding: 0px !important; margin: 0px !important;}
body{background: #fafafa !important;}
.card{background: rgb(245, 245, 245) !important; border-color: none; border-radius: 0px;
}
</style>
@section('content')


<div class="row no-gutters" >
    <div class="col-md-6">
      <img src="{{ URL::to('/') }}/images/home.jpg" class="img-fluid">
    </div>
    <div class="col-md-6 " style="background: #f5f5f5;">
    <div style="padding: 20px;">
     <center> <img src="{{ asset('images/ets_logo.png') }}" class="img-fluid" width="120px;"> 
      <strong style="font-size: 28px; ">EasyTravelShare</strong></center>
      <br><br>
       <p style="font-size: 18px; padding-right: 35px; padding-left: 20px; line-height: 2.4;">EasyTravelShare lets you create a personal travel one-page blog in just a minute! You can use this to keep your friends and family up-to-date about your travels. No coding required and works with all kinds of cool features out of the box!</p>
    
      <br>
      @guest
        <center>
          <a class="btn btn-outline-primary home-page-main-btn" style="" href="{{ route('register') }}">
            <i class="fas fa-plane-departure"></i> Create your page
          </a>
        </center>
      @else
        <center>
          <a class="btn btn-outline-secondary home-page-main-btn" style="" href="\profile\{{ Auth::user()->name }}">
            Go to your profile
         </a>
        </center>
      @endguest
        </div>
      </div>
 
</div>

<br>

<br>
<style>
	
</style>
<div class="container how-it-works">

   <h2 style="padding-left: 15px;">Getting started in 3 easy steps</h2><br>
    <div class="row justify-content-center"  >

                <div class="col-md">
                      <img src="{{ URL::to('/') }}/images/1_signup.jpg" class="img-fluid how-it-works-img" style=""><br><br>
                      <h4> 1. Create your profile</h4><br>
                      <p>In almost less then one minute you can create your own personal blog.</p>
                    
                </div>

                <div class="col-md">
                  <img src="{{ URL::to('/') }}/images/2_write.jpg" class="img-fluid how-it-works-img" ><br><br>
                      <h4> 2. Write your first blog post</h4><br>
                      <p>Add images and text to write a blog post to keep your friends and family updated</p>
                </div>

                <div class="col-md">
                  <img src="{{ URL::to('/') }}/images/3_share.jpg" class="img-fluid how-it-works-img"  ><br><br>
                      <h4> 3. Share with the world</h4><br>
                      <p>Share your profile and blog in an instagram story or via whatsapp to your friends.</p>
                    
                </div>

                 

</div>
<hr/>

<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-body" style="background: #fff;">
        <a href="/jane-doe" target="_blank"><img src="{{ URL::to('/') }}/images/example_profile.png" class="img-fluid homepage-example"></a>
      </div>
  </div>
  </div>
  <div class="col-md-5">
    <h2>How it works</h2>
    <p>
      EasyTravelShare.com lets you create your own blog in just 1 minute! This will allow you to share your experiences while traveling with your friends and family. The example profile shows how your page could look. 
    </p>

    <p>
      👋 In the left collumn you can add an introduction to your trip. This part of the page will also show some details and statistics for your profile. 
      <br><br>
      📝 The middle collumn shows your blog updates. While on the road you can easily create, edit and delete these posts. Just add a title, image and some text to let everybody know how you are doing! 
      <br><br>
      🌍 The right collumn shows an overview of all the places you plan to visit. When you add the expected arrival dates this timeline will update automatically. Your friends and family can see in a glance where you are
       </p>
    <p>The next step is to create your personal page today!</p>
      <a href="/regiser" class="btn btn-primary">Join now</a>
  </div>
  </div>
</div>
<br>

<div class="container" style="display: none;;">
  <div class="row">
      <div class="col-8 offset-2" style="text-align: center;">
        <hr/>
        <h3 style="padding-top: 20px;">Create a digital bridge between your travels and home</h3>
        <p>Start your free page today!</p>
        <a href="/regiser" class="btn btn-primary">Join now</a>


      </div>
  </div>
  </div>
<br><br>

<!--<div class="container">
    <div class="row justify-content-center" >
      
            <center><h3>Example profiles</h3></center>
               <div class="row">
                @foreach($users as $user)
                @if($user->is_private == 0)
                <div class="col-4">
                    <div class="card">
                        
                        <div class="card-body">
                            <h5 class="card-title">{{$user->trip_name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">By user: {{$user->name}}</h5>
                                  <hr>
                                 
                                 <p class="card-text">
                                    @foreach($user->stop as $stop)
                                    <i class="flag-icon flag-icon-{{strtolower($stop->countrycode)}}"></i>
                                    @endforeach
                                 </p>

                                 <p class="card-text">{!! $user->bio !!}</p>

                        </div>
                        <div class="card-footer">
                            <a href="/profile/{{$user->name}}" class="btn btn-primary btn-sm">View profile</a>
                            Leaves: <strong>{{$user->trip_start->diffForHumans()}}</strong>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

 

                 

                 
            

    </div>
</div>
<br>-->
<!--<div class="container">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Leave your email to keep up to date on the development process</h5>
            <div class="typeform-widget" data-url="https://mathijsoggel.typeform.com/to/b9qPJ1" data-transparency="50" data-hide-headers=true data-hide-footer=true style="width: 100%; height: 400px;"></div> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm", b="https://embed.typeform.com/"; if(!gi.call(d,id)) { js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> <div style="font-family: Sans-Serif;font-size: 12px;color: #999;opacity: 0.5; padding-top: 5px;"> powered by <a href="https://admin.typeform.com/signup?utm_campaign=b9qPJ1&utm_source=typeform.com-1194620-Basic&utm_medium=typeform&utm_content=typeform-embedded-poweredbytypeform&utm_term=EN" style="color: #999" target="_blank">Typeform</a> </div>
        </div>
</div>
</div>
<br><br>-->

</div>
@endsection
