@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <center><span class="text-muted">
                                            Join 100+ travelers  🌍 sharing their stories around the world
                                        </span></center>
                    <br>
                    EasyTravelShare.com lets you create your own one-page blog in just a minute! This will allow you to share your experiences while traveling with your friends and family from everywhere in the world.<br><br>
                    <p style="line-height: 2;">
                    👋 Create a short introduction about your trip.<br>
                    📈Automatically generated statistics  <br>
                    📝 Write blog updates<br>
                    🌍 Create an automatic timeline <br>
                    🆓 Add up to 10 posts for free<br>
                    ⭐️ Pay a yearly fee for premium<br>
                    </p>
                    <hr/>
                   <center><span class="text-muted"> The next step is to go ahead and create your personal page!</span></center>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form method="POST" action="{{ route('register') }}">
               @csrf
            <div class="card">

                <div class="card-body">
                    <h4>Register profile</h4>
                    <hr/>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Becomes your profile url">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
               
                          
                                

                               


                      </div>
            </div>
            <br>
                <div class="card">
                    <div class="card-body">
                         <h4>Page information</h4>
                    <hr/>
                        <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label text-md-right">{{ __('Trip name') }}
                            </label>

                            <div class="col-md-7">
                                <input id="triptitle" type="text" class="form-control" name="trip_name" required placeholder="e.g. Surfsafari Bali 2019">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label text-md-right">{{ __('Trip introduction') }}
                            </label>

                            <div class="col-md-7">
                                <input id="bio" type="text" class="form-control" name="bio"  rows="5" placeholder="Exlain shortly what your trip is about">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label text-md-right">{{ __('Trip start date') }}
                            </label>
                            <?php
                            $todaydate = date('Y-m-d');
                            $date1 = str_replace('-', '/', $todaydate);
                            $nextdate  = date('Y-m-d',strtotime($date1 . "+7 days"));;
                            ?>
                            <div class="col-md-7">
                                <input id="startdate" type="date" class="form-control" name="trip_start" value="{{$todaydate}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Trip end date') }}
                            </label>

                            <div class="col-md-7">
                                <input id="enddate" type="date" class="form-control" name="trip_end" value="{{$nextdate}}"  required>
                            </div>
                        </div>

                    


                        


                       
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-body">
                         @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-chevron-circle-right"></i> {{ __('Create your page
                                    ') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                        

                </form>
                    
                
        </div>
    </div>
</div>
@endsection

