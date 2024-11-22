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
    <title>MoveMates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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

    <!-- create trip form -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-gender-male me-2"></i>
                    </div>
                </div>
                <!-- Form Title -->
                <h3 class="mb-4">Create A Trip</h3>
                <!-- Form -->
                <form action = "php_functions/trip_functions.php?action=createTrip" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="DESTINATION" name="destination">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="MEET UP SPOT" name="meetUpSpot">
                    </div>
                    
                    <!-- Trip Type Dropdown -->
                    <div class="mb-3">
                        <select class="form-select form-select-lg" aria-label="Trip Type Selection" name="tripType">
                            <option selected disabled>TRIP TYPE</option>
                            <!-- <option value="roundTrip">Round Trip</option> -->
                            <option value="oneWay">One Way</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <input type="number" class="form-control form-control-lg" placeholder="SEATS AVAILABLE" name="seats">
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="PRICE" name="cost">
                    </div>
                    
                    <div class="mb-3">
                        <input type="date" class="form-control form-control-lg" placeholder="DEPARTURE DATE" name="depDate">
                    </div>
                    
                    <div class="mb-3">
                        <input type="time" class="form-control form-control-lg" placeholder="DEPARTURE TIME" name="depTime">
                    </div>

                    <!-- Create Button -->
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn text-white btn-lg" style="background-color:#923D41;">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Keep the contact modal section as is -->
    <section>
        <!-- ... (rest of the contact modal code) ... -->
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>