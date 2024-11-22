<?php
include "php_functions/auth_utils.php";
session_start();
checkRole();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoveMates - Your Trips</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/user_dashboard.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
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
            if(isset($_SESSION['firstName'])){
              echo '
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Hello ' . htmlspecialchars($_SESSION['firstName']) . '</a>
              </li>';
            }
              
    
              if($_SESSION['role'] == 'admin'){
                echo '
              <li class="nav-item">
                <a class="nav-link active" href="admin_dashboard.php">admin dashboard </a>
              </li>';
              }
            ?>
                <li class="nav-item">
                    <a class="nav-link active"  href="index.php">View Upcoming Trips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="create_trip.php">Create Trip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="create_trip.php">Log Out</a>
                </li>
                      
            </ul>
            </div>
        </div>
        </nav>

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h2><i class="fas fa-route me-2"></i>Your Upcoming Trips</h2>
            </div>
            <div class="col-auto">
                <a href="create_trip.php">
                    <button class="btn text-white" style="background-color: #923D41;">
                        <i class="fas fa-plus me-1"></i>Create New Trip
                    </button>
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Trip Card 1 -->
            




        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>