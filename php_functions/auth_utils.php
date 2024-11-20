<?php

include(__DIR__ . '/../db/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$baseDir = dirname(__DIR__); 

function checkRole(){
    if(!isset($_SESSION['id'])){
        header('Location: '.$baseDir.'index.php'); 
    }
}

?>

