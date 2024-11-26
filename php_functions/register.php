<?php

include(__DIR__ . '/../db/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$baseDir = dirname(__DIR__); 

function register($email, $password, $passwordConfirm, $firstName, $lastName){
    global $conn;

    $statement  = $conn->prepare('SELECT email FROM mm_users WHERE email = ?');

    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->get_result();

    if($result->num_rows > 0){
        die('Email in use already');
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $statement = $conn->prepare('INSERT into mm_users (email, password, role, firstName, lastName) VALUES (?, ?, ?, ?, ?)');

    if(!$statement){
        die('Error in connection '. $conn->error);
    }
    $role = "regular";

    $statement->bind_param('sssss', $email, $hashedPassword, $role, $firstName, $lastName);
    if($statement->execute()){
        $lastInsertId = $conn->insert_id;
        // Fetch the newly inserted user data
        $selectQuery = $conn->prepare('SELECT * FROM mm_users WHERE id = ?');
        $selectQuery->bind_param('i', $lastInsertId);
        $selectQuery->execute();

        if(!$selectQuery){
            die('Error in connection '. $conn->error);
        }
        
        $result = $selectQuery->get_result();
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstName'] = $firstName;
        $_SESSION['role'] = $row['role'];

        header('Location: '.$baseDir.'feed.php'); #take them to the feed
    }else{
        die('Error creating user');
    }
    
    $statement->close();

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    if(empty($email) || empty($password) || empty($password) || empty($firstName) || empty($lastName)){
        die("Enter all required fields please!");
    }

    $email = trim($email);
    $password = trim($password);
    $passwordConfirm = trim($passwordConfirm);
    $firstName = trim($firstName);
    $lastName = trim($lastName);

    if($password != $passwordConfirm){
        die('Passwords do not match');
    }

    register($email, $password, $passwordConfirm, $firstName, $lastName);
}

?>