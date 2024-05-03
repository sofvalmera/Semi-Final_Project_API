


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/form.css')}}">
<style>
    <?php
    //  include __DIR__ . '/../../asset/front-asset/css/form.css'; 
     ?>
  </style>
</head>
<body>

<!-- <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success">
                        {{Session::get('success')}}
                </div>  
            @endif -->
 
<div class="container">
<!-- <div class="container"> -->

<!-- <div> -->
<!-- @if (Session::has('error'))
                <div class="alert alert-error">
                        {{Session::get('error')}}
                </div>  
            @endif -->
            <!-- <h6 id="message"></h6> -->
         
  <form method="POST" id="loginform" >
  <!-- method="post" id="loginform"> -->
    <!-- <h2>Login</h2> -->
    <h2>
      <center>Login</center>
    </h2>
    <div class="input-container">
      <input type="email" placeholder="Email" id="email" name="email" required>
    </div>
    <div class="input-container">
      <input type="password" placeholder="Password" id="password" name="password" required>
    </div>
    <center><h6 id="message"></h6></center>
    <!-- <input type="submit" value="Login"> -->
    <button type="submit" class="button1">Login</button>
    <div class="pararegister">
      <!-- Don't have an account? <a href="#">Register</a> -->
      <!-- Forgot Password? -->
      <a href="#">Forgot Password?</a> 
    </div>
  </form>
</div>
<!-- <script>
 
</script> -->
<script>
        document.getElementById('loginform').addEventListener('submit',function(event){
            event.preventDefault();


        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
     
         var data = {
             email: email,
             password: password,
         }
            fetch("http://127.0.0.1:8000/api/login",{
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
                  Authorization: 'Bearer' + localStorage.getItem('token')
                  
                },
                body: JSON.stringify(data),
               
            })
            .then((res) => {
                return res.json();
            })
            .then(data => {
                console.log(data);
                if(data.status){
                localStorage.setItem('token', data.token);
                // document.getElementById('message').innerText = data.message;
                // document.getElementById('message').style.color = 'green';
                window.location.href = '/dashboard';
                }else{
                  document.getElementById('message').innerText = data.message;
                  document.getElementById('message').style.color = 'red';
                }
            })
            .catch(error => {
                console.error("Something went wrong!", error);
            })
        })

    </script>

</body>
</html>
