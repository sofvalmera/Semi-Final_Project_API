<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/form.css') }}">
    <style>
body{
  /* background-color: #424644; */
}
.boxform{
  background-color: #313934;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
  color: white;
}

</style>
</head>
<body>
<div class="container">
<!-- <div id="success-container"></div>
<div id="error-container"></div> -->
    <div id="success-container" style="display: none;">
        <div class="success" id="successMessage">
            <h4>Success!</h4>
            <p></p>
        </div>
    </div>
   
    <div id="error-container" style="display: none;">
        <div class="alert" id="errorMessage">
            <h4>Error!</h4>
            <p></p>
        </div>
    </div>
    
    <form method="POST" id="loginform">
        <h2>Login</h2>
        <div class="input-container">
            <input type="email" placeholder="Email Address" id="email" name="email" required>
        </div>
        <div class="input-container">
            <input type="password" placeholder="Password" id="password" name="password" required>
        </div>
        <button type="submit" id="loginBtn">Login</button>
        <div class="pararegister">
            <a href="#">Forgot Password?</a> 
        </div>
    </form>

     <form id="otpform" class="mt-4 d-none" style="display: none;">
     <h2>OTP Verification</h2>
        <!-- <div class="mb-3"> -->
        <div class="input-container">
          <h3 id="otpmessage"></h3>
          <!-- <div class="input-container"> -->
            <!-- <input type="email" placeholder="Email Address" id="email" name="email" required> -->
            <label for="otp" class="form-label">Enter OTP</label>
            <input type="number" id="otp" name="otp" class="form-control" placeholder="OTP">
        <!-- </div> -->
        </div>
        <button type="submit" id="loginBtn" class="form-control btn btn-primary">Verify OTP</button>
      </form>
</div>

<script>
    const successContainer = document.getElementById('success-container');
    const errorContainer = document.getElementById('error-container');
    const loginForm = document.getElementById('loginform');

    const loginBtn = document.getElementById('loginBtn');
    loginBtn.addEventListener('click', function() {
        loginBtn.classList.add('clicked');
    });

    loginForm.addEventListener('submit', function(event){
        event.preventDefault();
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var data = {
            email: email,
            password: password,
        };
        fetch("http://127.0.0.1:8000/api/login", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                Authorization: 'Bearer' + localStorage.getItem('token')
            },
            body: JSON.stringify(data),
        })
        .then((res) => res.json())
        .then(data => {
            console.log(data);
            if (data.status) {
                localStorage.setItem('token', data.token);
                // window.location.href = '/dashboard';
                
                document.getElementById('loginform').style.display = "none";
                document.getElementById('otpform').style.display = "block";

                document.getElementById('errorMessage').querySelector('p').innerText = data.message;
                errorContainer.style.display = 'none';
                successContainer.style.display = 'none';
                
                // document.getElementById('successMessage').querySelector('p').innerText = data.message;
                // successContainer.style.display = 'block';
                // errorContainer.style.display = 'none';
            } else {
               
                document.getElementById('errorMessage').querySelector('p').innerText = data.message;
                errorContainer.style.display = 'block';
                successContainer.style.display = 'none';
            }

            // successContainer.innerHTML = `
            //         <div class="success">
            //             <h4>Success!</h4>
            //             <p>${data.message}</p>
            //         </div>
            //     `;
            // } else {
                
            //     errorContainer.innerHTML = `
            //         <div class="alert">
            //             <h4>Error!</h4>
            //             <p>${data.message}</p>
            //         </div>
            //     `;
        })
        .catch(error => {
            console.error("Something went wrong!", error);
        });
    });

   
   
    document.getElementById('otpform').addEventListener('submit',function(event){
            event.preventDefault();

        var otp = document.getElementById('otp').value;

        data = {
          otp: otp,
        };

        var token = localStorage.getItem('token');

     

        fetch("http://127.0.0.1:8000/api/verifyotp",{
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
                  Authorization: 'Bearer ' + token,
                  
                },
                body: JSON.stringify(data),
               
            }).then((res) => {
              return res.json();
            }).then(data => {
              console.log(data);
              if(data.status){
                // document.getElementById('otpmessage').innerText = data.message;
                // document.getElementById('otpmessage').style.color = 'green';
                document.getElementById('successMessage').querySelector('p').innerText = data.message;
                successContainer.style.display = 'block';
                errorContainer.style.display = 'none';
                window.location.href = '/dashboard';
              }else{
                document.getElementById('errorMessage').querySelector('p').innerText = data.message;
                successContainer.style.display = 'none';
                errorContainer.style.display = 'block';
                // document.getElementById('otpmessage').innerText = data.message;
                // document.getElementById('otpmessage').style.color = 'red';
              }
            }).catch(error => {
              console.error("Something went wrong with your fetch!", error);
            })
        })

      
</script>
</body>
</html>
