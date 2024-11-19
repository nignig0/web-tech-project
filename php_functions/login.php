<?php
include(__DIR__ . '/../db/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$baseDir = dirname(__DIR__); 

function login($email, $password){
    global $conn;

    $statement = $conn->prepare('SELECT id, email, username, password, role FROM mm_users WHERE email = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('s', $email);
    $statement->execute();

    $result = $statement->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        
        if(password_verify($password, $row['password'])){
            $_SERVER['id'] = $row['id'];
            $_SERVER['email'] = $row['email'];
            $_SERVER['username'] = $row['username'];
            $_SERVER['role'] = $row['role'];

            header('Location: '.$baseDir.'feed.php'); #take them to the feed

        }
    }else{
        echo "<script>alert('password or email are incorrect')</script>";
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