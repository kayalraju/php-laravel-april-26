<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD App</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

               
                    <!-- Logged In -->
                    

                    
            
                    <!-- Not Logged In -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
            

            </ul>
        </div>
    </nav>
</div>