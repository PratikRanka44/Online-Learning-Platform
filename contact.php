<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "127.0.0.1";
    $username = "pratik";
    $password = "Studyspace@2004"; // Change this to your actual password
    $database = "studyspace";

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
    $subject = isset($_POST['subject']) ? sanitizeInput($_POST['subject']) : "";

    // Check if email exists in the register table
    $stmt = $conn->prepare("SELECT * FROM register WHERE email =?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists in register table, proceed to insert into contact_us table
        $stmt = $conn->prepare("INSERT INTO contact_us (firstname, lastname, email, subject) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $subject);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'> alert('Message Submitted.')</script>";
        } else {
            $message = "Error: " . $stmt->error;
        }
    } else {
        // Email does not exist in register table
        echo "<script type='text/javascript'> alert('Email not Registered.')</script>";
    }

    // Close the connection
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDYSPACE</title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <!-- /Bootstrap CSS -->
 
 <!-- fontawesome CSS -->
 <link rel="stylesheet" href="css/all.min.css">
<!-- /fontawesome css -->

 <!-- google fonts -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<!-- /google fonts -->

<link rel="stylesheet" href="css/style.css">
<style>

video{
          height: 100px;
          width:190px;
          position: absolute;
         margin-top:-50px;
         
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

.google{
  margin-left: 10px;
  height: 46px;
  background-color: red;
}

.google-text{
  color:white;
}
   </style>
</head>
<body>


<!-- start navbar -->
<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #000;">
  <div class="container-fluid">
    <a href="home.html">
      <video playsinline autoplay muted>
        <source src="video/studyspace_home_logo.mp4">
      </video></a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav custom-nav pl-5">
      <ul class="navbar-nav custom-nav pl-5">
        <ul class="navbar-nav custom-nav pl-5">
          <ul class="navbar-nav custom-nav pl-5">
            <ul class="navbar-nav custom-nav pl-5">
              <ul class="navbar-nav custom-nav pl-5">
                <ul class="navbar-nav custom-nav pl-5">
          <li class="nav-item custom-nav-item"><a href="home.html" class="nav-link">HOME</a></li>
          <li class="nav-item dropdown  custom-nav-item pl-5 pr-5">
            <a class="nav-link dropdown-toggle" href="courses.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              COURSES
            </a>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item custom-nav-item" href="programming.html">PROGRAMMING</a></li>
              <li><a class="dropdown-item custom-nav-item" href="software development.html">SOFTWARE DEVELOPMENT</a></li>
              <li><a class="dropdown-item custom-nav-item" href="digital marketing.html">DIGITAL MARKETING</a></li>
              <li><a class="dropdown-item custom-nav-item" href="soft skills.html">SOFT SKILLS</a></li>
            </ul>
          </li>
          <li class="nav-item custom-nav-item  pl-3 pr-3"><a href="profile.php" class="nav-link">MY PROFILE</a></li>
          <li class="nav-item custom-nav-item  pl-3 pr-3"><a href="feedback.html" class="nav-link">FEEDBACK</a></li>
          <li class="nav-item custom-nav-item  pl-3 pr-3"><a href="contact.php" class="nav-link">CONTACT US</a></li>
        </ul>
</div>
  </div>
</nav>
 <!-- end navbar -->

<br><br><br>
 
 <!-- text banner -->
 <div class="container-fluid bg-danger txt-banner">
   <div class="row bottom-banner">  
   <div class="col-sm">
     <div class="text-center">
         <h5><i class="fa-regular fa-id-badge mr-3"></i> CONTACT US</h5></div> 
   </div>
    </div>
   </div>
</div>
 <!--/text banner -->

<!--contact form-->
    <div class="container">
        <form method="POST" data-netlify="true">
       <label for="fname">First Name</label>
          <input type="text" id="fname" name="firstname" placeholder="Your name..">
         <label for="lname">Last Name</label>
          <input type="text" id="lname" name="lastname" placeholder="Your last name..">
          <label for="lname">E-mail ID</label><br>
          <input type="email" id="lname" name="email" placeholder="Your Email.."><br><br>
         <label for="subject">Subject</label>
          <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        <input type="submit" value="Submit">
        <button class="google"><a class="google-text"  href="https://docs.google.com/forms/d/e/1FAIpQLScznOaF1YkmETkijd8yKvMgHcqOnw-6BilhI-tP2Xgjwy7R2g/viewform?usp=sf_link">Google Form</button></a>
      </form>
      </div>
      <!--/contact form-->
      

<!-- Bootstrap JS -->
<script src="js/jquery.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
<!-- /Bootstrap JS -->

<!-- fontawesome JS -->
<script src="js/all.min.js"></script> 
<!-- /fontawesome JS -->
</body>
</html>