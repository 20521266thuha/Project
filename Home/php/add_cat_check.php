<?php
$msg = "";

session_start();

// Database Connection
include "../db_conn.php";
$connection = mysqli_connect("localhost", "root", "", "book_t");

if (isset($_POST['submit'])) {
    if (isset($_POST['category_name'])) {
        $name = $_POST['category_name'];

        if (empty($name)) {
            $msg = "The category name is required";
            header("Location: ../add_cat.php?error=$msg");
        } else {
            // Use prepared statement to prevent SQL injection
            $sql = "INSERT INTO categories (name) VALUES (?)";
            $stmt = $connection->prepare($sql);

            $stmt->bind_param("s", $name);
            $res = $stmt->execute();

            if ($res) {
                $msg = "Successfully created!";
                header("Location: ../admin.php#all-categories");
                exit();
            } else {
                $msg = "Unknown Error Occurred!";
                header("Location: ../add_cat.php?error=$msg");
                exit();
            }
        }
    } else {
        $msg = "Category name is not submitted";
        header("Location: ../add_cat.php?error=$msg");
        exit();
    }
} else {
    header("Location: ../admin.php");
    exit();
}
?>
