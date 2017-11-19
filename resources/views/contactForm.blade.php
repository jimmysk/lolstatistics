@extends('layouts.app')

@section('head_content')
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <form id="contact-form" class="form-horizontal" method="POST" action="{{ route('contact.send') }}">
              <fieldset>
                <legend>Contact Form</legend>
                <div class="form-group">
                  <label for="title" class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                    <input id="name" type="text" class="form-control" name="name" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="surname" class="col-lg-2 control-label">Surname</label>
                  <div class="col-lg-10">
                    <input id="surname" type="text" class="form-control" name="surname" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-lg-2 control-label">E-mail</label>
                  <div class="col-lg-10">
                    <input id="email" type="email" class="form-control" name="email" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone" class="col-lg-2 control-label">Phone Number</label>
                  <div class="col-lg-10">
                    <input id="phone" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="phone" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="message" class="col-lg-2 control-label">Message</label>
                  <div class="col-lg-10">
                    <textarea class="form-control" rows="4" cols="50" name="message"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                  </div>
                </div>
                
             	<div class="form-group">
             		<input  type="hidden" name="_token" value="{{ csrf_token() }}">
             	</div>   
              </fieldset>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script>
function validateEmail(mail)   
{  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
  {  
    return (true)  
    
  }  
    return (false)  
} 

$("#contact-form").submit(function(e){
	console.log($("#name"));
	if ($("#name").val() == ''){
		$.notify({
			//options
			message: 'Please enter a name.' 
		},{
			// settings
			type: 'danger',
			delay: 3000,
			animate: {
				enter: "animated fadeInRight", 
				exit: "animated fadeOutRight"
			}
			
		});
		return false;
	}
	if ($("#surname").val() == ''){
		$.notify({
			//options
			message: 'Please enter a surname.' 
		},{
			// settings
			type: 'danger',
			delay: 3000,
			animate: {
				enter: "animated fadeInRight", 
				exit: "animated fadeOutRight"
			}
			
		});
		return false;
	}
	if (!validateEmail($("#email").val())){
		
		$.notify({
			//options
			message: 'Please enter a valid email address.' 
		},{
			// settings
			type: 'danger',
			delay: 3000,
			animate: {
				enter: "animated fadeInRight", 
				exit: "animated fadeOutRight"
			}
			
		});
		return false;
	}
	if ($("#phone").val().length <= 9){
		$.notify({
			//options
			message: 'Please a valid phone number' 
		},{
			// settings
			type: 'danger',
			delay: 3000,
			animate: {
				enter: "animated fadeInRight", 
				exit: "animated fadeOutRight"
			}
			
		});
		return false;
	}
	if ($("#message").val() == ''){
		$.notify({
			//options
			message: 'Please enter a message.' 
		},{
			// settings
			type: 'danger',
			delay: 3000,
			animate: {
				enter: "animated fadeInRight", 
				exit: "animated fadeOutRight"
			}
			
		});
		return false;
	}
	
});


</script>
@endsection