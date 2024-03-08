<?php
include("Includes/db.php");
//session_start();
include("Functions/functions.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Card styles */
.card {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
  max-width: 400px;
  margin: 0 auto;
}

/* Header styles */
.card header {
  text-align: center;
  margin-bottom: 20px;
}

.card header h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

.card header h2 {
  font-size: 16px;
  color: #666;
}

/* Form content styles */
.card .form-content {
  margin-bottom: 20px;
}

/* Field styles */
.field {
  position: relative;
  margin-bottom: 20px;
}

.field input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

.field input:focus {
  outline: none;
  border-color: green;
}

.field label {
  position: absolute;
  top: 10px;
  left: 10px;
  color: #999;
  pointer-events: none;
  transition: 0.3s ease-out;
}

.field input:focus + label,
.field input:not(:placeholder-shown) + label {
  top: -15px;
  font-size: 12px;
  color: green;
}

/* Footer styles */
.card footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.card footer button {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.card footer button.flat {
  background-color: #ccc;
  color: #333;
}

.card footer button.primary {
  background-color: green;
  color: #fff;
}

.card footer button:hover {
  background-color: darkgreen;
}

  </style>
</head>
<body>
  <section class="card">
    <form class="material" action="login.php" method="post">
      <header>
        <h1>Login to Your Account</h1>
        <h2>Enter your credentials to access your account.</h2>
      </header>
      <div class="card-content form-content">
        <div class="field">
            <input type="email" name="mail" id="email_address" placeholder=" " required/>
            <label for="mail">Email</label>
          </div>
          <div class="field">
            <input
              type="password"
              name="password"
              id="p1"
              placeholder=" "
              required
              min="12"
              pattern="^(?=.{12,})(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*\-_+=]).*$"
            />
            <label for="password">Password</label>
          </div>
          
      <footer>
        <button class="material primary" type="login" name="login" value="login">Login</button>
        <button class="material primary" type="submit" onclick="location.href='index.html'">Go Back</button>

      </footer>
      <br>
      <label id="account" class="text-left"><a id='link' href="registration.php"><b style="color:black"> Create New Account</b></a></label>
								</div>
    </form>
  </section>
</body>
</html>


<?php
// Check if the form is submitted
if (isset($_POST['login'])) {
    // Establish database connection
    include("Includes/db.php");

    // Retrieve form data
    $mail = mysqli_real_escape_string($con, $_POST['mail']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Encrypt the password for comparison
    

    // Construct the query
    $query = "SELECT * FROM registration WHERE user_mail = '$mail' AND user_password = '$password'";

    // Execute the query
    $run_query = mysqli_query($con, $query);

    // Check if any rows are returned
    $count_rows = mysqli_num_rows($run_query);

    if ($count_rows == 0) {
        // If no rows returned, display error and redirect
        echo "<script>alert('Please Enter Valid Details');</script>";
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        // If rows returned, fetch user data
        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row['user_id'];
        }

        // Start session and redirect to homepage
        session_start();
        $_SESSION['mail'] = $mail;
        echo "<script>window.open('homepage.php','_self')</script>";
    }
}
?>
