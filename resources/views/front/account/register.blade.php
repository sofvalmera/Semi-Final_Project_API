<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Form</title>
<link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/form.css')}}">
<style>
    <?php
    //  include __DIR__ . '/../../asset/front-asset/css/form.css'; 
     ?>
  </style>
</head>
<body>

<div class="container">
  <form method="POST" id="registerf">
  <!-- <form action="login.php" method="post" id="register-form"> -->
 
    <!-- <h2>Register</h2> -->
    <h2><center>Register</center></h2>
    <div class="input-container">
      <input type="text" placeholder="Full Name" id="name" name="name" >
      <p></p>                                             <!-- required -->
    </div>
    <div class="input-container">
      <input type="number" placeholder="Phone" id="phone"name="phone" >
      <p></p>  
    </div> 
    <div class="input-container">
      <input type="email" placeholder="Email" id="email" name="email">
      <p></p>
    </div>
    <div class="input-container">
      <input type="password" placeholder="Password" id="password" name="password">
      <p></p>
    </div>
    <div class="input-container">
      <input type="password" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" >
      <p></p>
    </div>
    <input type="submit" value="Register">
    <div class="pararegister">
      Already have an account? <a href="{{route('front.login')}}">Login</a>
      <!-- Already have an account? <a href="">Login</a> -->
    </div>
  </form>
</div>
<script>
$("#registerf").submit(function(event){
		event.preventDefault();
		// var element =$(this);
        // $("button[type=submit]").prop('disable',true);

		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("account.processRegister") }}',
			type: 'post',
			data: $(this).serializeArray(),
			dataType:'json',
			success:function(response){
			

					var errors = response.errors;
                            if(response["status"] == false){
                    if(errors.name){
                        $("#name").siblings("p").addClass('invalid-feedback').html(errors.name);
                        $("#name").addClass('is-invalid');
                    }else {
                        $("#name").siblings("p").removeClass('invalid-feedback').html('');
                        $("#name").removeClass('is-invalid');
                    }
                    if(errors.email){
                        $("#email").siblings("p").addClass('invalid-feedback').html(errors.email);
                        $("#email").addClass('is-invalid');
                    }else {
                        $("#email").siblings("p").removeClass('invalid-feedback').html('');
                        $("#email").removeClass('is-invalid');
                    }
                    if(errors.password){
                        $("#password").siblings("p").addClass('invalid-feedback').html(errors.password);
                        $("#password").addClass('is-invalid');
                    }else {
                        $("#password").siblings("p").removeClass('invalid-feedback').html('');
                        $("#password").removeClass('is-invalid');
                    }
                    


			

				}else{
                    $("#name").siblings("p").removeClass('invalid-feedback').html('');
                    $("#name").removeClass('is-invalid');
                    $("#email").siblings("p").removeClass('invalid-feedback').html('');
                    $("#email").removeClass('is-invalid');

                   
                        
                        $("#password").siblings("p").removeClass('invalid-feedback').html('');
                        $("#password").removeClass('is-invalid');

                        window.location.href="{{route('front.login')}}";

                       

                }
				

			}, error: function(JQXHR, exception){
				console.log("Something Went Wrong");
			}
		});
	});
</script>
</body>
</html>
