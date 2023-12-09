<?php
session_start();
include "db_conn.php";

$connection = mysqli_connect("localhost", "root", "", "book_t");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookTitle = $_POST['book_title'];
    $bookAuthor = $_POST['book_author'];
    $bookDescription = $_POST['book_description'];
    $bookCategory = $_POST['book_category'];
    $shortDescription = $_POST['short_description'];
    $bookLink = $_POST['book_link'];

	// Handling file upload for the book cover
	if ($_FILES['book_cover']['error'] == 0) {
    // Specify the target directory
    $targetDir = "../Assets/";

    // Use the original filename and upload to the target directory
    $bookCover = $targetDir . basename($_FILES['book_cover']['name']);
    move_uploaded_file($_FILES['book_cover']['tmp_name'], $bookCover);
}



    // Insert new book details into the database
    $sql = "INSERT INTO books (title, author_id, description, category, cover, short_desc, link)
            VALUES ('$bookTitle', '$bookAuthor', '$bookDescription', '$bookCategory', '$bookCover', '$shortDescription', '$bookLink')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
		$lastInsertedId = mysqli_insert_id($connection);
		echo "Last Inserted ID: " . $lastInsertedId;

        $_SESSION['msg'] = "Book added successfully";
        $_SESSION['res'] = true;

		header("Location: ../admin.php#book_$lastInsertedId");
		exit();

    } else {
        $_SESSION['msg'] = "Failed to add the book";
        $_SESSION['res'] = false;
    }

    	// header("Location: ../admin.php#book_$lastInsertedId");
        // exit();
} else {
    // Redirect if the form is not submitted
    header("Location: add_book.php");
    exit();
}
?>