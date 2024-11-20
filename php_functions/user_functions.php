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

?>