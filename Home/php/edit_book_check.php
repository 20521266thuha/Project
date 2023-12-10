<?php
session_start();
include "../db_conn.php";
$connection = mysqli_connect("localhost", "root", "", "book_t");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = mysqli_real_escape_string($connection, $_POST['book_id']);
    $bookTitle = mysqli_real_escape_string($connection, $_POST['book_title']);
    $bookAuthor = mysqli_real_escape_string($connection, $_POST['book_author']);
    $bookDescription = mysqli_real_escape_string($connection, $_POST['book_description']);
    $bookCategory = mysqli_real_escape_string($connection, $_POST['book_category']);
    $shortDescription = mysqli_real_escape_string($connection, $_POST['short_description']);
    $bookLink = mysqli_real_escape_string($connection, $_POST['book_link']);

    if ($_FILES['book_cover']['error'] == 0) {
        // Set a target directory for your uploads
        $targetDir = "../Assets/";
    
        // Generate a unique filename
        $bookCover = $targetDir . uniqid() . "_" . basename($_FILES["book_cover"]["name"]);
    
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["book_cover"]["tmp_name"], $bookCover);
    }

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE books SET 
            title = ?,
            author_id = ?,
            short_desc = ?,
            category = ?,
            cover = ?,
            description = ?,
            link = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssi", $bookTitle, $bookAuthor, $shortDescription, $bookCategory, $bookCover, $bookDescription, $bookLink, $bookId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $msg = "Book information updated successfully";
        $res = true;

        echo "<script>
                if(confirm('Update successful! Back to Admin?')) {
                    window.location.href = '../admin.php';
                } else {
                    window.location.href = '../edit_book.php?book_id=$bookId';
                }
              </script>";
        exit();
    } else {
        $msg = "Error updating book information: " . mysqli_error($connection);
        $res = false;
    }
} else {
    // Redirect or handle the case where the form was not submitted
    header("Location: admin.php");
    exit();
}

// Handle the $msg and $res values as needed (e.g., display a message to the user)
?>
