

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
  </style>
  <!-- <style>
    <?php 
    // include __DIR__ . '/../../asset/front-asset/css/header.css'; 
    ?>
  </style> -->
  <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/header.css')}}">
  
  <?php 
//   include __DIR__ . '/../../front-asset/css/header.css'; 
  ?>

</head>
<body>
<style>
       #login-link,
#signup-link {
    background-color: #000000;
    color: #ffffff; 
    padding: 8px 12px;
    margin-left: 8px;
    border-radius: 8px; 
}


@media (max-width: 768px) {
    #login-link,
    #signup-link {
        margin-left: 0; 
        margin-top: 8px;
        display: block; 
        width: 100%; 
        text-align: center;
    }


}

    </style>
  <header>
    <!-- <div class="parasalogo">Try123</div> -->
    <div class="">Try123</div>
    <nav>
      <ul class="nav">
      <!-- <li><a href="/project/front/account/login.php">Login</a></li>
      <li><a href="/project/front/account/register.php">Register</a></li> -->

      <li><a href="{{route('front.login')}}" class="nav-item nav-link" id="login-link">Login</a></li>
      <!-- <li><a href="{{route('front.register')}}">Register</a></li> -->

        <!-- <li><a href="../account/login.php">Login</a></li>
        
        <li><a href="../account/register.php">Register</a></li> -->
      </ul>
    </nav>
  </header>
</body>
</html>

@yield('content')