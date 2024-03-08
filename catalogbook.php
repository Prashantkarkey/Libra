

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libra - Catalog Book</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: green;
            color: white;
            text-align: center;
            padding: 1em;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input, select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: calc(100% - 16px);
        }

        button {
            background-color: green;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: darkgreen;
        }

        footer {
            background-color: green;
            color: white;
            text-align: center;
           
        }
    </style>
</head>
<body>
    <header>
        <h1>Libra - Catalog Book</h1>
    </header>

    <div class="container">
    <form class="material" method="post" action="catalogbook.php" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="book_title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="book_auth" required>

            <label for="description">Description:</label>
            <input type="text" id="description" name="book_desc" required>

            <label for="publicationDate">Publication Date:</label>
            <input type="date" id="publicationDate" name="book_date" required>

            <label for="isbn">ISBN:</label>
            <input type="number" id="isbn" name="book_isbn" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="book_genre" required>

            <label for="language">Language:</label>
            <input type="text" id="language" name="book_language" required>

            <label for="coverImage">Book Front Image:</label>
            <input type="file" id="coverImage" name="book_image" required>
            
            <button class="material primary" type="submit" name="insert" value="insert">Catalog Book</button>
        </form>
    </div>

    <footer>
        &copy; 2024 Libra - Your Personal Library Management System
    </footer>

    <script>
        
    </script>
</body>
</html>


<?php
include("Includes/db.php");
session_start();
$sessmail = $_SESSION['mail'];

if (isset($_POST['insert'])) {
    // getting the text data from fields
    $book_title = mysqli_real_escape_string($con, $_POST['book_title']);
    $book_auth = mysqli_real_escape_string($con, $_POST['book_auth']);
    $book_genre = mysqli_real_escape_string($con, $_POST['book_genre']);
    $book_language = mysqli_real_escape_string($con, $_POST['book_language']);
    $book_date = mysqli_real_escape_string($con, $_POST['book_date']);
    $book_isbn = mysqli_real_escape_string($con, $_POST['book_isbn']);
    $book_desc = mysqli_real_escape_string($con, $_POST['book_desc']);
    

    // getting image
    $book_image = $_FILES['book_image']['name'];
    $book_image_tmp = $_FILES['book_image']['tmp_name'];  // for server

    if (isset($_SESSION['mail'])) {
        move_uploaded_file($book_image_tmp, "Admin/book_images/$book_image");

        $mail = $_SESSION['mail'];
        $getting_id = "SELECT * FROM registration WHERE user_mail = '$mail'";
        $run = mysqli_query($con, $getting_id);
        $row = mysqli_fetch_array($run);
        $id = $row['user_id'];
        $insert_book = "INSERT INTO books (user_fk, book_title, book_auth, 
                                book_genre, book_language, book_image, book_date,
                                book_desc, book_isbn) 
                                VALUES ('$id','$book_title','$book_auth','$book_genre','$book_language','$book_image','$book_date',
                                        '$book_desc','$book_isbn')";

        $insert_query = mysqli_query($con, $insert_book);
        if ($insert_query) {
            echo "<script>alert('book has been added')</script>";
            echo "<script>window.open('homepage.php','_self')</script>";
        } else {
            echo "<script>alert('Error Uploading Data Please Check your Connections ')</script>";
        }
    }
}
?>
