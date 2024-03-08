<?php

session_start();

include("Includes/db.php");

function getUsername()
{
    if (isset($_SESSION['mail'])) {
        global $con;
        $mail = mysqli_real_escape_string($con, $_SESSION['mail']); // Sanitize user input

        $query = "SELECT * FROM registration WHERE user_mail = '$mail'";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            if (mysqli_num_rows($run_query) > 0) {
                $row_cat = mysqli_fetch_array($run_query);
                $libra_username = $row_cat['libra_username'];
                echo "<label style='color:white; padding-top:7px; font-size:20px;'>Hello, $libra_username</label>";
            } else {
                echo "<label style='color:white; padding-top:7px; font-size:20px;'>User not found</label>";
            }
        } else {
            echo "<label style='color:white; padding-top:7px; font-size:20px;'>Error executing query</label>";
        }
    } else {
        echo "<a href='Login.php'><div class='text-success logins mx-5'>Login</div></a>";
    }
}

function getBooks()
{
    include("Includes/db.php");
    global $con;
    $sess_email_address = $_SESSION['mail'];
    // Enclose the email address in single quotes in the SQL query
    $query = "SELECT * FROM books WHERE user_fk IN (SELECT user_id FROM registration WHERE user_mail='$sess_email_address')";
    $run_query = mysqli_query($con, $query);
    $count = 0;
    if ($run_query) {
        while ($row = mysqli_fetch_assoc($run_query)) {
            $count = $count + 1;
            $book_title =  $row['book_title'];
            $image =  $row['book_image'];
            $id =     $row['book_id'];
            $path = "Admin/book_images/" . $image;

            echo "
                <div class='productbox'>
                    <a href='bookdetails.php?id=$id'>
                    <img src='Admin/book_images/$image' alt= 'Image Not Available' onerror=this.src='../Images/Website/noimage.jpg'>
                    </a>
                    <div>
                        <p><b>$book_title</b></p>
                    </div>
                </div>";
        }
    } else {
        echo "<br><br><hr><h1 align='center'>Book Not Uploaded!</h1><br><br><hr>";
    }
}




