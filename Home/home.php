<?php
session_start(); 
include "db_conn.php";

    $connection = mysqli_connect("localhost", "root", "", "book_t");
    $sql = "SELECT * FROM books";
    $result = mysqli_query($connection, $sql);

    // Get total number of books
    $sqlCount = "SELECT COUNT(*) as total FROM books";
    $resultCount = mysqli_query($connection, $sqlCount);
    $totalBooks = mysqli_fetch_assoc($resultCount)['total'];

    // Set the number of books per page
    $booksPerPage = 9;

    // Calculate total pages
    $totalPages = ceil($totalBooks / $booksPerPage);

    // Get the current page number
    $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the offset for the query
    $offset = ($currentpage - 1) * $booksPerPage;

    // Fetch books for the current page
    $sql = "SELECT * FROM books LIMIT $offset, $booksPerPage";
    $result = mysqli_query($connection, $sql);

    // Fetch categories from the database
    $sqlCategories = "SELECT * FROM categories";
    $resultCategories = mysqli_query($connection, $sqlCategories);
    $categories = mysqli_fetch_all($resultCategories, MYSQLI_ASSOC);

    ?>

<!DOCTYPE html>
<html lang="en">
  <style>
    .pages a {
        display: inline-block;
        padding: 8px 12px;
        margin-right: 10px;
        text-decoration: none;
        background-color: #3498db;
        color: #fff;
        border-radius: 4px;
        transition: background-color 0.3s;
        width: 35px;
        justify-content: center;
        display: flex;
    }

    .pages a:hover {
        background-color: #2980b9;
    }
  </style>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MIA BOOK CORNER</title>
    <link rel="stylesheet" href="./Style/index.css" />
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.js"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
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
          <li class="navbar__btn"><a href="../Login/login.php" class="button">Admin</a></li>
        </ul>
      </div>
    </nav>

    <!-- Hero Section -->
    <div class="main">
        <div class="main__container">
          <div class="main__content">
            <h1>MIA</h1>
            <h2>BOOK CORNER</h2>
            <p>Books are a uniquely portable magic.</p>
            <button class="main__btn"><a href="#search">Start your book journey</a></button>
          </div>
          <div class="main__img--container">
            <img id="main__img" src="./Assets/Mia.png" />
          </div>
        </div>
    </div>

    <div class="space" style="HEIGHT: 30px; background-color: #fada5e ">
    </div>

      
    <form action="search.php" method="post" style="background-color: beige; padding-top: 30px; padding-left: 120px;">
              <label for="search" style="display: none;">Search book</label>
              <input id="search" name="text" style="height: 35px; width: 300px; margin-left: 81px;" placeholder="Search book...">
              <button name="submit" style="height: 37px; width: 42px; font-size: 16px; cursor: pointer;">
                  &#128269; 
              </button>
          </form>

    
          <div class="cat" style="background-color: beige; padding-left: 200px; padding-top: 20px;">
            <label>Categories</label>
            <button class="category-btn" data-category-id="all" style="margin-left: 8px; width:100px; border-radius: 4px; height:29px;">All</button>
            <?php
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo '<button class="category-btn" data-category-id="' . htmlspecialchars($category['id']) . '" style="margin-left: 8px; width:100px; border-radius: 4px; height:29px;">' . htmlspecialchars($category['name']) . '</button>';
                }
            }
            ?>
          </div>



    
    <div id="books-container" style=" padding-top: 20px;background-color: beige"></div>


    <?php
      $counter = 0;
      while ($book = mysqli_fetch_object($result)) {
          $counter++;
          if ($counter % 3 == 1) {
              echo '<div class="Book-container2">';
          }
    ?>
      <div class="row6">
          <div class="row6">
              <img src="./Assets/<?php echo $book->cover; ?>" alt="">
              <p style="color: #097969; padding-top: 20px"><b><?php echo $book->title; ?></b></p>
              <p style="font-size: 15px;"><i>Author: <?php echo $book->author_id; ?></i></p>
              <p><?php echo $book->short_desc; ?></p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $book->id; ?>" id="<?php echo $book->id; ?>" 
              onclick="showDetails(this);">Review</button>
              <a href="<?php echo $book->link; ?>" target="_blank" class="btn btn-success">Buy</a>
          </div>  
      </div>

    <?php
    // End the current row after every 3 books
    if ($counter % 3 == 0) {
        echo '</div>'; // Close Book-container2
    }
    ?>

    <div class="modal fade" id="exampleModal<?php echo $book->id; ?>">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" style="height: 550px">
            <div class="modal-content">
                <!-- Modal content... -->
                <div class="modal-header bg-warning-subtle">
                    <h3 class="modal-title" fs-5 id="exampleModalLabel"><?php echo $book->title; ?></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-success-subtle border border-dark">
                    <p><?php echo $book->description; ?></p>
                </div>
                <div class="modal-footer bg-warning-subtle">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Close any open container if the total number of books is not a multiple of 3
if ($counter % 3 != 0) {
    echo '</div>'; // Close Book-container2
}
?>

  <div class="pages" style="display: flex; justify-content: center; background-color: beige; margin-top: -220px; margin-bottom: -250px; ">
      <?php
      // Generate page buttons
      for ($page = 1; $page <= $totalPages; $page++) {
          echo '<a href="?page=' . $page . '" style="margin-right: 10px; width: 30px;">' . $page . '</a>';
      }
      ?>
  </div>

          <!-- Footer -->
    <div class="footer__container">
      <div class="footer__links">
        <div class="footer__link--wrapper">
          <div class="footer__link--items">
            <h2>About Us</h2>
            <a href="/sign__up">How it works</a> <a href="/">Testimonials</a>
            <a href="/">Careers</a> <a href="/">Investments</a>
            <a href="/">Terms of Service</a>
          </div>
          <div class="footer__link--items">
            <h2>Contact Us</h2>
            <a href="/">Contact</a> <a href="/">Support</a>
            <a href="/">Destinations</a> <a href="/">Sponsorships</a>
          </div>
        </div>
        <div class="footer__link--wrapper">
          <div class="footer__link--items">
            <h2>Videos</h2>
            <a href="/">Submit Video</a> <a href="/">Ambassadors</a>
            <a href="/">Agency</a> <a href="/">Influencer</a>
          </div>
          <div class="footer__link--items">
            <h2>Social Media</h2>
            <a href="/">Instagram</a> <a href="/">Facebook</a>
            <a href="/">Youtube</a> <a href="/">Twitter</a>
          </div>
        </div>
      </div>
      <section class="social__media">
        <div class="social__media--wrap">
          <div class="footer__logo">
            <a href="/" id="footer__logo"><i class="fas fa-gem"></i>REVIEW CORNER</a>
          </div>
          <p class="website__rights">© Corner 2022. All rights reserved</p>
          <div class="social__icons">
            <a
              class="social__icon--link"
              href="/"
              target="_blank"
              aria-label="Facebook"
            >
              <i class="fab fa-facebook"></i>
            </a>
            <a
              class="social__icon--link"
              href="/"
              target="_blank"
              aria-label="Instagram"
            >
              <i class="fab fa-instagram"></i>
            </a>
            <a
              class="social__icon--link"
              href="//www.youtube.com/channel/UCsKsymTY_4BYR-wytLjex7A?view_as=subscriber"
              target="_blank"
              aria-label="Youtube"
            >
              <i class="fab fa-youtube"></i>
            </a>
            <a
              class="social__icon--link"
              href="/"
              target="_blank"
              aria-label="Twitter"
            >
              <i class="fab fa-twitter"></i>
            </a>
            <a
              class="social__icon--link"
              href="/"
              target="_blank"
              aria-label="LinkedIn"
            >
              <i class="fab fa-linkedin"></i>
            </a>
          </div>
        </div>
      </section>
    </div>


    <script>
      function showDetails(button) {
        var id = button.id;
      }
    </script> 

      <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Add this script at the end of your HTML body -->
    <script>
    $(document).ready(function() {
        function loadBooks(categoryId) {
            $.ajax({
                type: 'POST',
                url: './php/load_book.php',
                data: { category_id: categoryId },
                success: function(response) {
                    // Update the HTML of the books-container with the received response
                    $('#books-container').html(response);
                    $('.pages').toggle(categoryId == 'all');
                }
            });
        }

          loadBooks('all');

        // Attach click event to category buttons
        $('.category-btn').on('click', function() {
            var categoryId = $(this).data('category-id');
            console.log('Category button clicked: ' + categoryId); // Debugging statement
            loadBooks(categoryId);

            // Hide all books not belonging to the selected category
            $('.Book-container2').each(function() {
                var bookCategory = $(this).data('category');
                if (bookCategory == categoryId || categoryId == 'all')  {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Load books for the default category (you may choose the default category based on your requirements)
        loadBooks(<?php echo $categories[0]['id']; ?>);

        // Trigger the click event for the "All Categories" button on page load
        $('.category-btn[data-category-id="all"]').click();
    });
      </script>




  </body>
</html>


