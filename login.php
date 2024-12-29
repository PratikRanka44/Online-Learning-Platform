<?php
// Database connection details
$servername = "127.0.0.1";
$username = "pratik";
$password = "Studyspace@2004"; // Change this to your actual password
$database = "studyspace";// Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Assuming you have a form that submits a username and password
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Prepare SQL statement to fetch details for the provided username
    $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login
        header("Location: home.html");
        $row = $result->fetch_assoc();
     
       
       
        // You can redirect the user to a dashboard or another page here
    } else {
        // Invalid credentials
        echo "<script type='text/javascript'> alert('Login Failed')</script>";
    }
}



// Close connection
$conn->close();
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    
    <style>
body {
      
            video{
                height: 100px;
                width:190px;
               position: absolute;
               margin-top:-50px;
               
            }
          }
                .navbar video{
        height: 73px;
        width:230px;
       position: absolute;
       margin-top:-38px;
       margin-bottom: 10px;
       
    }
    .navbar-nav
{
  font-size: 16px;
  height: 55px;
}
 </style>
</head>
<body>
    <div class="container">
        <form method="post" id="login-form" class="login-form" autocomplete="off" role="main">
            <div class="text-center">    
                <h1>LOGIN</h1>
            </div>
            <div>
                <label class="label-email">
                    <input type="email" class="text" name="email" placeholder="Email" tabindex="1" required />
                    <span class="required">Email</span>
                </label>
            </div>
            <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
            <label class="label-show-password" for="show-password">
                <span>Show Password</span>
            </label>
            <div>
                <label class="label-password">
                    <input type="password" class="text" name="password" placeholder="Password" tabindex="2" required />
                    <span class="required">Password</span>
                </label>
            </div>
            <input type="submit" value="Log in" />
            <div class="email">
                <a href="forget.php">Forgot password?</a><br>
                <a href="login.php">LOGIN NOW!</a><br><br>
            </div>
            <figure aria-hidden="true">
                <div class="person-body"></div>
                <div class="neck skin"></div>
                <div class="head skin">
                    <div class="eyes"></div>
                    <div class="mouth"></div>
                </div>
                <div class="hair"></div>
                <div class="ears"></div>
                <div class="shirt-1"></div>
                <div class="shirt-2"></div>
            </figure>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Your custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Show/hide password functionality
            $('#show-password').change(function() {
                var isChecked = $(this).is(':checked');
                if (isChecked) {
                    $('.label-password input').attr('type', 'text');
                } else {
                    $('.label-password input').attr('type', 'password');
                }
            });
        });
    </script>
</body>
</html>