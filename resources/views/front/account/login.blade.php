


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

<div class="container">
  <form action="{{route('admin.dashboard')}}" >
  <!-- method="post" id="loginform"> -->
    <!-- <h2>Login</h2> -->
    <h2>
      <center>Login</center>
    </h2>
    <div class="input-container">
      <input type="email" placeholder="Email" name="email" required>
    </div>
    <div class="input-container">
      <input type="password" placeholder="Password" name="password" required>
    </div>
    <input type="submit" value="Login">
    <div class="pararegister">
      Don't have an account? <a href="{{route('front.register')}}">Register</a>
    </div>
  </form>
</div>
<script>
 
</script>
</body>
</html>
