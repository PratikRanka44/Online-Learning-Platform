<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "127.0.0.1";
$username = "pratik";
$password = "Studyspace@2004"; // Change this to your actual password
$database = "studyspace"; // Your database name

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['new_password'])) {
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];

            // Check if the provided username and email match a record in the database
            $sql = "SELECT * FROM register WHERE firstname = '$firstname' AND email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                // Update the user's password in the database
                $update_sql = "UPDATE register SET password = '$new_password' WHERE firstname = '$firstname'";
                if ($conn->query($update_sql) === TRUE) {
                    echo "<script type='text/javascript'> alert('Password updated successfully!')</script>";
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                echo "<script type='text/javascript'> alert('Invalid firstname or email.')</script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Please provide firstname, email, and new password.')</script>";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
if (isset($conn)) {
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        /* Your CSS styles here */
        label {
            margin-left: 265px;
            font-size: 16px;
        }

        input[type="text"],input[type="email"] {
            border-radius: 48px;
            margin-top: -21px;
            margin-left: 215px;
        }

        input[type="password"] {
            border-radius: 48px;
            margin-top: -3px;
            margin-left: 218px; 
        } 


        input[type="submit"] {
            margin-left: 215px;
            font-size: larger;
            margin-top: 11px;
            background-color: #1f78a1;
        }

        form {
            display: block;
            margin-block-end: 1em;
            height: auto;
            width: 601px;
            margin-left: 395px;
            margin-top: 42px;
            background-color: #ffff;
        }

        b {
            margin-top: -2px;
            margin-left: -40px;
            font-size: 19px;
           
        }

          a {
            margin-left:236px ;
            color: blue;
          }

        h3 {
            margin-top: -2px;
            margin-left: 241px;
            font-size: 19px;
        }

        h4 {
            margin-top: -1px;
            margin-left: 266px;
            font-size: 19px;
        }

        h5 {
            margin-left: 215px;
            font-size: 19px;
        }

        h2 {
            margin-left: 587px;
            font-size: 36px;
            margin-top: 84px;
        }
    </style>
</head>
<body style="background-color: grey;">
<h2>Password Reset</h2>
<form action="#" method="post"><br>
    <label for="firstname"><h3>FIRSTNAME:</h3></label><br>
    <input type="text" id="firstname" name="firstname" required><br><br>
    <label for="email"><h4>EMAIL:</h4></label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="new_password"><b>NEW PASSWORD:</b></label><br><br>
    <input type="password" id="new_password" name="new_password" required><br><br><br>
    <input type="submit" value="Reset Password"><br><br>
    <a href="login.php">LOGIN NOW!</a><br><br>
</form>
</body>
</html>
