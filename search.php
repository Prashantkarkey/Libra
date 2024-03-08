<?php
include("Includes/db.php");

if(isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($con, $_GET['search']);
    
    $query = "SELECT * FROM books WHERE book_title LIKE '%$search_query%'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // Display book details
            echo "<div class='productbox'>";
            echo "<a href='bookdetails.php?id={$row['book_id']}'><img src='Admin/book_images/{$row['book_image']}' alt='Image Not Available'></a>";
            echo "<div><p><b>{$row['book_title']}</b></p></div>";
            echo "</div>";
        }
    } else {
        echo "<h3>No results found.</h3>";
    }
} else {
    echo "<h3>Please enter a search query.</h3>";
}
?>
