

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
  <header>
    <!-- <div class="parasalogo">Try123</div> -->
    <div class="">Try123</div>
    <nav>
      <ul class="nav">
      <!-- <li><a href="/project/front/account/login.php">Login</a></li>
      <li><a href="/project/front/account/register.php">Register</a></li> -->

      <li><a href="{{route('front.login')}}">Login</a></li>
      <li><a href="{{route('front.register')}}">Register</a></li>

        <!-- <li><a href="../account/login.php">Login</a></li>
        
        <li><a href="../account/register.php">Register</a></li> -->
      </ul>
    </nav>
  </header>
</body>
</html>

@yield('content')