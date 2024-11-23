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
    <title>MoveMates - Manage Users</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        .trip-action-btn {
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #923D41;">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-road me-2"></i>MoveMates User Management</a>
            <div class="navbar-nav ms-auto">
                <a href="admin_dashboard.html" class="btn btn-outline-light me-2">
                    <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <!-- Trip Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="display-4 text-primary totalUsers">Loading...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Users joined in the last 30 days</h5>
                        <p class="display-4 text-success 30DaysUsers">Loading...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trips Table -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="userTable">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="js/manage_user.js"></script>
</body>
</html>
