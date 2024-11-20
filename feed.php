<?php
include "php_functions/auth_utils.php";
session_start();
checkRole();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Movemates</title>
  </head>
  <body  data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- main navigation -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light sticky-top">
    <div class="container">
        <div class="col-auto logo-container d-flex align-items-center">
            <img src="images/navbar/logo.png" alt="logo" class="logo">
            <a class="navbar-brand" href="index.php">Movemates<span>.</span></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <?php
          echo '
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Hello ' . htmlspecialchars($_SESSION['firstName']) . '</a>
          </li>';
        ?>
            <li class="nav-item">
                <a class="nav-link active"  href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"  href="create_trip.php">Create Trip</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white  btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal" href="#contact">Contact Us</a>
            </li>        
        </ul>
        </div>
    </div>
    </nav>
    <!-- feeds -->
     <!-- sample feed -->     
     

    


    <!-- replace the local jquery and bootstrap js with the cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/feed.js"></script>
  </body>
</html>