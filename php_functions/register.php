<?php

include(__DIR__ . '/../db/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$baseDir = dirname(__DIR__); 

function register($username, $email, $password, $passwordConfirm){

    $statement  = $conn->prepare('SELECT email FROM mm_users WHERE email = ? AND username = ?');

    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->fetch_assoc();

    if($result->num_rows > 0){
        die('Email/Username are in use already');
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $statement = $conn.prepare('INSERT into mm_users (username, email, password, role) VALUES (????)');

    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_params('ssss', $username, $email, $hashedPassword, "regular");
    if($statement->execute()){
        $_SERVER['id'] = $row['id'];
        $_SERVER['email'] = $row['email'];
        $_SERVER['username'] = $row['username'];
        $_SERVER['role'] = $row['role'];

        header('Location: '.$baseDir.'feed.php'); #take them to the feed
    }else{
        die('Error creating user');
    }
    
    $statement->close();

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if(empty($username) || empty($email) || empty($password) || empty($password)){
        die("Enter all required fields please!");
    }

    $username = trim($username);
    $email = trim($email);
    $password = trim($password);
    $passwordConfirm = trim($passwordConfirm);

    if($password != $passwordConfirm){
        die('Passwords do not match');
    }

    register($username, $email, $password, $passwordConfirm);
}

?>