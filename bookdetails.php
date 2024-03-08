
<?php
include("Functions/functions.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libra - Book Details</title>
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

        nav {
            background-color: green;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .logo {
            height: 50px; /* Adjust height as needed */
        }

        .user-info {
            color: white;
            font-size: 20px;
            margin-right: 20px; /* Add right margin for gap */
        }  

         footer {
            background-color: green;
            color: white;
            text-align: center;
            padding: 1em;
        }

       

        .logo {
            height: 50px;
            cursor: pointer;
        }

        .container {
            text-align: center;
            padding: 20px; /* Add padding to the main container */
        }

        .book-details-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap; /* Allow book details to wrap on smaller screens */
            gap: 20px; /* Add gap between book details */
        }

        .book-details {
            background-color: green;
            padding: 20px;
            border-radius: 10px;
            color: white;
            flex: 1; /* Take equal space in flex container */
            max-width: 400px; /* Limit maximum width of book details */
            text-align: center; /* Align text to left */
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin: 5px;
        }

        .button.primary {
            background-color: green;
            color: white;
        }

        .button.primary:hover {
            background-color: darkgreen;
        }

        @media screen and (max-width: 768px) {
            .book-details {
                max-width: none; /* Remove max-width for smaller screens */
            }
        }

        @media screen and (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .logo {
        margin-bottom: 10px;
    }

    nav a {
        margin-bottom: 10px;
    }

    .user-info {
        display: none;
    }

    form {
        width: 100%;
        margin-bottom: 15px;
    }

    form input[type="text"] {
        width: calc(100% - 20px);
        padding: 10px;
    }

    form button {
        width: calc(100% - 20px);
        padding: 10px;
    }
}

        
    </style>
</head>
<body>


<nav>
    <div>
        <a href="homepage.php"><img src="Admin/book_images/libra logo 1.png" alt="Libra Logo" class="logo"></a>
    </div>
    <div>
        <?php getUsername(); ?>
    </div>
    <!-- Search form -->
    <form method="get" action="search.php">
        <input type="text" name="search" placeholder="Search for Book...">
        <button type="submit">Search</button>
    </form>
    <div>
        <a href="aboutus.php">About Us</a>
        <a href="catalogbook.php">Add Book</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="container">
    <?php
    include("Includes/db.php");
    $sess_email_address = $_SESSION['mail'];

    global $con;

    if (isset($_GET['id'])) {
        $book_id = $_GET['id'];
        $query = "SELECT * FROM books WHERE book_id = $book_id";
        $run_query = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($run_query);

        if ($resultCheck > 0) {
            while ($rows = mysqli_fetch_array($run_query)) {
                $book_title = $rows['book_title'];
                $book_image = $rows['book_image'];
                $book_author = $rows['book_auth'];
                $book_genre = $rows['book_genre'];
                $book_language = $rows['book_language'];
                $book_date = $rows['book_date'];
                $book_isbn = $rows['book_isbn'];
                $book_desc = $rows['book_desc']; // Corrected variable name

                echo "<div class='book-details-container'>
                        <div class='book-details'>
                            <img src='Admin/book_images/$book_image' class='rounded mx-auto d-block' height='250px' width='300px'>
                            <h1>$book_title</h1>
                            <p>Description: $book_desc</p>
                            <p>Genre: $book_genre</p>
                            <p>Author: $book_author</p>
                            <p>Language: $book_language</p>
                            <p>Publication Date: $book_date</p>
                            <p>ISBN: $book_isbn</p>
                        </div>
                    </div>";
            }
        } else {
            echo "<br><br><hr><h1 align='center'>Book Not Uploaded!</h1><br><br><hr>";
        }
    } else {
        echo "<br><br><hr><h1 align='center'>Book ID not provided!</h1><br><br><hr>";
    }
    ?>
</div>

<div class="button-container">
    <form method="post" action="delete.php">
        <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
        <button class="button primary" type="submit" name="delete">Delete Book</button>
    </form>
</div>

<footer>
    &copy; 2024 Libra - Your Personal Library Management System
</footer>
</body>
</html>
