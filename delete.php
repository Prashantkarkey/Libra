<?php
include("Includes/db.php");

if (isset($_POST['delete'])) {
    $book_id = $_POST['book_id'];

    // Delete the book from the database
    $delete_query = "DELETE FROM books WHERE book_id = $book_id";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Book deleted successfully');</script>";
        echo "<script>window.open('homepage.php', '_self');</script>";
    } else {
        echo "<script>alert('Failed to delete book');</script>";
    }
}
?>
