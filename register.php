<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "127.0.0.1";
    $username = "pratik";
    $password = "Studyspace@2004"; // Change this to your actual password
    $database = "studyspace";// Your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to sanitize input data
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Retrieve form data
    $firstname = isset($_POST['firstname']) ? sanitizeInput($_POST['firstname']) : "";
    $lastname = isset($_POST['lastname']) ? sanitizeInput($_POST['lastname']) : "";
    $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : "";
    $password = isset($_POST['password']) ? sanitizeInput($_POST['password']) : "";

    // Check if email already exists
    $emailCheckQuery = "SELECT * FROM register WHERE email = '$email'";
    $emailCheckResult = $conn->query($emailCheckQuery);

    if ($emailCheckResult->num_rows > 0) {
  
        echo "<script type='text/javascript'> alert('Email Already Exit')</script>";
    } else {
        // Insert data into the database using prepared statements
        $stmt = $conn->prepare("INSERT INTO register (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);

        if ($stmt->execute()) {
            // Registration successful, redirect or perform any other action
            header("Location: login.php"); // Example: redirect to a success page
            exit(); // Terminate the script
        } else {
            $message = "Error: " . $stmt->error;
        }
    }

    // Close the connection
    $conn->close();
}
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
    <link rel="stylesheet" href="css/register.css">

    <style>
        /* Move styles outside of body tag */
        .container {
            background-color: #fff;
            padding: 142px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 679px;
            max-width: 121%;
            margin-left: 50px;
            position: relative;
            margin-top: 60px;
        }

        input[type="submit"] {
            margin-left: 60px;
            font-size: larger;
        }

        input[type="text"] {
            border-radius: 48px;
            margin-top: 6px;
        }

        input[type=email] {
          border: 1px solid #ccc;
          border-radius: 48px;
        }
        h6 {
            margin-top: 2px;
        }

        figure {
            height: 150px;
            width: 160px;
            margin-top: -30px;
        }
.king{
    margin-left: 137px;
}
      
    </style>
</head>
<body>
  <!-- start form -->
  <div class="container">
     <form method="post" id="login-form" class="login-form" autocomplete="off" role="main">
      <div class="text-center">    
      <h4>Register</h4></div>
      <div>
        <label class="label-firstname">
            <input type="text" class="text" name="firstname" placeholder="first name" tabindex="1" required />
           <h6>FIRST NAME</h6>
        </label>
    </div>
    <div>
        <label class="label-lastname">
            <input type="text" class="text" name="lastname" placeholder="last name" tabindex="1" required />
            <h6>LAST NAME</h6>
        </label>
    </div>
    <div>
      <label class="label-email">
          <input type="email" class="text" name="email" placeholder="Email" tabindex="1" required />
          <h6>EMAIL ID</h6>
      </label>
  </div>
  <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
  <label class="label-show-password" for="show-password">
    <span><b>Show Password</b></span>
  </label>
  <div>
    <label class="label-password">
        <input type="text" class="text" name="password" placeholder="Password" tabindex="2" required />
        <h6>PASSWORD</h6>
    </label>
  </div>
 <input type="submit" value="Register" />

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
    <a class="king" href="login.php">LOGIN NOW!</a><br><br>
</div>
<!-- end form -->


<br><br>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0
