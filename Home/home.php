<?php
session_start(); 
include "db_conn.php";

    $connection = mysqli_connect("localhost", "root", "", "book_t");
    $sql = "SELECT * FROM books";
    $result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
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
        <a href="/" id="navbar__logo"><i class="fas fa-gem"></i>BOOK CORNER</a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="/" class="navbar__links">Home</a>
          </li>
          <li class="navbar__item">
            <a href="/tech.html" class="navbar__links">About us</a>
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

    <div id="search"class="space" style="HEIGHT: 30px; background-color: #fada5e ">
    </div>

    <form action="/search" method="get" style="    background-color: beige;padding-top: 30px;padding-left: 69px;">
        <input type="text" id="searchQuery" style="height: 35px; width: 300px; margin-left: 81px" name="q" placeholder="Search book...  ">
        <button type="submit" style="height: 37px; width: 42px; font-size: 16px; cursor: pointer;">&#128269; <!-- Unicode for Magnifying Glass --></button>
    </form>

    <div class="book">
      <div class="Book-container">
        <div class="row1">
          <img src="./Assets/s1.jpg" alt="">
          <p style="font-size: 14px"><b>Coffee with Tony</b></p>
          <p style="font-size: 13px">By: Tony Buoi Sang</p>
          <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
          </button>
        </div>

        <div class="row2">
        <img src="./Assets/s1.jpg" alt="">
          <p style="font-size: 14px"><b>Coffee with Tony</b></p>
          <p style="font-size: 13px">By: Tony Buoi Sang</p>
          <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
          </button>
        </div>

        <div class="row3">
        <img src="./Assets/s1.jpg" alt="">
          <p style="font-size: 14px"><b>Coffee with Tony</b></p>
          <p style="font-size: 13px">By: Tony Buoi Sang</p>
          <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
          </button> 
        </div>
      </div>
    
      <div class="Book-container1">
        <div class="row4">
        <img src="./Assets/s1.jpg" alt="">
          <p style="font-size: 14px"><b>Coffee with Tony</b></p>
          <p style="font-size: 13px">By: Tony Buoi Sang</p>
          <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
          </button>     
        </div>

        <div class="row5">
        <img src="./Assets/s1.jpg" alt="">
          <p style="font-size: 14px"><b>Coffee with Tony</b></p>
          <p style="font-size: 13px">By: Tony Buoi Sang</p>
          <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
          </button>
        </div>

        <div class="row6">
        <img src="./Assets/s1.jpg" alt="">
          <p style="font-size: 14px"><b>Coffee with Tony</b></p>
          <p style="font-size: 13px">By: Tony Buoi Sang</p>
          <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
          </button>
        </div>
      </div>

      <div class="Book-container2">
      <div class="row6">
      <img src="./Assets/s1.jpg" alt="">
        <p style="font-size: 14px"><b>Coffee with Tony</b></p>
        <p style="font-size: 13px">By: Tony Buoi Sang</p>
        <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
          </button>     
      </div>

      <?php
      while ($id = mysqli_fetch_object($result)) {
      ?>

      <div class="row7">
      <img src="./Assets/s1.jpg" alt="">
        <p style="font-size: 14px"><b>Coffee with Tony</b></p>
        <p style="font-size: 13px">By: Tony Buoi Sang</p>
        <p>We believe that young people always have a desire to improve themselves to be a good person, and there are many ways to motivate them to make it happen.</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review
        </button> 
      </div>

      <div class="row8">
        <img src="./Assets/<?php echo $id->cover; ?>" alt="">
        <p><b><?php echo $id->title; ?></b></p>
        <p><i>Author: <?php echo $id->author_id; ?></i></p>
        <p><?php echo $id->short_desc; ?></p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Review</button>
      </div>
    


      <!-- Modal -->
      <div class="modal fade" id="exampleModal">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" style="height: 300px">
              <div class="modal-content">
                <div class="modal-header bg-warning-subtle">
                  <h3 class="modal-title" fs-5 id="exampleModalLabel">Review</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-success-subtle border border-dark">
                  <p><?php echo $id->description; ?></p>
                </div>
                <div class="modal-footer bg-warning-subtle">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success">Save</button>
                </div>
              </div>
            </div>
          </div>
    </div>
    <?php
      } 
      ?>

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
            <a href="/" id="footer__logo"><i class="fas fa-gem"></i>NEXT</a>
          </div>
          <p class="website__rights">© NEXT 2020. All rights reserved</p>
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
      function openModal(bookId) {
        // Use AJAX to fetch book details from the server based on bookId
        // For simplicity, I'm just displaying a sample text
        var modalContent = document.getElementById("modal-content");
        modalContent.innerHTML = "Details for Book ID " + Id;

        // Show the modal
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
      }

      function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
      }
    </script>
  </body>
</html>


