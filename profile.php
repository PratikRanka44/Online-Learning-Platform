<?php
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

// Fetch data from profile table
$sql = "SELECT * FROM profile";
$result = $conn->query($sql);

// Initialize variables to store fetched data
$profileData = array();
if ($result->num_rows > 0) {
    // Fetching each row as an associative array
    while($row = $result->fetch_assoc()) {
        $profileData = $row;
    }
}

// Close the result set
$result->close();

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
    <!--/Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <style>
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
        .text-center {
    text-align: center !important;
    margin-left: 70px;
    font-size: 25px;
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
            </video>
        </a>
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
                        <!-- Profile Content -->
                            <div class="container rounded">
                                <div class="row">
                                    <div class="col-md-3 border-right">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"></div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-center">Student Profile</h4>
                                            </div> 
                                            <div class="row mt-2">
                                            <form method="POST" action="">
                                            <div class="row mt-2">
                                            <div class="col-md-6">
                                           <label class="labels">First Name</label>
                                          <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo isset($profileData['firstname']) ? $profileData['firstname'] : ''; ?>">
                                          </div>
                                          <div class="col-md-6">
                                          <label class="labels">Last Name</label>
                                          <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo isset($profileData['lastname']) ? $profileData['lastname'] : ''; ?>">
                                          </div>
                                          </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo isset($profileData['email']) ? $profileData['email'] : ''; ?>"></div>
                                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="mobile" placeholder="Mobile No" value="<?php echo isset($profileData['mobile']) ? $profileData['mobile'] : ''; ?>"></div>
                                                <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" name="education" placeholder="Education" value="<?php echo isset($profileData['education']) ? $profileData['education'] : ''; ?>"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6"><label class="labels">Gender</label><input type="text" class="form-control" name="gender" placeholder="Gender" value="<?php echo isset($profileData['gender']) ? $profileData['gender'] : ''; ?>"></div>
                                                <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo isset($profileData['country']) ? $profileData['country'] : ''; ?>"></div>
                                                <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" name="state" placeholder="State" value="<?php echo isset($profileData['state']) ? $profileData['state'] : ''; ?>"></div>
                                                <div class="col-md-6"><label class="labels">Region</label><input type="text" class="form-control" name="region" placeholder="City" value="<?php echo isset($profileData['region']) ? $profileData['region'] : ''; ?>"></div>
                                                <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button">Save</button></div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /Profile Content -->
                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                    </body>
                    </html>
