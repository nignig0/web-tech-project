<?php
include(__DIR__ . '/../db/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$baseDir = dirname(__DIR__); 

//create user is in the register flow
//reading and deleting users
//update... not for now

function readUsers(){

    global $conn;
    $statement = $conn->prepare('SELECT id, email, firstName, lastName, role FROM mm_users');
    $statement->execute();
    $result = $statement->get_result();

    $users = [];
    if(!empty($result)){
        while($row = $result->fetch_assoc()){
            $users[] = $row;
        }
    }

    echo json_encode($users);
}

function deleteUser($userId){
    global $conn;

    $statement = $conn->prepare('DELETE FROM mm_users WHERE id = ?');

    if ($statement === false) {
        echo '<script>alert("Error preparing statement: ' . $conn->error . '")</script>';
        return;
    }

    $statement->bind_param('s', $userId);
    
    if($statement->execute()){
        echo '<script>alert("User Deleted")</script>';
    }else{
        echo '<script>alert("Unable to delete user")</script>';
    }

    $statement->close();

}

function countUsers(){
    global $conn;
    $statement = $conn->prepare('SELECT COUNT(*) as count FROM mm_users');
    $statement->execute();

    if ($statement === false) {
        echo '<script>alert("Error preparing statement: ' . $conn->error . '")</script>';
        return;
    }

    $result = $statement->get_result();
    $count = $result->fetch_assoc();
    echo json_encode($count);

}


function countUsersLastThirtyDays(){
    global $conn;
    $statement = $conn->prepare('SELECT COUNT(*) as count FROM mm_users WHERE createdAt >= NOW() - INTERVAL 30 DAY');
    $statement->execute();

    if ($statement === false) {
        echo '<script>alert("Error preparing statement: ' . $conn->error . '")</script>';
        return;
    }

    $result = $statement->get_result();
    $count = $result->fetch_assoc();
    echo json_encode($count);

}

function getUser($userId){
    global $conn;
    $statement = $conn->prepare('SELECT firstName, lastName, email FROM mm_users WHERE id = ?');
    if ($statement === false) {
        echo '<script>alert("Error preparing statement: ' . $conn->error . '")</script>';
        return;
    }
    $statement->bind_param('i', $userId);
    $statement->execute();
    $result= $statement->get_result();
    $user = $result->fetch_assoc();
    
    echo json_encode($user);
    
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'getTotalUsers') countUsers();
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'get30DayUsers') countUsersLastThirtyDays();
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'getUser') getUser($_GET['userId']);
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'readUsers') readUsers();
if($_SERVER['REQUEST_METHOD'] == 'DELETE' && $_GET['action'] == 'deleteUser') deleteTrip($_GET['userId']);   

?>