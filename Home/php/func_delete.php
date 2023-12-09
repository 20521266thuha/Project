<?php
session_start();
include "../db_conn.php";
$connection = mysqli_connect("localhost", "root", "", "book_t");

if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Delete the book from the database
    $sql = "DELETE FROM books WHERE id = $bookId";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['msg'] = "Book deleted successfully";
        $_SESSION['res'] = true;
    } else {
        $_SESSION['msg'] = "Failed to delete the book";
        $_SESSION['res'] = false;
    }
} else {
    $_SESSION['msg'] = "Invalid book ID";
    $_SESSION['res'] = false;
}

header("Location: ../admin.php");
exit();
?>
