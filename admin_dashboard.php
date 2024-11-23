<?php
include "php_functions/auth_utils.php";
session_start();
checkRole();
checkIfadmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoveMates - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/admin_dashboard.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #923D41;">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-tachometer-alt me-2"></i>MoveMates Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="php_functions/logout.php"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h1><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h1>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card admin-card text-white bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title totalUsers">Loading...</h3>
                                <p class="card-text">Total Users</p>
                            </div>
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card admin-card text-white bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title activeTrips">Loading...</h3>
                                <p class="card-text">Active Trips</p>
                            </div>
                            <i class="fas fa-route fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Sections -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user-friends me-2"></i>User Management
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total Users
                                <span class="badge bg-primary rounded-pill totalUsers">Loading...</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                New Users (Last 30 Days)
                                <span class="badge bg-success rounded-pill 30DaysUsers">Loading...</span>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <a href="manage_users.php">
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-users-cog me-2"></i>Manage Users
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-route me-2"></i>Trip Management
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total Trips
                                <span class="badge bg-success rounded-pill totalTrips">Loading...</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Upcoming Trips
                                <span class="badge bg-primary rounded-pill activeTrips">Loading...</span>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <a href="manage_trip.pjp">
                                <button class="btn btn-success w-100">
                                    <i class="fas fa-clipboard-list me-2"></i>Manage Trips
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="js/admin_dashboard.js"></script>
</body>
</html>