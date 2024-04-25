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
  <form action="{{route('front.login')}}" >
  <!-- <form action="login.php" method="post" id="register-form"> -->
 
    <!-- <h2>Register</h2> -->
    <h2><center>Register</center></h2>
    <div class="input-container">
      <input type="text" placeholder="Name" name="name" required>
    </div>
    <div class="input-container">
      <input type="number" placeholder="Phone" name="phone" required>
    </div> 
    <div class="input-container">
      <input type="email" placeholder="Email" name="email" required>
    </div>
    <div class="input-container">
      <input type="password" placeholder="Password" name="password" required>
    </div>
    <div class="input-container">
      <input type="password" placeholder="Confirm Password" name="password" required>
    </div>
    <input type="submit" value="Register">
    <div class="pararegister">
      Already have an account? <a href="{{route('front.login')}}">Login</a>
      <!-- Already have an account? <a href="">Login</a> -->
    </div>
  </form>
</div>

</body>
</html>
