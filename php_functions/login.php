<?php
include(__DIR__ . '/../db/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$baseDir = dirname(__DIR__); 

function login($email, $password){
    global $conn;

    $statement = $conn->prepare('SELECT id, email, password, role, firstName FROM mm_users WHERE email = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('s', $email);
    $statement->execute();

    $result = $statement->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        
        if(password_verify($password, $row['password'])){
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['role'] = $row['role'];

            header('Location: /~tanitoluwa.adebayo/web-tech-project/feed.php'); #take them to the feed
        }
    }else{
        echo "<script>alert('password or email are incorrect')</script>";
        header('Location: /~tanitoluwa.adebayo/web-tech-project/index.php');
    }
    $statement->close();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(empty($email) || empty($password)){
        die("Fill in all required fields");
    }

    $email = trim($email);
    $password = trim($password);

    login($email, $password);
}

?>