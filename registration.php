<?php
include("Includes/db.php");
// database connection
session_start(); // Start the session

// Generate and store the verification code
$code = mt_rand(100000, 999999);
$_SESSION["code"] = $code;


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
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

/* Password criteria styles */
.password-criteria {
  margin-bottom: 20px;
}

.password-criteria strong {
  color: #007bff;
}

.password-criteria ul {
  list-style-type: none;
}

.password-criteria ul li {
  margin-left: 20px;
  margin-bottom: 5px;
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
      <form class="material" method="post">
        <header>
          <h1>Create New Account</h1>
          <h2>Fill out the following form to create your new accout in Libra.</h2>
        </header>
        <div class="card-content form-content">
          <div class="field">
            <input type="text" name="name" id="full_name" placeholder=" " required/>
            <label for="name">Name</label>
          </div>
          <div class="field">
            <input type="email" name="mail" id="email_address" placeholder=" " required/>
            <label for="mail">Email</label>
          </div>
          <div class="field">
            <input type="text" name="username" id="user_name" placeholder=" " required/>
            <label for="Username">Username</label>
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
          <div class="password-criteria">
            <p><strong>Password Criteria</strong></p>
            <ul>
              <li>Must be at least 12 characters long.</li>
              <li>Must contain at least one capital letter.</li>
              <li>Must contain at least one number.</li>
              <li>Must contain at least one symbol.</li>
            </ul>
          </div>
          <div class="field">
            <input
              type="password"
              name="confirmpassword"
              id="p2"
              placeholder=" "
              required
              min="12"
              pattern="^(?=.{12,})(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*\-_+=]).*$"
            />
            <label for="confirmpassword">Confirm Password</label>
          </div>
        </div>
        <footer>
          <button class="material primary" type="register" name="register" value="Register">Create Account</button>
          <button class="material primary" type="submit" onclick="location.href='index.html'">Go Back</button>

         
         
        </footer>
      </form>
    </section>
  </body>
</html>

<?php


    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'C:\xampp\htdocs\libra\phpmailer\src\Exception.php';
    require 'C:\xampp\htdocs\libra\phpmailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\libra\phpmailer\src\SMTP.php';

if (isset($_POST['register'])) {

    $emailSendTo=$_POST["name"];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Username="Krishibzar@gmail.com";
    $mail->Password="ixsmmuvkayioucid";

    $mail->setFrom("Krishibzar@gmail.com","Krishibzar");
    $mail->addAddress($_POST["mail"]);
    $mail->Subject = "Account Activation";
    $mail->Body = "Hello,{$emailSendTo}  Your account registration is successfully done !. Thank You.\n
                    Your verification code is {$code}\n Thank you.";
    $mail->send();



	$name = mysqli_real_escape_string($con, $_POST['name']);
	$mail = mysqli_real_escape_string($con, $_POST['mail']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

  
 
  if (strcmp($password, $confirmpassword) == 0) {

    $query = "insert into registration (users_name,user_mail,libra_username,user_password,verification_code) 
       values ('$name','$mail','$username','$password','$code')";




$run_register_query = mysqli_query($con, $query);
echo "<script>alert('SucessFully Inserted');</script>";
echo "<script>window.open('validation.php','_self')</script>";
} else if (strcmp($password, $confirmpassword) != 0) {
echo "<script>
  alert('Password and Confirm Password Should be same');
</script>";
}
}

?>