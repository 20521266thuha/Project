<?php
session_start();
include "../db_conn.php";

$connection = mysqli_connect("localhost", "root", "", "book_t");

if ($connection) {
    // Check if cat_id is provided in the URL
    if (isset($_GET['cat_id'])) {
        $catId = $_GET['cat_id'];

        // Delete the category from the database
        $sql = "DELETE FROM categories WHERE id = $catId";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            $_SESSION['msg'] = "Category deleted successfully.";
            $_SESSION['res'] = true;
        } else {
            $_SESSION['msg'] = "Failed to delete category.";
            $_SESSION['res'] = false;
        }
    } else {
        $_SESSION['msg'] = "Invalid request. Category ID not provided.";
        $_SESSION['res'] = false;
    }

    // Redirect back to the admin page after deletion
    header("Location: ../admin.php#all-categories");
    exit();
} else {
    // Handle the case where the database connection failed
    $_SESSION['msg'] = "Failed to connect to the database.";
    $_SESSION['res'] = false;

    // Redirect back to the admin page with an error message
    header("Location: ../admin.php");
    exit();
}
?>
