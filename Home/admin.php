<?php
session_start(); 
include "db_conn.php";


// Check if the user is not logged in
// if (!isset($_SESSION['uname']) || empty($_SESSION['password'])) {
//     header("Location: ../Login/index.php");
//     exit();
// }

$connection = mysqli_connect("localhost", "root", "", "book_t");
$sql = "SELECT * FROM books";
$result = mysqli_query($connection, $sql);

$sql_cat = "SELECT * FROM categories";
$cat = mysqli_query($connection, $sql_cat);
?>

<!DOCTYPE html>
<html lang="en">
<style>
.ad_body {
    display: flex;
}

.ad_body_left {
    flex: 3;
    overflow: auto;
}

.ad_body_right {
    flex: 1;
    position: relative;
}
/* Menu styles */
.ad_body_right table {
    width: 100%;
    border-collapse: collapse;
}

.ad_body_right th,
.ad_body_right td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

.ad_body_right th {
    background-color: #046543;
    color: #fff;
}

.ad_body_right a {
    text-decoration: none;
    color: #046543;
    font-weight: bold;
    font-size: 16px;
    transition: color 0.3s;
}

.ad_body_right a:hover {
    color: #368469;
}
.sticky {
    position: fixed;
    top: 0;
    right: 0; /* Stick to the right side */
    width: 25%; /* Adjust the width as needed */
    z-index: 1000;
    background-color: #fff; /* Set your desired background color */
}
</style>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <link rel="stylesheet" href="./Style/index.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: beige">

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
            <li class="navbar__btn" style="width: 32%;"><a href="../Login/login.php" class="button" style="width: 100%">LOG OUT</a></li>
        </ul>
    </div>
</nav>

<!-- All books -->
<br>
<div class="ad_body" style="margin-left: 50px">
    <div class="ad_body_left">
        <div style="display: flex; justify-content:center">
            <h4 id="all-books" style="flex:2;">All Books</h4>
            <a href="add_book.php" class="btn btn-edit" style="flex: 1;background-color: cadetblue;max-width: 75px;margin-right: 23px;margin-bottom: 6px;padding-bottom: 3px;padding-top: 3px">Add</a>
            <a href="./php/all_book_check.php" class="btn btn-edit" style="flex: 1;background-color: lightpink;max-width: 83px;margin-right: 73px;margin-bottom: 6px;padding-bottom: 3px;padding-top: 3px">See All</a>
        </div>
        <table class="table table-bordered shadow" style="max-width:850px; background-color:white">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                while ($book = mysqli_fetch_object($result)) {
                    echo '<tr>';
                    ?>
                    <td><?php echo $book->id; ?></td>
                    <td>
                        <img src="./Assets/<?php echo $book->cover; ?>" style="width: 40%; height: 50%;">
                        <br>
                        <?php echo $book->title; ?>
                    </td>
                    <td><?php echo $book->author_id; ?></td>
                    <td><?php echo $book->short_desc; ?></td>
                    <td><?php echo $book->category; ?></td>
                    <td>
                        <a href="./edit_book.php?book_id=<?php echo $book->id; ?>" class="btn btn-edit" style="background-color: #e6e6b9;">Edit</a>
                        <a href="./php/func_delete.php?book_id=<?php echo $book->id; ?>" class="btn btn-delete" style="background-color: #f87e72;margin-top: 11px" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                    </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <br>
        <div style="display: flex; justify-content:center">
            <h4 style="flex: 2">All Categories</h4>
            <a href="add_cat.php" class="btn btn-edit" style="flex: 1;background-color: cadetblue;max-width: 75px;margin-right: 23px;margin-bottom: 6px;padding-bottom: 3px;padding-top: 3px">Add</a>
            <a href="./php/all_cat_check.php" class="btn btn-edit" style="flex: 1;background-color: lightpink;max-width: 83px;margin-right: 380px;margin-bottom: 6px;padding-bottom: 3px;padding-top: 3px">See All</a>
        </div>

        <table class="table table-bordered shadow" id="all-categories" style="max-width:850px; background-color: white " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Categories</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($cate = mysqli_fetch_object($cat)) {
                    echo '<tr>';
                    ?>
                    <td><?php echo $cate->id; ?></td>
                    <td><?php echo $cate->name; ?></td>
                    <td>
                        <a href="./edit_cat.php?cat_id=<?php echo $cate->id; ?>" class="btn btn-edit" style="background-color: #e6e6b9;">Edit</a>
                        <a href="./php/func_delete_cat.php?cat_id=<?php echo $cate->id; ?>" class="btn btn-delete" style="background-color: #f87e72;margin-left: 4  px" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                    </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="ad_body_right" id="menu" style="background-color:beige">
        <table style="margin-top: 37px; max-width: 80%; border-radius: 2px;">
            <tr>
                <th>Navigation</th>
            </tr>
            <tr style="background-color:white">
                <td><a href="#all-books" >All Books</a></td>

            </tr>
            <tr style="background-color:white">
                <td><a href="#all-categories">All Categories</a></td>
            </tr>
        </table>
    </div>
    </div>
</div>        


<!-- All categories -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Add this script for navbar scrolling -->
<script>
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    var navbar = document.querySelector('nav.navbar'); // Updated selector

    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      navbar.classList.add('sticky');
    } else {
      navbar.classList.remove('sticky');
    }
  }
</script>

<script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            var menu = document.getElementById("menu");
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                menu.classList.add("sticky");
            } else {
                menu.classList.remove("sticky");
            }
        }
</script>

<script>
    window.onload = function () {
        // Check if there is an anchor in the URL
        var anchor = window.location.hash;
        if (anchor) {
            // Scroll to the element with the corresponding ID (e.g., cat_123)
            var element = document.getElementById(anchor.substring(1));
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }
    };
</script>

</body>
</html>
