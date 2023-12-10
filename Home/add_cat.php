<!DOCTYPE html>
<html lang="en">
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

<div class="d-flex justify-content-center align-items-center" style="height: 100vh; margin-top: -90px; background-color: beige;">
    <form action="php/add_cat_check.php"
        method="post" 
        class="shadow p-4 rounded mt-5"
        style="width: 90%; max-width: 50rem; background-color: #368469; color: #fff;">

        <h3 class="text-center mb-4">Add New Category</h3>

        <?php if (!empty($msg)): ?>
            <div class="alert alert-<?php echo $res ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" 
                class="form-control" 
                id="category_name" 
                name="category_name"
                placeholder="Enter category name" 
                required>
        </div>

        <button type="submit" 
                name="submit"
                class="btn btn-light btn-block" 
                style="background-color: #Eedf57;">
                Add Category
        </button>
    </form>
</div>

</body>
</html>