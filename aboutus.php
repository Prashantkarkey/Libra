<?php

//session_start();
include("Functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libra - Homepage</title>
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

        

        .productbox {
               float: left;
               margin: 15px;
               padding: 15px;
               border-style: outline;
               border: 2px solid;
               border-color: green;
               border-radius: 10px;
          }

          .productbox img {
               height: 200px;
               width: 250px;
               border-style: double;
               border: 2px solid;
               border-color: black;
               border-width: 2px;
               border-radius: 10px;
          }

          .productbox p {
               text-align: center;
              
          }
        
        footer {
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }


        /* Styling for the About Us section */
.about {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 40px;
}


/* Styling for the About Us content */
.about-content {
    flex: 1;
    padding-right: 40px;
    
}

.about-content h2{
    font-size: 30px;
    color: #333;
    margin-bottom: 10px;
    
}

.about-content p {
    font-size: 20px;
    color: #333;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Styling for the About Us image */
.about-image {
    flex: 1;
}

.about-image img {
    max-width: 70%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

@media screen and (max-width: 768px) {
            nav {
                flex-direction: column; /* Stack items vertically on mobile */
                align-items: center; /* Align items to the center on mobile */
                padding: 20px; /* Increase padding for better spacing on mobile */
            }

            .logo {
                margin-bottom: 10px; /* Add space between logo and other elements on mobile */
            }

            nav a {
                margin-bottom: 10px; /* Add space between links on mobile */
            }

            .user-info {
                display: none; /* Hide user info on mobile for cleaner layout */
            }

            /* Search form specific adjustments for mobile */
            form {
                width: 100%; /* Make search form full width on mobile */
                margin-bottom: 15px; /* Add space between search and other elements */
            }

            form input[type="text"] {
                width: calc(100% - 20px); /* Make search input full width on mobile, considering button width */
                padding: 10px; /* Increase padding for better input experience */
            }

            form button {
                width: calc(100% - 20px); /* Make search button full width on mobile */
                padding: 10px; /* Increase padding for better button experience */
            }
        }
        
        /* About section adjustments */
    .about {
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .about-content {
        text-align: center;
        padding: 10px;
    }

    .about-image img {
        max-width: 100%;
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
            <a href="bookdetails.php">About Us</a>
            <a href="catalogbook.php">Add Book</a>
           
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <section class="about">
        <div class="about-content">
            <h3>About Us</h3>
            <p> We, the creators of Libra, are passionate bibliophiles who understand the joy and challenge of managing a personal library. We believe that everyone should have a user-friendly and efficient way to catalog their book collection, and that's why we built Libra.</p>
            <p>We aim to change the way of the traditional way of shopping. You don't need to waste your time going to a local market, bargain with shopkeepers, and bring your bag. </p>
			<h3>Join the Libra Community</h3>
        <p>We invite you to explore Libra and discover how it can simplify and enrich your book collection management experience. If you have any questions or suggestions, please don't hesitate to reach out to us.

Together, let's celebrate the joy of reading and create a thriving community of book lovers! </p>

        </div>
        <div class="about-image">
            <img src="Admin\book_images\libra logo 1.png" alt="About Us Image">
        </div>
    </section>

    <footer>
        &copy; 2024 Libra - Your Personal Library Management System
    </footer>
</body>
</html>
