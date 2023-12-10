<?php
session_start();
include "../db_conn.php";

$connection = mysqli_connect("localhost", "root", "", "book_t");

// Pagination configuration
$recordsPerPage = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $recordsPerPage;

$sql_cat = "SELECT * FROM categories LIMIT $offset, $recordsPerPage";
$cat = mysqli_query($connection, $sql_cat);

// Get the total number of records for pagination
$totalRecords = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM categories"));
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .search-container {
        margin-bottom: 20px;
    }

    .search-input {
        flex: 1;
        margin-right: 10px;
    }

    .search-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ADMIN</title>
    <link rel="stylesheet" href="../Style/index.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
          integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
          crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
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
                <a href="../admin.php" class="navbar__links">Admin</a>
            </li>
            <li class="navbar__btn" style="width: 32%;"><a href="../Login/login.php" class="button" style="width: 100%">LOG OUT</a></li>
        </ul>
    </div>
</nav>

<!-- All cats -->
<br>
<div class="ad_body" style="margin-left: 50px">
    <div class="ad_body_left">

        <!-- Seach bar -->
        <div class="search-container d-flex justify-content-end" style="padding-bottom: 20px">
            <form method="get" class="d-flex">
                <input type="text" class="form-control search-input" name="search" style="width: 867px" placeholder="Search by name, author, or category" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                <button type="submit" class="btn btn-primary search-button" style="margin-right: 88px; background-color: lightseagreen">Search</button>
            </form>
        </div>
        <!-- Table All Cats  -->
        <div style="display: flex; justify-content:center">
            <h4 style="flex:2; margin-left: 186px">All Categories</h4>
            <a href="../add_cat.php" class="btn btn-edit"
               style="flex: 1;background-color: cadetblue;max-width: 75px;margin-right: 23px;margin-bottom: 6px;padding-bottom: 3px;padding-top: 3px">Add</a>
            <a href="../admin.php#all-categories" class="btn btn-edit"
               style="flex: 1;background-color: lightpink;max-width: 83px;margin-right: 190px;margin-bottom: 6px;padding-bottom: 3px;padding-top: 3px">Back</a>
        </div>
        <div style="display: flex; justify-content: center">
            <table class="table table-bordered shadow" id="all-categories" style="max-width:850px; background-color:white">
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
                            <a href="../edit_cat.php?cat_id=<?php echo $cate->id; ?>" class="btn btn-edit">Edit</a>
                            <a href="func_delete_cat.php?cat_id=<?php echo $cate->id; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                        </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    
    <!-- Pagination Links -->
    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <ul class="pagination">
            <?php
            // Display pagination links
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </div>

</body>
</html>
