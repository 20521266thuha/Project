<?php
session_start();
include "../db_conn.php";
$connection = mysqli_connect("localhost", "root", "", "book_t");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST['book_id'];
    $bookTitle = $_POST['book_title'];
    $bookAuthor = $_POST['book_author'];
    $bookDescription = $_POST['book_description'];
    $bookCategory = $_POST['book_category'];
    $bookCover = $_POST['book_cover'];
    $shortDescription = $_POST['short_description'];
    $bookLink = $_POST['book_link'];

    if ($_FILES['book_cover']['error'] == 0) {
        // Set a target directory for your uploads
        $targetDir = "../Assets/";
    
        // Generate a unique filename
        $bookCover = $targetDir . uniqid() . "_" . basename($_FILES["book_cover"]["name"]);
    
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["book_cover"]["tmp_name"], $bookCover);
    }
    

    // Perform the database update
    $sql = "UPDATE books SET 
            title = '$bookTitle',
            author_id = '$bookAuthor',
            short_desc = '$shortDescription',
            category = '$bookCategory',
            cover = '$bookCover',
            description = '$bookDescription',
            link = '$bookLink'
            WHERE id = $bookId";

    $result = mysqli_query($connection, $sql);

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

    header("Location: ../edit_book.php?book_id=$bookId");
    exit();

} else {
    // Redirect or handle the case where the form was not submitted
    header("Location: admin.php");
    exit();
}


// You can handle the $msg and $res values as needed (e.g., display a message to the user)
?>
