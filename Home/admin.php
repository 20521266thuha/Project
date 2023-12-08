<?php
session_start(); 
include "db_conn.php";

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
<body>

<!-- Navbar Section -->
<nav class="navbar">
    <div class="navbar__container">
        <a href="/" id="navbar__logo"><i class="fas fa-gem"></i>REVIEW CORNER</a>
        <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span> <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="home.php" class="navbar__links">Home</a>
            </li>
            <li class="navbar__item">
                <a href="https://www.instagram.com/mia.bookcorner/" class="navbar__links">About us</a>
            </li>
            <li class="navbar__item">
                <a href="/" class="navbar__links">Contact</a>
            </li>
            <li class="navbar__btn"><a href="../Login/login.php" class="button">LOG OUT</a></li>
        </ul>
    </div>
</nav>

<!-- All books -->
<br>
<div class="ad_body" style="margin-left: 50px">
    <div class="ad_body_left">
        <h4>All Books</h4>
        <table class="table table-bordered shadow" id="all-books" style="max-width:850px">
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
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <br>
        <h4>All Categories</h4>
        <table class="table table-bordered shadow" id="all-categories" style="max-width:850px" >
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
                        <button type="button" class="btn btn-edit">Edit</button>
                        <button type="button" class="btn btn-delete">Delete</button>
                    </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="ad_body_right" id="menu">
        <table style="margin-top: 37px; max-width: 80%; border-radius: 2px;">
            <tr>
                <th>Navigation</th>
            </tr>
            <tr>
                <td><a href="#all-books">All Books</a></td>
            </tr>
            <tr>
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


</body>
</html>
