<?php
include "../db_conn.php";
$connection = mysqli_connect("localhost", "root", "", "book_t");

if (isset($_POST['category_id'])) {
    $categoryId = $_POST['category_id'];

    // Check if the category is "all"
    if ($categoryId === 'all') {
        // Query to select all books without filtering by category
        $sql = "SELECT * FROM books";
    } else {
        // Use prepared statement to fetch books for the selected category
        $sql = "SELECT * FROM books WHERE category = ?";
    }

    // Execute the query and fetch books
        if ($categoryId === 'all') {
            $result = mysqli_query($connection, $sql);
        } else {
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "i", $categoryId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }


    // Process the $result and generate HTML for displaying books
    // Example:
    $counter = 0;
    while ($book = mysqli_fetch_object($result)) {
        $counter++;
        if ($counter % 3 == 1) {    
            echo '<div class="Book-container2">';
        }

        // echo '<div class="row6">
        //     <img src="./Assets/' . $book->cover . '" alt="">
        //     <p style="color: #097969; padding-top: 20px"><b>' . $book->title . '</b></p>
        //     <p style="font-size: 15px;"><i>Author: ' . $book->author_id . '</i></p>
        //     <p>' . $book->short_desc . '</p>
        //     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal' . $book->id . '" id="' . $book->id . '" 
        //         onclick="showDetails(this);">Review</button>
        //     <a href="' . $book->link . '" target="_blank" class="btn btn-success">Buy</a>
        // </div>';

        // End the current row after every 3 books
        if ($counter % 3 == 0) {
            echo '</div>'; // Close Book-container2
        }
    }
}
?>
