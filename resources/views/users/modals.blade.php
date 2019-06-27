
<!-- START MODALS -->	
@if($user->post->isEmpty())	
@else
@foreach($user->post->reverse() as $post)
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal{{$post->id}}read">
  <div class="modal-dialog modal-lg">


    <div class="modal-content">
      
    	@if($post->headerimg != 'empty')
       		<img src="/images/{{$post->headerimg}}" class="img-fluid" alt="avatar" style="border-radius: 4px 4px 0px 0px;">
       	@endif
       	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align:right; padding-right:10px;" >
          <span aria-hidden="true" class="text-muted" style="font-size:14px;" >&times; Close</span>
        </button>
       	<div class="container">
       		<h1 style="margin-top: 5px;">{{$post->title}}</h1>
       		<strong>By: {{$post->user->name}}</strong>
       		
       		<hr>
			<p style="text-align: justify;">
				{!! $post->content !!}
			</p>
			
				<div class="row">
            <div class="col">
               <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_23 a2a_default_style" style="text-align: right;;">
                  <a class="a2a_button_facebook"></a>
                  <a class="a2a_button_twitter"></a>
                  <a class="a2a_button_whatsapp"></a>
                  <a class="a2a_button_telegram"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
            </div>
            <div class="col text-muted"><center>Published: <strong>{{$post->created_at->diffForHumans()}}</strong></center></div>
            <div class="col" style="text-align: right;">
              
             
<!-- AddToAny END -->
<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" class="text-muted" style="font-size:14px;" >&times; Close</span>
        </button>


            </div>
          </div>
		<br>
		</div>
    </div>
  </div>
</div>
@endforeach
@endif

@guest
@else

@if($user->post->isEmpty())	
@else



@foreach($user->post->reverse() as $post)
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal{{$post->id}}postedit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	
       	<div class="container">
       		<h1 style="margin-top: 5px;">Edit {{$post->title}}</h1>
       		
       		<hr>
			<p style="text-align: justify;">
				
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

			</p>
			<div class="modal-footer">
				   <input type="hidden" value="{{$user->id}}" class="form-control" id=""  name="user_id" >

     <button type="submit" class="btn btn-primary">Submit</button>

</form>


			</div>
		</div>
    </div>
  </div>
</div>

@endforeach

@endif


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal{{$user->id}}editUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       	<div class="container">
       		<h1 style="margin-top: 5px;">Edit {{ $user->trip_name }}</h1>
       		
       		<hr>
			<form action="{{url('users', [$user->id])}}" method="POST" enctype="multipart/form-data">
			     
			     {{ csrf_field() }}

			     <input type="hidden" name="_method" value="PUT">

			     <div class="form-group text-muted">
			        <label for="name">User name</label>
			        <input  type="text" value="{{$user->name}}" class="form-control" id="username"  name="name" >
			      </div>

			   

			      <div class="form-group text-muted">
			        <label for="name">Email</label>
			        <input  type="text" value="{{$user->email}}" class="form-control" id="usermail"  name="email" >
			      </div>

			      <div class="form-group">
			        <label for="name">User avatar</label>
			        <input type="file" name="avatar"  class="form-control" id=""  value="{{$user->avatar}}"  >
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

			     
			<div class="modal-footer">
				<center><button type="submit" class="btn btn-lg btn-primary">Submit</button></center>
			</form>
			</div>
		</div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal{{$user->id}}createUpdate">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       	<div class="container">
       		<h1 style="margin-top: 5px;">Write new update</h1>
       		
       		<hr>
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

			    
						<div class="modal-footer">
							 <button type="submit" class="btn btn-primary">Submit</button>
			    </form>
			</div>
		</div>
    </div>
  </div>
</div>

@foreach($user->stop as $stop)
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal{{$stop->id}}editstop">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
       	<div class="container">
       		<h1 style="margin-top: 5px;">Edit {{ $stop->name }}</h1>
       		
       		<hr>
			
<form action="{{url('stops', [$stop->id])}}" method="POST">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
     <div class="form-group">
        <label for="name">Stop name</label>
        <input type="text" value="{{$stop->name}}" class="form-control" id=""  name="name" >
      </div>
      <div class="form-group">
        <label for="name">Countrycode</label>
        <select  name="countrycode"  class="form-control" value="{{$stop->countrycode}}" >
  <option value="AF" <?php if($stop->countrycode == "AF"){echo ('selected=""');} ?>>Afghanistan </option>
  <option value="AX" <?php if($stop->countrycode == "AX"){echo ('selected=""');} ?>>Åland Islands</option>
  <option value="AL" <?php if($stop->countrycode == "AL"){echo ('selected=""');} ?> >Albania</option>
  <option value="DZ" <?php if($stop->countrycode == "DZ"){echo ('selected=""');} ?>>Algeria</option>
  <option value="AS" <?php if($stop->countrycode == "AS"){echo ('selected=""');} ?>>American Samoa</option>
  <option value="AD" <?php if($stop->countrycode == "AD"){echo ('selected=""');} ?>>Andorra</option>
  <option value="AO" <?php if($stop->countrycode == "AO"){echo ('selected=""');} ?>>Angola</option>
  <option value="AI" <?php if($stop->countrycode == "AI"){echo ('selected=""');} ?>>Anguilla</option>
  <option value="AQ" <?php if($stop->countrycode == "AQ"){echo ('selected=""');} ?>>Antarctica</option>
  <option value="AG" <?php if($stop->countrycode == "AG"){echo ('selected=""');} ?>>Antigua and Barbuda</option>
  <option value="AR" <?php if($stop->countrycode == "AR"){echo ('selected=""');} ?>>Argentina</option>
  <option value="AM" <?php if($stop->countrycode == "AM"){echo ('selected=""');} ?>>Armenia</option>
  <option value="AW" <?php if($stop->countrycode == "AW"){echo ('selected=""');} ?>>Aruba</option>
  <option value="AU" <?php if($stop->countrycode == "AU"){echo ('selected=""');} ?>>Australia</option>
  <option value="AT" <?php if($stop->countrycode == "AT"){echo ('selected=""');} ?>>Austria</option>
  <option value="AZ" <?php if($stop->countrycode == "AZ"){echo ('selected=""');} ?>>Azerbaijan</option>
  <option value="BS" <?php if($stop->countrycode == "BS"){echo ('selected=""');} ?>>Bahamas</option>
  <option value="BH" <?php if($stop->countrycode == "BH"){echo ('selected=""');} ?> >Bahrain</option>
  <option value="BD" <?php if($stop->countrycode == "BD"){echo ('selected=""');} ?> >Bangladesh</option>
  <option value="BB" <?php if($stop->countrycode == "BB"){echo ('selected=""');} ?> >Barbados</option>
  <option value="BY" <?php if($stop->countrycode == "BY"){echo ('selected=""');} ?> >Belarus</option>
  <option value="BE" <?php if($stop->countrycode == "BE"){echo ('selected=""');} ?> >Belgium</option>
  <option value="BZ" <?php if($stop->countrycode == "BZ"){echo ('selected=""');} ?> >Belize</option>
  <option value="BJ" <?php if($stop->countrycode == "BJ"){echo ('selected=""');} ?> >Benin</option>
  <option value="BM" <?php if($stop->countrycode == "BM"){echo ('selected=""');} ?> >Bermuda</option>
  <option value="BT" <?php if($stop->countrycode == "BT"){echo ('selected=""');} ?> >Bhutan</option>
  <option value="BO" <?php if($stop->countrycode == "BO"){echo ('selected=""');} ?> >Bolivia, Plurinational State of</option>
  <option value="BQ" <?php if($stop->countrycode == "BQ"){echo ('selected=""');} ?> >Bonaire, Sint Eustatius and Saba</option>
  <option value="BA" <?php if($stop->countrycode == "BA"){echo ('selected=""');} ?> >Bosnia and Herzegovina</option>
  <option value="BW" <?php if($stop->countrycode == "BW"){echo ('selected=""');} ?> >Botswana</option>
  <option value="BV" <?php if($stop->countrycode == "BV"){echo ('selected=""');} ?>>Bouvet Island</option>
  <option value="BR" <?php if($stop->countrycode == "BR"){echo ('selected=""');} ?>>Brazil</option>
  <option value="IO" <?php if($stop->countrycode == "IO"){echo ('selected=""');} ?>>British Indian Ocean Territory</option>
  <option value="BN" <?php if($stop->countrycode == "BN"){echo ('selected=""');} ?>>Brunei Darussalam</option>
  <option value="BG" <?php if($stop->countrycode == "BG"){echo ('selected=""');} ?>>Bulgaria</option>
  <option value="BF" <?php if($stop->countrycode == "BF"){echo ('selected=""');} ?>>Burkina Faso</option>
  <option value="BI" <?php if($stop->countrycode == "BI"){echo ('selected=""');} ?>>Burundi</option>
  <option value="KH" <?php if($stop->countrycode == "KH"){echo ('selected=""');} ?>>Cambodia</option>
  <option value="CM" <?php if($stop->countrycode == "CM"){echo ('selected=""');} ?>>Cameroon</option>
  <option value="CA" <?php if($stop->countrycode == "CA"){echo ('selected=""');} ?>>Canada</option>
  <option value="CV" <?php if($stop->countrycode == "CV"){echo ('selected=""');} ?>>Cape Verde</option>
  <option value="KY" <?php if($stop->countrycode == "KY"){echo ('selected=""');} ?>>Cayman Islands</option>
  <option value="CF" <?php if($stop->countrycode == "CF"){echo ('selected=""');} ?>>Central African Republic</option>
  <option value="TD" <?php if($stop->countrycode == "TD"){echo ('selected=""');} ?>>Chad</option>
  <option value="CL" <?php if($stop->countrycode == "CL"){echo ('selected=""');} ?>>Chile</option>
  <option value="CN" <?php if($stop->countrycode == "CN"){echo ('selected=""');} ?>>China</option>
  <option value="CX" <?php if($stop->countrycode == "CX"){echo ('selected=""');} ?>>Christmas Island</option>
  <option value="CC" <?php if($stop->countrycode == "CC"){echo ('selected=""');} ?>>Cocos (Keeling) Islands</option>
  <option value="CO" <?php if($stop->countrycode == "CO"){echo ('selected=""');} ?>>Colombia</option>
  <option value="KM" <?php if($stop->countrycode == "KM"){echo ('selected=""');} ?>>Comoros</option>
  <option value="CG" <?php if($stop->countrycode == "CG"){echo ('selected=""');} ?>>Congo</option>
  <option value="CD" <?php if($stop->countrycode == "CD"){echo ('selected=""');} ?>>Congo, the Democratic Republic of the</option>
  <option value="CK" <?php if($stop->countrycode == "CK"){echo ('selected=""');} ?>>Cook Islands</option>
  <option value="CR" <?php if($stop->countrycode == "CR"){echo ('selected=""');} ?>>Costa Rica</option>
  <option value="CI" <?php if($stop->countrycode == "CI"){echo ('selected=""');} ?>>Côte d'Ivoire</option>
  <option value="HR" <?php if($stop->countrycode == "HR"){echo ('selected=""');} ?>>Croatia</option>
  <option value="CU" <?php if($stop->countrycode == "CU"){echo ('selected=""');} ?>>Cuba</option>
  <option value="CW" <?php if($stop->countrycode == "CW"){echo ('selected=""');} ?>>Curaçao</option>
  <option value="CY" <?php if($stop->countrycode == "CY"){echo ('selected=""');} ?>>Cyprus</option>
  <option value="CZ" <?php if($stop->countrycode == "CZ"){echo ('selected=""');} ?>>Czech Republic</option>
  <option value="DK" <?php if($stop->countrycode == "DK"){echo ('selected=""');} ?>>Denmark</option>
  <option value="DJ" <?php if($stop->countrycode == "DJ"){echo ('selected=""');} ?>>Djibouti</option>
  <option value="DM" <?php if($stop->countrycode == "DM"){echo ('selected=""');} ?>>Dominica</option>
  <option value="DO" <?php if($stop->countrycode == "DO"){echo ('selected=""');} ?>>Dominican Republic</option>
  <option value="EC" <?php if($stop->countrycode == "EC"){echo ('selected=""');} ?>>Ecuador</option>
  <option value="EG" <?php if($stop->countrycode == "EG"){echo ('selected=""');} ?>>Egypt</option>
  <option value="SV" <?php if($stop->countrycode == "SV"){echo ('selected=""');} ?>>El Salvador</option>
  <option value="GQ" <?php if($stop->countrycode == "GQ"){echo ('selected=""');} ?>>Equatorial Guinea</option>
  <option value="ER" <?php if($stop->countrycode == "ER"){echo ('selected=""');} ?>>Eritrea</option>
  <option value="EE" <?php if($stop->countrycode == "EE"){echo ('selected=""');} ?>>Estonia</option>
  <option value="ET" <?php if($stop->countrycode == "ET"){echo ('selected=""');} ?>>Ethiopia</option>
  <option value="FK" <?php if($stop->countrycode == "FK"){echo ('selected=""');} ?>>Falkland Islands (Malvinas)</option>
  <option value="FO" <?php if($stop->countrycode == "FO"){echo ('selected=""');} ?>>Faroe Islands</option>
  <option value="FJ" <?php if($stop->countrycode == "FJ"){echo ('selected=""');} ?>>Fiji</option>
  <option value="FI" <?php if($stop->countrycode == "FI"){echo ('selected=""');} ?>>Finland</option>
  <option value="FR" <?php if($stop->countrycode == "FR"){echo ('selected=""');} ?>>France</option>
  <option value="GF" <?php if($stop->countrycode == "GF"){echo ('selected=""');} ?>>French Guiana</option>
  <option value="PF" <?php if($stop->countrycode == "PF"){echo ('selected=""');} ?>>French Polynesia</option>
  <option value="TF" <?php if($stop->countrycode == "TF"){echo ('selected=""');} ?>>French Southern Territories</option>
  <option value="GA" <?php if($stop->countrycode == "GA"){echo ('selected=""');} ?>>Gabon</option>
  <option value="GM" <?php if($stop->countrycode == "GM"){echo ('selected=""');} ?>>Gambia</option>
  <option value="GE" <?php if($stop->countrycode == "GE"){echo ('selected=""');} ?>>Georgia</option>
  <option value="DE" <?php if($stop->countrycode == "DE"){echo ('selected=""');} ?>>Germany</option>
  <option value="GH" <?php if($stop->countrycode == "GH"){echo ('selected=""');} ?>>Ghana</option>
  <option value="GI" <?php if($stop->countrycode == "GI"){echo ('selected=""');} ?>>Gibraltar</option>
  <option value="GR" <?php if($stop->countrycode == "GR"){echo ('selected=""');} ?>>Greece</option>
  <option value="GL" <?php if($stop->countrycode == "GL"){echo ('selected=""');} ?>>Greenland</option>
  <option value="GD" <?php if($stop->countrycode == "GD"){echo ('selected=""');} ?>>Grenada</option>
  <option value="GP" <?php if($stop->countrycode == "GP"){echo ('selected=""');} ?>>Guadeloupe</option>
  <option value="GU" <?php if($stop->countrycode == "GU"){echo ('selected=""');} ?>>Guam</option>
  <option value="GT" <?php if($stop->countrycode == "GT"){echo ('selected=""');} ?>>Guatemala</option>
  <option value="GG" <?php if($stop->countrycode == "GG"){echo ('selected=""');} ?>>Guernsey</option>
  <option value="GN" <?php if($stop->countrycode == "GN"){echo ('selected=""');} ?>>Guinea</option>
  <option value="GW" <?php if($stop->countrycode == "GW"){echo ('selected=""');} ?>>Guinea-Bissau</option>
  <option value="GY" <?php if($stop->countrycode == "GY"){echo ('selected=""');} ?>>Guyana</option>
  <option value="HT" <?php if($stop->countrycode == "HT"){echo ('selected=""');} ?>>Haiti</option>
  <option value="HM" <?php if($stop->countrycode == "HM"){echo ('selected=""');} ?>>Heard Island and McDonald Islands</option>
  <option value="VA" <?php if($stop->countrycode == "VA"){echo ('selected=""');} ?>>Holy See (Vatican City State)</option>
  <option value="HN" <?php if($stop->countrycode == "HN"){echo ('selected=""');} ?>>Honduras</option>
  <option value="HK" <?php if($stop->countrycode == "HK"){echo ('selected=""');} ?>>Hong Kong</option>
  <option value="HU" <?php if($stop->countrycode == "HU"){echo ('selected=""');} ?>>Hungary</option>
  <option value="IS" <?php if($stop->countrycode == "IS"){echo ('selected=""');} ?>>Iceland</option>
  <option value="IN" <?php if($stop->countrycode == "IN"){echo ('selected=""');} ?>>India</option>
  <option value="ID" <?php if($stop->countrycode == "ID"){echo ('selected=""');} ?>>Indonesia</option>
  <option value="IR" <?php if($stop->countrycode == "IR"){echo ('selected=""');} ?>>Iran, Islamic Republic of</option>
  <option value="IQ" <?php if($stop->countrycode == "IQ"){echo ('selected=""');} ?>>Iraq</option>
  <option value="IE" <?php if($stop->countrycode == "IE"){echo ('selected=""');} ?>>Ireland</option>
  <option value="IM" <?php if($stop->countrycode == "IM"){echo ('selected=""');} ?>>Isle of Man</option>
  <option value="IL" <?php if($stop->countrycode == "IL"){echo ('selected=""');} ?>>Israel</option>
  <option value="IT" <?php if($stop->countrycode == "IT"){echo ('selected=""');} ?>>Italy</option>
  <option value="JM" <?php if($stop->countrycode == "JM"){echo ('selected=""');} ?>>Jamaica</option>
  <option value="JP" <?php if($stop->countrycode == "JP"){echo ('selected=""');} ?>>Japan</option>
  <option value="JE" <?php if($stop->countrycode == "JE"){echo ('selected=""');} ?>>Jersey</option>
  <option value="JO" <?php if($stop->countrycode == "JO"){echo ('selected=""');} ?>>Jordan</option>
  <option value="KZ" <?php if($stop->countrycode == "KZ"){echo ('selected=""');} ?>>Kazakhstan</option>
  <option value="KE" <?php if($stop->countrycode == "KE"){echo ('selected=""');} ?>>Kenya</option>
  <option value="KI" <?php if($stop->countrycode == "KI"){echo ('selected=""');} ?>>Kiribati</option>
  <option value="KP" <?php if($stop->countrycode == "KP"){echo ('selected=""');} ?>>Korea, Democratic People's Republic of</option>
  <option value="KR" <?php if($stop->countrycode == "KR"){echo ('selected=""');} ?>>Korea, Republic of</option>
  <option value="KW" <?php if($stop->countrycode == "KW"){echo ('selected=""');} ?>>Kuwait</option>
  <option value="KG" <?php if($stop->countrycode == "KG"){echo ('selected=""');} ?>>Kyrgyzstan</option>
  <option value="LA" <?php if($stop->countrycode == "LA"){echo ('selected=""');} ?>>Lao People's Democratic Republic</option>
  <option value="LV" <?php if($stop->countrycode == "LV"){echo ('selected=""');} ?>>Latvia</option>
  <option value="LB" <?php if($stop->countrycode == "LB"){echo ('selected=""');} ?>>Lebanon</option>
  <option value="LS" <?php if($stop->countrycode == "LS"){echo ('selected=""');} ?>>Lesotho</option>
  <option value="LR" <?php if($stop->countrycode == "LR"){echo ('selected=""');} ?>>Liberia</option>
  <option value="LY" <?php if($stop->countrycode == "LY"){echo ('selected=""');} ?>>Libya</option>
  <option value="LI" <?php if($stop->countrycode == "LI"){echo ('selected=""');} ?>>Liechtenstein</option>
  <option value="LT" <?php if($stop->countrycode == "LT"){echo ('selected=""');} ?>>Lithuania</option>
  <option value="LU" <?php if($stop->countrycode == "LU"){echo ('selected=""');} ?>>Luxembourg</option>
  <option value="MO" <?php if($stop->countrycode == "MO"){echo ('selected=""');} ?>>Macao</option>
  <option value="MK" <?php if($stop->countrycode == "MK"){echo ('selected=""');} ?>>Macedonia, the former Yugoslav Republic of</option>
  <option value="MG" <?php if($stop->countrycode == "MG"){echo ('selected=""');} ?>>Madagascar</option>
  <option value="MW" <?php if($stop->countrycode == "MW"){echo ('selected=""');} ?>>Malawi</option>
  <option value="MY" <?php if($stop->countrycode == "MY"){echo ('selected=""');} ?>>Malaysia</option>
  <option value="MV" <?php if($stop->countrycode == "MV"){echo ('selected=""');} ?>>Maldives</option>
  <option value="ML" <?php if($stop->countrycode == "ML"){echo ('selected=""');} ?>>Mali</option>
  <option value="MT" <?php if($stop->countrycode == "MT"){echo ('selected=""');} ?>>Malta</option>
  <option value="MH" <?php if($stop->countrycode == "MH"){echo ('selected=""');} ?>>Marshall Islands</option>
  <option value="MQ" <?php if($stop->countrycode == "MQ"){echo ('selected=""');} ?>>Martinique</option>
  <option value="MR" <?php if($stop->countrycode == "MR"){echo ('selected=""');} ?>>Mauritania</option>
  <option value="MU" <?php if($stop->countrycode == "MU"){echo ('selected=""');} ?>>Mauritius</option>
  <option value="YT" <?php if($stop->countrycode == "YT"){echo ('selected=""');} ?>>Mayotte</option>
  <option value="MX" <?php if($stop->countrycode == "MX"){echo ('selected=""');} ?>>Mexico</option>
  <option value="FM" <?php if($stop->countrycode == "FM"){echo ('selected=""');} ?>>Micronesia, Federated States of</option>
  <option value="MD" <?php if($stop->countrycode == "MD"){echo ('selected=""');} ?>>Moldova, Republic of</option>
  <option value="MC" <?php if($stop->countrycode == "MC"){echo ('selected=""');} ?>>Monaco</option>
  <option value="MN" <?php if($stop->countrycode == "MN"){echo ('selected=""');} ?>>Mongolia</option>
  <option value="ME" <?php if($stop->countrycode == "ME"){echo ('selected=""');} ?>>Montenegro</option>
  <option value="MS" <?php if($stop->countrycode == "MS"){echo ('selected=""');} ?>>Montserrat</option>
  <option value="MA" <?php if($stop->countrycode == "MA"){echo ('selected=""');} ?>>Morocco</option>
  <option value="MZ" <?php if($stop->countrycode == "MZ"){echo ('selected=""');} ?>>Mozambique</option>
  <option value="MM" <?php if($stop->countrycode == "MM"){echo ('selected=""');} ?>>Myanmar</option>
  <option value="NA" <?php if($stop->countrycode == "NA"){echo ('selected=""');} ?>>Namibia</option>
  <option value="NR" <?php if($stop->countrycode == "NR"){echo ('selected=""');} ?>>Nauru</option>
  <option value="NP" <?php if($stop->countrycode == "NP"){echo ('selected=""');} ?>>Nepal</option>
  <option value="NL" <?php if($stop->countrycode == "NL"){echo ('selected=""');} ?>>Netherlands</option>
  <option value="NC" <?php if($stop->countrycode == "NC"){echo ('selected=""');} ?>>New Caledonia</option>
  <option value="NZ" <?php if($stop->countrycode == "NZ"){echo ('selected=""');} ?>>New Zealand</option>
  <option value="NI" <?php if($stop->countrycode == "NI"){echo ('selected=""');} ?>>Nicaragua</option>
  <option value="NE" <?php if($stop->countrycode == "NE"){echo ('selected=""');} ?>>Niger</option>
  <option value="NG" <?php if($stop->countrycode == "NG"){echo ('selected=""');} ?>>Nigeria</option>
  <option value="NU" <?php if($stop->countrycode == "NU"){echo ('selected=""');} ?>>Niue</option>
  <option value="NF" <?php if($stop->countrycode == "NF"){echo ('selected=""');} ?>>Norfolk Island</option>
  <option value="MP" <?php if($stop->countrycode == "MP"){echo ('selected=""');} ?>>Northern Mariana Islands</option>
  <option value="NO" <?php if($stop->countrycode == "NO"){echo ('selected=""');} ?>>Norway</option>
  <option value="OM" <?php if($stop->countrycode == "OM"){echo ('selected=""');} ?>>Oman</option>
  <option value="PK" <?php if($stop->countrycode == "PK"){echo ('selected=""');} ?>>Pakistan</option>
  <option value="PW" <?php if($stop->countrycode == "PW"){echo ('selected=""');} ?>>Palau</option>
  <option value="PS" <?php if($stop->countrycode == "PS"){echo ('selected=""');} ?>>Palestinian Territory, Occupied</option>
  <option value="PA" <?php if($stop->countrycode == "PA"){echo ('selected=""');} ?>>Panama</option>
  <option value="PG" <?php if($stop->countrycode == "PG"){echo ('selected=""');} ?>>Papua New Guinea</option>
  <option value="PY" <?php if($stop->countrycode == "PY"){echo ('selected=""');} ?>>Paraguay</option>
  <option value="PE" <?php if($stop->countrycode == "PE"){echo ('selected=""');} ?>>Peru</option>
  <option value="PH" <?php if($stop->countrycode == "PH"){echo ('selected=""');} ?>>Philippines</option>
  <option value="PN" <?php if($stop->countrycode == "PN"){echo ('selected=""');} ?>>Pitcairn</option>
  <option value="PL" <?php if($stop->countrycode == "PL"){echo ('selected=""');} ?>>Poland</option>
  <option value="PT" <?php if($stop->countrycode == "PT"){echo ('selected=""');} ?>>Portugal</option>
  <option value="PR" <?php if($stop->countrycode == "PR"){echo ('selected=""');} ?>>Puerto Rico</option>
  <option value="QA" <?php if($stop->countrycode == "QA"){echo ('selected=""');} ?>>Qatar</option>
  <option value="RE" <?php if($stop->countrycode == "RE"){echo ('selected=""');} ?>>Réunion</option>
  <option value="RO" <?php if($stop->countrycode == "RO"){echo ('selected=""');} ?>>Romania</option>
  <option value="RU" <?php if($stop->countrycode == "RU"){echo ('selected=""');} ?>>Russian Federation</option>
  <option value="RW" <?php if($stop->countrycode == "RW"){echo ('selected=""');} ?>>Rwanda</option>
  <option value="BL" <?php if($stop->countrycode == "BL"){echo ('selected=""');} ?>>Saint Barthélemy</option>
  <option value="SH" <?php if($stop->countrycode == "SH"){echo ('selected=""');} ?>>Saint Helena, Ascension and Tristan da Cunha</option>
  <option value="KN" <?php if($stop->countrycode == "KN"){echo ('selected=""');} ?>>Saint Kitts and Nevis</option>
  <option value="LC" <?php if($stop->countrycode == "LC"){echo ('selected=""');} ?>>Saint Lucia</option>
  <option value="MF" <?php if($stop->countrycode == "MF"){echo ('selected=""');} ?>>Saint Martin (French part)</option>
  <option value="PM" <?php if($stop->countrycode == "PM"){echo ('selected=""');} ?>>Saint Pierre and Miquelon</option>
  <option value="VC" <?php if($stop->countrycode == "VC"){echo ('selected=""');} ?>>Saint Vincent and the Grenadines</option>
  <option value="WS" <?php if($stop->countrycode == "WS"){echo ('selected=""');} ?>>Samoa</option>
  <option value="SM" <?php if($stop->countrycode == "SM"){echo ('selected=""');} ?>>San Marino</option>
  <option value="ST" <?php if($stop->countrycode == "ST"){echo ('selected=""');} ?>>Sao Tome and Principe</option>
  <option value="SA" <?php if($stop->countrycode == "SA"){echo ('selected=""');} ?>>Saudi Arabia</option>
  <option value="SN" <?php if($stop->countrycode == "SN"){echo ('selected=""');} ?>>Senegal</option>
  <option value="RS" <?php if($stop->countrycode == "RS"){echo ('selected=""');} ?>>Serbia</option>
  <option value="SC" <?php if($stop->countrycode == "SC"){echo ('selected=""');} ?>>Seychelles</option>
  <option value="SL" <?php if($stop->countrycode == "SL"){echo ('selected=""');} ?>>Sierra Leone</option>
  <option value="SG" <?php if($stop->countrycode == "SG"){echo ('selected=""');} ?>>Singapore</option>
  <option value="SX" <?php if($stop->countrycode == "SX"){echo ('selected=""');} ?>>Sint Maarten (Dutch part)</option>
  <option value="SK" <?php if($stop->countrycode == "SK"){echo ('selected=""');} ?>>Slovakia</option>
  <option value="SI" <?php if($stop->countrycode == "SI"){echo ('selected=""');} ?>>Slovenia</option>
  <option value="SB" <?php if($stop->countrycode == "SB"){echo ('selected=""');} ?>>Solomon Islands</option>
  <option value="SO" <?php if($stop->countrycode == "SO"){echo ('selected=""');} ?>>Somalia</option>
  <option value="ZA" <?php if($stop->countrycode == "ZA"){echo ('selected=""');} ?>>South Africa</option>
  <option value="GS" <?php if($stop->countrycode == "GS"){echo ('selected=""');} ?>>South Georgia and the South Sandwich Islands</option>
  <option value="SS" <?php if($stop->countrycode == "SS"){echo ('selected=""');} ?>>South Sudan</option>
  <option value="ES" <?php if($stop->countrycode == "ES"){echo ('selected=""');} ?>>Spain</option>
  <option value="LK" <?php if($stop->countrycode == "LK"){echo ('selected=""');} ?>>Sri Lanka</option>
  <option value="SD" <?php if($stop->countrycode == "SD"){echo ('selected=""');} ?>>Sudan</option>
  <option value="SR" <?php if($stop->countrycode == "SR"){echo ('selected=""');} ?>>Suriname</option>
  <option value="SJ" <?php if($stop->countrycode == "SJ"){echo ('selected=""');} ?>>Svalbard and Jan Mayen</option>
  <option value="SZ" <?php if($stop->countrycode == "SZ"){echo ('selected=""');} ?>>Swaziland</option>
  <option value="SE" <?php if($stop->countrycode == "SE"){echo ('selected=""');} ?>>Sweden</option>
  <option value="CH" <?php if($stop->countrycode == "CH"){echo ('selected=""');} ?>>Switzerland</option>
  <option value="SY" <?php if($stop->countrycode == "SY"){echo ('selected=""');} ?>>Syrian Arab Republic</option>
  <option value="TW" <?php if($stop->countrycode == "TW"){echo ('selected=""');} ?>>Taiwan, Province of China</option>
  <option value="TJ" <?php if($stop->countrycode == "TJ"){echo ('selected=""');} ?>>Tajikistan</option>
  <option value="TZ" <?php if($stop->countrycode == "TZ"){echo ('selected=""');} ?>>Tanzania, United Republic of</option>
  <option value="TH" <?php if($stop->countrycode == "TH"){echo ('selected=""');} ?>>Thailand</option>
  <option value="TL" <?php if($stop->countrycode == "TL"){echo ('selected=""');} ?>>Timor-Leste</option>
  <option value="TG" <?php if($stop->countrycode == "TG"){echo ('selected=""');} ?>>Togo</option>
  <option value="TK" <?php if($stop->countrycode == "TK"){echo ('selected=""');} ?>>Tokelau</option>
  <option value="TO" <?php if($stop->countrycode == "TO"){echo ('selected=""');} ?>>Tonga</option>
  <option value="TT" <?php if($stop->countrycode == "TT"){echo ('selected=""');} ?>>Trinidad and Tobago</option>
  <option value="TN" <?php if($stop->countrycode == "TN"){echo ('selected=""');} ?>>Tunisia</option>
  <option value="TR" <?php if($stop->countrycode == "TR"){echo ('selected=""');} ?>>Turkey</option>
  <option value="TM" <?php if($stop->countrycode == "TM"){echo ('selected=""');} ?>>Turkmenistan</option>
  <option value="TC" <?php if($stop->countrycode == "TC"){echo ('selected=""');} ?>>Turks and Caicos Islands</option>
  <option value="TV" <?php if($stop->countrycode == "TV"){echo ('selected=""');} ?>>Tuvalu</option>
  <option value="UG" <?php if($stop->countrycode == "UG"){echo ('selected=""');} ?>>Uganda</option>
  <option value="UA" <?php if($stop->countrycode == "UA"){echo ('selected=""');} ?>>Ukraine</option>
  <option value="AE" <?php if($stop->countrycode == "AE"){echo ('selected=""');} ?>>United Arab Emirates</option>
  <option value="GB" <?php if($stop->countrycode == "GB"){echo ('selected=""');} ?>>United Kingdom</option>
  <option value="US" <?php if($stop->countrycode == "US"){echo ('selected=""');} ?>>United States</option>
  <option value="UM" <?php if($stop->countrycode == "UM"){echo ('selected=""');} ?>>United States Minor Outlying Islands</option>
  <option value="UY" <?php if($stop->countrycode == "UY"){echo ('selected=""');} ?>>Uruguay</option>
  <option value="UZ" <?php if($stop->countrycode == "UZ"){echo ('selected=""');} ?>>Uzbekistan</option>
  <option value="VU" <?php if($stop->countrycode == "VU"){echo ('selected=""');} ?>>Vanuatu</option>
  <option value="VE" <?php if($stop->countrycode == "VE"){echo ('selected=""');} ?>>Venezuela, Bolivarian Republic of</option>
  <option value="VN" <?php if($stop->countrycode == "VN"){echo ('selected=""');} ?>>Viet Nam</option>
  <option value="VG" <?php if($stop->countrycode == "VG"){echo ('selected=""');} ?>>Virgin Islands, British</option>
  <option value="VI" <?php if($stop->countrycode == "VI"){echo ('selected=""');} ?>>Virgin Islands, U.S.</option>
  <option value="WF" <?php if($stop->countrycode == "WF"){echo ('selected=""');} ?>>Wallis and Futuna</option>
  <option value="EH" <?php if($stop->countrycode == "EH"){echo ('selected=""');} ?>>Western Sahara</option>
  <option value="YE" <?php if($stop->countrycode == "YE"){echo ('selected=""');} ?>>Yemen</option>
  <option value="ZM" <?php if($stop->countrycode == "ZM"){echo ('selected=""');} ?>>Zambia</option>
  <option value="ZW" <?php if($stop->countrycode == "ZW"){echo ('selected=""');} ?>>Zimbabwe</option>
</select>
      </div>

   

      <div class="form-group">
        <label for="name">Arrival</label>
        <input type="date" value="{{substr($stop->arrival, 0,10)}}" class="form-control" id=""  name="arrival" >
      </div>
      <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" id=""  name="user_id" >

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

			<div class="modal-footer">
				
     <button type="submit" class="btn btn-primary">Submit</button>

</form>
			</div>
		</div>
    </div>
  </div>
</div>

@endforeach

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal{{$user->id}}addStop">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       	<div class="container">
       		<h1 style="margin-top: 5px;">Add a new stop </h1>
       		
       		<hr>
			<?php
               $todaydate = substr($user->trip_start, 0,10);
            ?>

 <form action="/stops" method="post">
     {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
     <div class="form-group">
        <label for="name">Stop name </label>
        <input type="text"  class="form-control" id=""  name="name" >
      </div>
      <div class="form-group">
        <label for="name">Countrycode</label>
        <select  name="countrycode"  class="form-control" >
  <option value="AF">Afghanistan </option>
  <option value="AX">Åland Islands</option>
  <option value="AL">Albania</option>
  <option value="DZ">Algeria</option>
  <option value="AS">American Samoa</option>
  <option value="AD">Andorra</option>
  <option value="AO">Angola</option>
  <option value="AI">Anguilla</option>
  <option value="AQ">Antarctica</option>
  <option value="AG">Antigua and Barbuda</option>
  <option value="AR">Argentina</option>
  <option value="AM">Armenia</option>
  <option value="AW">Aruba</option>
  <option value="AU">Australia</option>
  <option value="AT">Austria</option>
  <option value="AZ">Azerbaijan</option>
  <option value="BS">Bahamas</option>
  <option value="BH">Bahrain</option>
  <option value="BD">Bangladesh</option>
  <option value="BB">Barbados</option>
  <option value="BY">Belarus</option>
  <option value="BE">Belgium</option>
  <option value="BZ">Belize</option>
  <option value="BJ">Benin</option>
  <option value="BM">Bermuda</option>
  <option value="BT">Bhutan</option>
  <option value="BO">Bolivia, Plurinational State of</option>
  <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
  <option value="BA">Bosnia and Herzegovina</option>
  <option value="BW">Botswana</option>
  <option value="BV">Bouvet Island</option>
  <option value="BR">Brazil</option>
  <option value="IO">British Indian Ocean Territory</option>
  <option value="BN">Brunei Darussalam</option>
  <option value="BG">Bulgaria</option>
  <option value="BF">Burkina Faso</option>
  <option value="BI">Burundi</option>
  <option value="KH">Cambodia</option>
  <option value="CM">Cameroon</option>
  <option value="CA">Canada</option>
  <option value="CV">Cape Verde</option>
  <option value="KY">Cayman Islands</option>
  <option value="CF">Central African Republic</option>
  <option value="TD">Chad</option>
  <option value="CL">Chile</option>
  <option value="CN">China</option>
  <option value="CX">Christmas Island</option>
  <option value="CC">Cocos (Keeling) Islands</option>
  <option value="CO">Colombia</option>
  <option value="KM">Comoros</option>
  <option value="CG">Congo</option>
  <option value="CD">Congo, the Democratic Republic of the</option>
  <option value="CK">Cook Islands</option>
  <option value="CR">Costa Rica</option>
  <option value="CI">Côte d'Ivoire</option>
  <option value="HR">Croatia</option>
  <option value="CU">Cuba</option>
  <option value="CW">Curaçao</option>
  <option value="CY">Cyprus</option>
  <option value="CZ">Czech Republic</option>
  <option value="DK">Denmark</option>
  <option value="DJ">Djibouti</option>
  <option value="DM">Dominica</option>
  <option value="DO">Dominican Republic</option>
  <option value="EC">Ecuador</option>
  <option value="EG">Egypt</option>
  <option value="SV">El Salvador</option>
  <option value="GQ">Equatorial Guinea</option>
  <option value="ER">Eritrea</option>
  <option value="EE">Estonia</option>
  <option value="ET">Ethiopia</option>
  <option value="FK">Falkland Islands (Malvinas)</option>
  <option value="FO">Faroe Islands</option>
  <option value="FJ">Fiji</option>
  <option value="FI">Finland</option>
  <option value="FR">France</option>
  <option value="GF">French Guiana</option>
  <option value="PF">French Polynesia</option>
  <option value="TF">French Southern Territories</option>
  <option value="GA">Gabon</option>
  <option value="GM">Gambia</option>
  <option value="GE">Georgia</option>
  <option value="DE">Germany</option>
  <option value="GH">Ghana</option>
  <option value="GI">Gibraltar</option>
  <option value="GR">Greece</option>
  <option value="GL">Greenland</option>
  <option value="GD">Grenada</option>
  <option value="GP">Guadeloupe</option>
  <option value="GU">Guam</option>
  <option value="GT">Guatemala</option>
  <option value="GG">Guernsey</option>
  <option value="GN">Guinea</option>
  <option value="GW">Guinea-Bissau</option>
  <option value="GY">Guyana</option>
  <option value="HT">Haiti</option>
  <option value="HM">Heard Island and McDonald Islands</option>
  <option value="VA">Holy See (Vatican City State)</option>
  <option value="HN">Honduras</option>
  <option value="HK">Hong Kong</option>
  <option value="HU">Hungary</option>
  <option value="IS">Iceland</option>
  <option value="IN">India</option>
  <option value="ID">Indonesia</option>
  <option value="IR">Iran, Islamic Republic of</option>
  <option value="IQ">Iraq</option>
  <option value="IE">Ireland</option>
  <option value="IM">Isle of Man</option>
  <option value="IL">Israel</option>
  <option value="IT">Italy</option>
  <option value="JM">Jamaica</option>
  <option value="JP">Japan</option>
  <option value="JE">Jersey</option>
  <option value="JO">Jordan</option>
  <option value="KZ">Kazakhstan</option>
  <option value="KE">Kenya</option>
  <option value="KI">Kiribati</option>
  <option value="KP">Korea, Democratic People's Republic of</option>
  <option value="KR">Korea, Republic of</option>
  <option value="KW">Kuwait</option>
  <option value="KG">Kyrgyzstan</option>
  <option value="LA">Lao People's Democratic Republic</option>
  <option value="LV">Latvia</option>
  <option value="LB">Lebanon</option>
  <option value="LS">Lesotho</option>
  <option value="LR">Liberia</option>
  <option value="LY">Libya</option>
  <option value="LI">Liechtenstein</option>
  <option value="LT">Lithuania</option>
  <option value="LU">Luxembourg</option>
  <option value="MO">Macao</option>
  <option value="MK">Macedonia, the former Yugoslav Republic of</option>
  <option value="MG">Madagascar</option>
  <option value="MW">Malawi</option>
  <option value="MY">Malaysia</option>
  <option value="MV">Maldives</option>
  <option value="ML">Mali</option>
  <option value="MT">Malta</option>
  <option value="MH">Marshall Islands</option>
  <option value="MQ">Martinique</option>
  <option value="MR">Mauritania</option>
  <option value="MU">Mauritius</option>
  <option value="YT">Mayotte</option>
  <option value="MX">Mexico</option>
  <option value="FM">Micronesia, Federated States of</option>
  <option value="MD">Moldova, Republic of</option>
  <option value="MC">Monaco</option>
  <option value="MN">Mongolia</option>
  <option value="ME">Montenegro</option>
  <option value="MS">Montserrat</option>
  <option value="MA">Morocco</option>
  <option value="MZ">Mozambique</option>
  <option value="MM">Myanmar</option>
  <option value="NA">Namibia</option>
  <option value="NR">Nauru</option>
  <option value="NP">Nepal</option>
  <option value="NL">Netherlands</option>
  <option value="NC">New Caledonia</option>
  <option value="NZ">New Zealand</option>
  <option value="NI">Nicaragua</option>
  <option value="NE">Niger</option>
  <option value="NG">Nigeria</option>
  <option value="NU">Niue</option>
  <option value="NF">Norfolk Island</option>
  <option value="MP">Northern Mariana Islands</option>
  <option value="NO">Norway</option>
  <option value="OM">Oman</option>
  <option value="PK">Pakistan</option>
  <option value="PW">Palau</option>
  <option value="PS">Palestinian Territory, Occupied</option>
  <option value="PA">Panama</option>
  <option value="PG">Papua New Guinea</option>
  <option value="PY">Paraguay</option>
  <option value="PE">Peru</option>
  <option value="PH">Philippines</option>
  <option value="PN">Pitcairn</option>
  <option value="PL">Poland</option>
  <option value="PT">Portugal</option>
  <option value="PR">Puerto Rico</option>
  <option value="QA">Qatar</option>
  <option value="RE">Réunion</option>
  <option value="RO">Romania</option>
  <option value="RU">Russian Federation</option>
  <option value="RW">Rwanda</option>
  <option value="BL">Saint Barthélemy</option>
  <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
  <option value="KN">Saint Kitts and Nevis</option>
  <option value="LC">Saint Lucia</option>
  <option value="MF">Saint Martin (French part)</option>
  <option value="PM">Saint Pierre and Miquelon</option>
  <option value="VC">Saint Vincent and the Grenadines</option>
  <option value="WS">Samoa</option>
  <option value="SM">San Marino</option>
  <option value="ST">Sao Tome and Principe</option>
  <option value="SA">Saudi Arabia</option>
  <option value="SN">Senegal</option>
  <option value="RS">Serbia</option>
  <option value="SC">Seychelles</option>
  <option value="SL">Sierra Leone</option>
  <option value="SG">Singapore</option>
  <option value="SX">Sint Maarten (Dutch part)</option>
  <option value="SK">Slovakia</option>
  <option value="SI">Slovenia</option>
  <option value="SB">Solomon Islands</option>
  <option value="SO">Somalia</option>
  <option value="ZA">South Africa</option>
  <option value="GS">South Georgia and the South Sandwich Islands</option>
  <option value="SS">South Sudan</option>
  <option value="ES">Spain</option>
  <option value="LK">Sri Lanka</option>
  <option value="SD">Sudan</option>
  <option value="SR">Suriname</option>
  <option value="SJ">Svalbard and Jan Mayen</option>
  <option value="SZ">Swaziland</option>
  <option value="SE">Sweden</option>
  <option value="CH">Switzerland</option>
  <option value="SY">Syrian Arab Republic</option>
  <option value="TW">Taiwan, Province of China</option>
  <option value="TJ">Tajikistan</option>
  <option value="TZ">Tanzania, United Republic of</option>
  <option value="TH">Thailand</option>
  <option value="TL">Timor-Leste</option>
  <option value="TG">Togo</option>
  <option value="TK">Tokelau</option>
  <option value="TO">Tonga</option>
  <option value="TT">Trinidad and Tobago</option>
  <option value="TN">Tunisia</option>
  <option value="TR">Turkey</option>
  <option value="TM">Turkmenistan</option>
  <option value="TC">Turks and Caicos Islands</option>
  <option value="TV">Tuvalu</option>
  <option value="UG">Uganda</option>
  <option value="UA">Ukraine</option>
  <option value="AE">United Arab Emirates</option>
  <option value="GB">United Kingdom</option>
  <option value="US">United States</option>
  <option value="UM">United States Minor Outlying Islands</option>
  <option value="UY">Uruguay</option>
  <option value="UZ">Uzbekistan</option>
  <option value="VU">Vanuatu</option>
  <option value="VE">Venezuela, Bolivarian Republic of</option>
  <option value="VN">Viet Nam</option>
  <option value="VG">Virgin Islands, British</option>
  <option value="VI">Virgin Islands, U.S.</option>
  <option value="WF">Wallis and Futuna</option>
  <option value="EH">Western Sahara</option>
  <option value="YE">Yemen</option>
  <option value="ZM">Zambia</option>
  <option value="ZW">Zimbabwe</option>
</select>

      </div>

     
       <?php $today = date('d-m-Y');?>
      <div class="form-group">
        <label for="name">Arrival</label>
       
        <input type="date" value="{{$todaydate}}"  class="form-control" id=""  name="arrival" > 

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
<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
    </form>
			</div>
		</div>
    </div>
  </div>
</div>


		@endguest

</div><br>

