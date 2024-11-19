<?php
$servername = 'localhost';
$username = 'tanitoluwa.adebayo';
$password = 'tani123';
$dbname = 'webtech_fall2024_tanitoluwa_adebayo';

//attempt to connect to the db
$conn = mysqli_connect($servername, $username, $password, $dbname)
        or die('Unable to connect');

if($conn->connect_error){
    die('Error connecting to db');
}

?>