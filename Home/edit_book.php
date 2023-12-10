<?php
session_start();
include "db_conn.php";
$connection = mysqli_connect("localhost", "root", "", "book_t");

if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Fetch book details from the database using $bookId
    $sql = "SELECT * FROM books WHERE id = $bookId";
    $result = mysqli_query($connection, $sql);
    $bookDetails = mysqli_fetch_assoc($result);
} else {
    // Redirect or handle the case where book_id is not provided
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MIA BOOK CORNER</title>
    <link rel="stylesheet" href="./Style/index.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<!-- Navbar Section -->
<nav class="navbar">
    <div class="navbar__container">
    <a href="/" id="navbar__logo"><i class="fas fa-gem"></i>MIA BOOK CORNER</a>
        <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span> <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="home.php" class="navbar__links">Store</a>
            </li>
            <li class="navbar__item">
                <a href="admin.php" class="navbar__links">Admin</a>
            </li>
            <li class="navbar__btn"><a href="../Login/login.php" class="button">LOG OUT</a></li>
        </ul>
    </div>
</nav>

<div class="d-flex justify-content-center align-items-center" style="background-color: beige;">
    <form action="php/edit_book_check.php"
        method="post" 
        enctype="multipart/form-data"
        class="shadow p-4 rounded mt-5"
        style="width: 90%; max-width: 50rem; background-color: #368469; color: #fff;">

        <h3 class="text-center mb-4">Edit Book</h3>

        <!-- <?php
            if (isset($_SESSION['msg'])) {
                $msg = $_SESSION['res'] ? 'success' : 'danger';
                echo '<div class="alert alert-' . $msg . '" role="alert">';
                echo $_SESSION['msg'];
                echo '</div>';
                unset($_SESSION['msg'], $_SESSION['res']);
            }
        ?> -->

        <input type="hidden" name="book_id" value="<?php echo $bookDetails['id']; ?>">

        <div class="mb-3">
            <label for="book_title" class="form-label">Book Title</label>
            <input type="text" 
                class="form-control" 
                id="book_title" 
                name="book_title"
                placeholder="Enter book's title" 
                value="<?php echo $bookDetails['title']; ?>" 
                style="color: gray"
                required>
        </div>

        <div class="mb-3">
            <label for="book_author" class="form-label">Author</label>
            <input type="text" 
                class="form-control" 
                id="book_author" 
                name="book_author"
                placeholder="Enter author's name" 
                value="<?php echo $bookDetails['author_id']; ?>" 
                style="color: gray"
                required>
        </div>

        <div class="mb-3">
            <label for="book_description" class="form-label">Description</label>
            <input type="text" 
                class="form-control" 
                id="book_description" 
                name="book_description"
                placeholder="Enter Description" 
                value="<?php echo $bookDetails['description']; ?>" 
                style="color: gray"
                required>
        </div>

        <div class="mb-3">
            <label for="book_category" class="form-label">Category</label>
            <input type="text" 
                class="form-control" 
                id="book_category" 
                name="book_category"
                placeholder="Enter Category"
                value="<?php echo $bookDetails['category']; ?>"  
                style="color: gray"
                required>
        </div>

        <div class="mb-3">
            <label for="book_cover" class="form-label">Cover</label>
            <input type="file" 
                class="form-control" 
                id="book_cover" 
                name="book_cover"
                placeholder="Select book cover" 
                value="<?php echo $bookDetails['cover']; ?>"
                style="color: gray"
                accept="image/*"
                required>
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <input type="text" 
                class="form-control" 
                id="short_description" 
                name="short_description"
                placeholder="Enter Short Description" 
                value="<?php echo $bookDetails['short_desc']; ?>"
                style="color: gray"
                required>
        </div>

        <div class="mb-3">
            <label for="book_link" class="form-label">Link</label>
            <input type="text" 
                class="form-control" 
                id="book_link" 
                name="book_link"
                placeholder="Enter Link" 
                value="<?php echo $bookDetails['link']; ?>"
                style="color: gray"
                required>
        </div>


        <button type="submit" 
                name="submit"
                class="btn btn-light btn-block" 
                style="background-color: #Eedf57; margin-left: 87%;">
                Edit Book
        </button>
    </form>
</div>
<?php
    // Check for the session variable and display the notification
    // if (isset($_SESSION['update_success']) && $_SESSION['update_success']) {
    //     echo "<script>alert('Update successful!');</script>";
    //     unset($_SESSION['update_success']); // Clear the session variable
    // }
    // ?>
</body>
</html>