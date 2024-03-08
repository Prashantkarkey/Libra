<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
include("Includes/db.php");

session_start();


if (isset($_POST['verify'])) {
    $user_code = $_POST['verification_code'];
    $stored_code = $_SESSION['code']; // The code generated during registration

     

    if ($user_code == $stored_code) {
        $update_query = "update registration set verified = 1 where verification_code = '$user_code'";
        $run_update_query = mysqli_query($con, $update_query);
 /*echo "User Code: " . $user_code . "<br>";
echo "Stored Code: " . $stored_code . "<br>";*/


        if ($run_update_query) {
            echo "<script>alert('Verification Successful!');</script>";
            echo "<script>window.open('login.php', '_self');</script>";
        } else {
            echo "<script>alert('Verification Failed. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Invalid verification code.');</script>";
        
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verification Code</title>
  <style>
    .container {
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
  padding-top: 50px;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.verification-form {
  display: flex;
  flex-direction: column;
}

input[type="text"] {
  padding: 10px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
}

button {
  padding: 10px 20px;
  background-color: green;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: darkgreen;
}

#message {
  margin-top: 20px;
  font-weight: bold;
}

  </style>
  </head>
<body>
  <div class="container">
    <h1>Verification Code</h1>
    <form id="verificationForm"  class="verification-form" method="post">
      <input type="text" id="verification_code" name="verification_code" placeholder="Enter your verification code received in email" required>
      <button type="submit" name="verify" value="verify">Submit</button>
    </form>
    <div id="message"></div>
  </div>

  <script src="script.js"></script>
</body>
</html>
