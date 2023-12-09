<?php
session_start();
include "db_conn.php";
$connection = mysqli_connect("localhost", "root", "", "book_t");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required form fields are set
    if (isset($_POST['cat_id'], $_POST['category_name'])) {
        $catId = $_POST['cat_id'];
        $catName = $_POST['category_name'];

        // Check if the connection was successful
        if ($connection) {
            // Update category information in the database
            $sql = "UPDATE categories SET name = '$catName' WHERE id = $catId";
            $result = mysqli_query($connection, $sql);

            // Check if the update was successful
            if ($result) {
                $_SESSION['msg'] = "Category information updated successfully.";
                $_SESSION['res'] = true;
            } else {
                $_SESSION['msg'] = "Failed to update category information.";
                $_SESSION['res'] = false;
            }

            // Redirect back to the admin page after the update
            header("Location: ../admin.php#all-categories");
            exit();

        } else {
            // Handle the case where the database connection failed
            $_SESSION['msg'] = "Failed to connect to the database.";
            $_SESSION['res'] = false;
            header("Location: ../edit_cat.php?cat_id=$catId");
            exit();
        }
    } else {
        // Redirect or handle the case where required form fields are not set
        $_SESSION['msg'] = "Invalid form submission.";
        $_SESSION['res'] = false;
        header("Location: ../admin.php");
        exit();
    }
} else {
    // Redirect or handle the case where the form was not submitted
    $_SESSION['msg'] = "Form not submitted.";
    $_SESSION['res'] = false;
    header("Location: ../admin.php");
    exit();
}
?>
